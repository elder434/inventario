<?php
//Rodrigo Cabrera Tobar
namespace App\Http\Controllers;


use App\Models\Producto_entregado;
use App\Http\Requests\StoreProducto_entregadoRequest;
use App\Models\Producto;
use App\Models\Responsable;
use App\Models\Temporal;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ProductoEntregadoController extends Controller
{
//redirecciona a la pagina historial
    public function index(){
        $tipo = Producto_entregado::all();

        return view('historial.indexH',compact('tipo'));
    }
//redirecciona a la pagina de creaccion para historial
    public function create(Producto $productos){
        $responsable = Responsable::all();
        
        return view('historial.createH',compact('productos','responsable'));
    }
//creaccion de historial y agrega el nombre al del inventario
    public function store(StoreProducto_entregadoRequest $request,Producto $productos){
        $temporal = DB::table('temporals')->where( 'nT', $productos->id)->exists();
        $tipo = DB::table('producto_entregados')->where( 'n', $productos->id)->exists();
  
       //revisa que no ya se haya utilizado el producto
        if ($temporal or $tipo) {
                return redirect()->route('producto.index')->with('error','ok');
             

         } else {//crea el producto temporal
           
            $tipos = new Temporal();
            
            $tipos->tipoT = $productos->tipo_producto->tipo;
            $tipos->inventarioT = $productos->inventario;
            $tipos->serieT = $productos->serie;
            $tipos->responsableT = $request->responsable;
            $tipos->estadoT = $request->estado;
            $tipos->observacionT = $request->observacion;
            $tipos->nT = $productos->id;
            
            $tipos->save();
            
            $productos->docente = $request->responsable;
            
            $productos->save();
            //revisa si se apreto el boton 1(que es guardar)
            if ($request->btn1 == 1) {
                
                
                
                return redirect()->route('temporal.imprimir'); 
            //revisa si se apreto el boton 2(guardar y agregar mas)
            }elseif ($request->btn2 == 2) {
                
                
                return redirect()->route('producto.index');
            }
            
        }

    }
//eliminacion de producto y elimina el nombre al que se entrego
    public function eliminar($tipos){
        
        $tipos = Producto_entregado::find($tipos);
        $product = DB::table('productos')->select('id')->get();
        $productos = DB::table('productos')->find($tipos->n);
//revisa que si exista el producto vinculada a la id
        if ($productos != null) {
            //guarda el producto emparejado
            $producto = Producto::find($productos->id);
        } else {//si no existe elimina producto temporal(tipo)
            $tipos->delete();
            return redirect()->route('historial.index')->with('eliminar','ok');
        }
        
        //revisa que la tabla producto no este vacia
        if ($product->count() == 0) {//elimina el producto temporal(tipo)
            $tipos->delete();
            return redirect()->route('historial.index')->with('eliminar','ok');
    }
//deja vacio el docente del producto y elimina el producto temporal(tipo)
            $producto->docente = null;
            $producto->save();
            $tipos->delete();
                
            return redirect()->route('historial.index')->with('eliminar','ok');
       
        
    }

//redirecciona a la pagina para editar un historial
    public function edit(Producto_entregado $tipos){
        $responsable = Responsable::all();

        return view('historial.editH',compact('tipos','responsable'));
    }
//edicion del historial
    public function update(StoreProducto_entregadoRequest $request,Producto_entregado $tipos){

        $product = DB::table('productos')->select('id')->get();
        $productos = DB::table('productos')->find($tipos->n);

        //revisa que la exista el producto emparejado
        if ($productos != null) {
            //guarda el producto emparejado
            $producto = Producto::find($productos->id);
            $producto->docente = $request->responsable;
            $producto->save();
        }


        $tipos->responsable = $request->responsable;
        $tipos->estado = $request->estado;
        $tipos->observacion = $request->observacion;
        
        $tipos->save();

        return redirect()->route('historial.print',compact('tipos'))->with('editar','ok');
    }
//muestra la pagina para imprimir
    public function print(Producto_entregado $tipos){
        
        $date = Carbon::now();

        return view('historial.print',compact('tipos','date'));
    }

    public function imprimir(){
        $tipo = Producto_entregado::all();

        $date = Carbon::now();

        return view('historial.imprimirH',compact('tipo','date'));

    }
}

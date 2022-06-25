<?php
//Rodrigo Cabrera Tobar
namespace App\Http\Controllers;

use App\Http\Requests\StoreTemporalRequest;
use App\Models\Producto;
use App\Models\Producto_entregado;
use App\Models\Responsable;
use App\Models\Temporal;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TemporalController extends Controller
{
//redirecciona a la pagina principal
    public function index(){
        $tipo = Temporal::all();

        $date = Carbon::now();
        return view('temporal.index',compact('tipo','date'));
    }

    //redirecciona a la pagina para editar un historial
    public function edit(Temporal $tipos){
        $responsable = Responsable::all();

        return view('temporal.edit',compact('tipos','responsable'));
    }
    //redirecciona a la pagina de imprimir
    public function imprimir(){
        $tipo = Temporal::all();

        $date = Carbon::now();

        return view('historial.imprimir',compact('tipo','date'));
    }

//elimina el el tipo y vacia el docente 
    public function eliminar($tipos){
        
        $tipos = Temporal::find($tipos);
        $product = DB::table('productos')->select('id')->get();
        $productos = DB::table('productos')->find($tipos->nT);
//revisa que exista el producto emparejado
        if ($productos != null) {
            //guarda el producto emparejado
            $producto = Producto::find($productos->id);
        } else {//si no existe elimina el producto temporal(tipo)
            $tipos->delete();
            return redirect()->route('temporal.index')->with('eliminar','ok');
        }
        
        //revisa que la tabla producto no este vacia
        if ($product->count() == 0) {//elimina el temporal(tipo)
            $tipos->delete();
            return redirect()->route('temporal.index')->with('eliminar','ok');
        }
        //deja vacio el docente del producto y elimina el temporal(tipo)
            $producto->docente = null;
            $producto->save();
            $tipos->delete();
                
            return redirect()->route('temporal.index')->with('eliminar','ok');
       
        
    }


//edicion del historial
    public function update(StoreTemporalRequest $request,Temporal $tipos){

        $product = DB::table('productos')->select('id')->get();
        $productos = DB::table('productos')->find($tipos->nT);

        //revisa que la exista el producto emparejado
        if ($productos != null) {
            //guarda el producto emparejado
            $producto = Producto::find($productos->id);
            $producto->docente = $request->responsable;
            $producto->save();

        }

        $tipos->responsableT = $request->responsable;
        $tipos->estadoT = $request->estado;
        $tipos->observacionT = $request->observacion;
        
        $tipos->save();

        return redirect()->route('temporal.index',compact('tipos'))->with('editar','ok');
    }
//mueve todos los datos de la tabla temporal a la tabla productos_entregados y elimina los datos
    public function destroy(){

        $tipoT = Temporal::all();

        foreach ($tipoT as $tiposT) {
            $tipos = new Producto_entregado();
            
            $tipos->tipoE = $tiposT->tipoT;
            $tipos->inventarioE = $tiposT->inventarioT;
            $tipos->serieE = $tiposT->serieT;
            $tipos->responsable = $tiposT->responsableT;
            $tipos->estado = $tiposT->estadoT;
            $tipos->observacion = $tiposT->observacionT;
            $tipos->n = $tiposT->nT;
            
            $tipos->save();
            $tiposT->delete();

        }
        
        return redirect()->route('producto.index');
    }
}

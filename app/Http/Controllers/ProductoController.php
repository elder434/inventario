<?php
//Rodrigo Cabrera Tobar
namespace App\Http\Controllers;

use App\Http\Requests\StoreProducto;
use App\Models\Producto;
use App\Models\Tipo_producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
//redirecciona a la pagina de inventario
    public function index(){

        $producto = Producto::all();

        return view('productos.index',compact('producto'));
        
    }
//redirecciona a la pagina para crear un producto 
    public function create(){
        $producto = Producto::all();
        $productoN = Tipo_producto::all();

        return view('productos.create',compact('producto','productoN'));
    }
//redirecciona a la pagina para editar un producto
    public function edit(Producto $producto){
        $productoN = Tipo_producto::all();
        return view('productos.edit',compact('producto','productoN'));
    }
//creacion de producto
    public function store(StoreProducto $request){
        
        $producto = new Producto;
        //revisa si subieron una imagen
        if ($request->file('file') != null) {
            $imagen = $request->file('file')->store('public/');
            $url = Storage::url($imagen);
            $producto->file = $url;
        }else{//si no se agrego imagen se define una por defecto
            $producto->file = '/storage//xRIMgRC6tq8xlMv1Weqqm5H1Jm4hOmMn9xsZOc21.jpg';
        }
        $producto->tipo_producto_id = $request->name;
        $producto->serie = $request->serie;
        $producto->inventario = $request->inventario;
        $producto->orden = $request->orden;
        $producto->factura = $request->factura;
        
        $producto->save();

        return redirect()->route('producto.index');

    }
//edicion de producto
    public function update(StoreProducto $request ,Producto $producto){
        

        //revisa si agregaron una imagen para cambiarla
        if ($request->file('file') != null) {
            $imagen = $request->file('file')->store('public/');
            $url = Storage::url($imagen);
            $producto->file = $url;
        }
        $producto->tipo_producto_id = $request->name;
        $producto->serie = $request->serie;
        $producto->inventario = $request->inventario;
        $producto->orden = $request->orden;
        $producto->factura = $request->factura;

        $producto->save();

        return redirect()->route('producto.index')->with('editar','ok');

        

    }
//elimina el prodcuto
    public function destroy(Producto $producto){
        $producto->delete();

        return redirect()->route('producto.index')->with('eliminar','ok');
    }
//redirecciona a la pagina para crear un tipo de producto
    public function add(){
        return view('productos.add');
    }
//crea un tipo de producto
    public function up(Request $request, Tipo_producto $tipo){

        $tipo->tipo = $request->name;
        $tipo->descripcion = $request->descripcion;
        $tipo->proveedor = $request->proveedor;

        $tipo->save();

        return redirect()->route('producto.viewp');
    }
//muestra los tipo de producto
    public function viewp(){
        $tipo = Tipo_producto::all();

        return view('productos.viewpro',compact('tipo'));
    }
//redirecciona a la pagina para editar un tipo de producto
    public function editpro(Tipo_producto $tipo){
        
        return view('productos.editpro',compact('tipo'));
    }
//edita los tipo de producto
    public function editar(Request $request,Tipo_producto $tipo){
        $tipo->tipo = $request->name;
        $tipo->descripcion = $request->descripcion;
        $tipo->proveedor = $request->proveedor;

        $tipo->save();

        return redirect()->route('producto.viewp')->with('editar','ok');
    }
//elimina los tipos de productos
    public function destruir(Tipo_producto $tipo){
        $tipo->delete();

        return redirect()->route('producto.viewp')->with('eliminar','ok');
    }
}

<?php
//Rodrigo Cabrera Tobar
namespace App\Http\Controllers;

use App\Http\Requests\StoreResponsableResquest;
use App\Models\Responsable;

class ResponableController extends Controller
{
    //redirecciona a la pagina principal
    public function index(){
        $responsable = Responsable::all();

        return view('reponsable.index',compact('responsable'));
    }
//redirecciona a la pagina de creaccion
    public function creacion(){
        
        return view('reponsable.create');
    }
//creacion de responsable
    public function store(StoreResponsableResquest $request){
        $responsable = new Responsable();

        $responsable->responsable = $request->responsable;
        $responsable->save();
        return redirect()->route('responsable.index');
    }
//redirecciona a la pagina de edicion
    public function edit(Responsable $responsable){
        
        return view('reponsable.edit',compact('responsable'));

    }
//edita a un responsable
    public function update(StoreResponsableResquest $request, Responsable $responsable){
        $responsable->responsable = $request->responsable;
        $responsable->save();

        return redirect()->route('responsable.index')->with('editar','ok');

    }
//elimina un responsable
    public function delete(Responsable $responsable){

        $responsable->delete();
        return redirect()->route('responsable.index')->with('eliminar','ok');
    }
}

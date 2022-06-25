@extends('layouts.plantilla')

@section('title','editar '.$tipo->tipo)

@section('contend')

<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <form action="{{route('producto.editar', $tipo)}}" class="formulario-editar" method="POST">
                        @csrf
                        @method('put')
<!-- parte del tipo de producto -->
                        <div class="form-row mb-4">
                            <div class="form-group col-md-6">
                                <label>Tipo</label>
                                <input type="text" class="form-control" placeholder="Tipo" name="name" value="{{old('name',$tipo->tipo)}}" required>
                            </div>
<!-- parte del descripcion -->
                            <div class="form-group col-md-6">
                                <label>Descripcion</label>
                                <input type="text" class="form-control" placeholder="Descripcion" name="descripcion" value="{{old('descripcion',$tipo->descripcion)}}" required>
                            </div>
                        </div>
                        <div class="form-row mb-4">
                            <div class="form-group col-md-6">
                                <label>proveedor</label>
                                <input type="text" class="form-control" placeholder="Proveedor" name="proveedor" value="{{old('proveedor',$tipo->proveedor)}}" required>
                            </div>
                        </div>
                        
<!-- botones -->
                        <div class="btn-toolbar" role="toolbar">
                            <button class="btn btn-primary btn-sm mx-3">Submit</button>
                            </form>
                            <form action="{{route('producto.viewp')}}">
                            <button class="btn btn-primary btn-sm">Cancel</button>
                        </div>
                    </form>      
<!-- fin de botones -->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@extends('layouts.plantilla')

@section('title','editar ')

@section('contend')

<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <form action="{{route('responsable.update', $responsable)}}" class="formulario-editar" method="POST">
                        @csrf
                        @method('put')
<!-- parte del tipo de producto -->
                        
                            <div class="form-group col-md-6">
                                <label>Responsable</label>
                                <input type="text" class="form-control" placeholder="Responsable" name="responsable" value="{{old('responsable',$responsable->responsable)}}" required>
                                @error('responsable')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
<!-- parte del descripcion -->
                        
                        
<!-- botones -->
                        <div class="btn-toolbar" role="toolbar">
                            <button class="btn btn-primary btn-sm mx-3">Submit</button>
                            </form>
                            <form action="">
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
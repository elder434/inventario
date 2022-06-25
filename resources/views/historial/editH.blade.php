@extends('layouts.plantilla')

@section('title','editar ' . $tipos->tipoE)

@section('css')
    
<link href="{{asset('/cork/assets/css/apps/invoice-edit.css')}}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{asset('/cork/plugins/dropify/dropify.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/cork/assets/css/forms/theme-checkbox-radio.css')}}">
<link href="{{asset('/cork/plugins/flatpickr/flatpickr.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('/cork/plugins/flatpickr/custom-flatpickr.css')}}" rel="stylesheet" type="text/css">

@endsection

@section('contend')
   

<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="row invoice layout-top-spacing layout-spacing">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="doc-container">
                    <div class="row">
                        <div class="col-xl-9">
                            <div class="invoice-content">
                                <form action="{{route('historial.update', $tipos)}}" method="POST" class="formulario-editar" enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                    <div class="invoice-detail-body">
                                        <div class="invoice-detail-header">
                                            <!-- creaccion -->
                                            <div class="form-row mb-4">
                                                <div class="form-group col-md-6">
                                                    <label>EQUIPAMIENTO</label>
                                                    <h4>{{$tipos->tipoE}}</h4>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>N° INVENTARIO</label>
                                                    <h4>{{$tipos->inventarioE}}</h4>
                                                </div>
                                            </div>
                                            <div class="form-group mb-4">
                                                <label>N° DE SERIE</label>
                                                <h4>{{$tipos->serieE}}</h4>
                                            </div>
                                            <div class="form-row mb-4">
                                                <div class="form-group col-md-6">
                                                    <label>RESPONSABLE</label>
                                                    <select name="responsable" class="form-control ">
                                                        @foreach ($responsable as $responsables)
                                                        
                                                        @if ($responsables->responsable == $tipos->responsable)
                                                            
                                                        <option selected="selected">{{$responsables->responsable}}</option>
                                                        
                                                        @else
                                                        <option>{{$responsables->responsable}}</option>
                                                        
                                                        @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>ESTADO</label>
                                                    <input type="text" class="form-control form-control-sm" placeholder="estado" name="estado" value="{{old('estado',$tipos->estado)}}" required>
                                                    @error('estado')
                                                        <small class="text-danger">{{$message}}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group mb-4">
                                                <label>OBSERVACIONES</label>
                                                <input type="text" class="form-control" placeholder="Observacion" name="observacion" value="{{old('observacion',$tipos->observacion)}}">
                                            </div>
                                            <!-- fin de creaccion -->
                                        </div>   
                                    </div>
                                </div> 
                            </div>
                            <!--botones-->
                            <div class="col-xl-3">
                                <div class="invoice-actions-btn">
                                    <div class="invoice-action-btn">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-6">
                                                <button class="btn btn-success btn-block btn-download" type="submit">Guardar</button>
                                            </div>
                                            <div class="col-xl-12 col-md-6 mt-2">
                                                <a href="{{route('historial.print',$tipos)}}" class="btn btn-dark btn-block btn-edit ">Volver</a>
                                            </div>
                                        </div>
                                    </div> 
                                </form>
                            </div> 
                            <!-- fin de botones -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@section('js')
    
<script src="{{asset('/cork/plugins/dropify/dropify.min.js')}}"></script>
<script src="{{asset('/cork/plugins/flatpickr/flatpickr.js')}}"></script>
<script src="{{asset('/cork/assets/js/apps/invoice-edit.js')}}"></script>


@endsection

@endsection

























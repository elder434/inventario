@extends('layouts.plantilla')

@section('title','crecion de tipo de producto')

@section('contend')

<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <form action="{{route('responsable.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf 
<!-- parte del responsable -->
                        <div class="form-row mb-12">
                            <div class="form-group col-md-12">
                                <label>Responsable</label>
                                <input type="text" class="form-control" placeholder="Responsable" name="responsable" value="{{old('responsable')}}" required>
                                @error('responsable')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
<!-- fin del responsable -->
<!-- botones -->
                        <div class="btn-toolbar" role="toolbar">
                            <button class="btn btn-primary btn-sm mx-3">Submit</button>
                            </form>
                            <form action="{{route('responsable.index')}}">
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
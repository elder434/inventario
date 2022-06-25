@extends('layouts.plantilla')

@section('title','crecion producto')

@section('contend')


<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <form action="{{route('producto.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
<!-- parte del tipo de producto-->
                        <div class="form-row mb-4">
                            <div class="form-group col-md-6">
                                <label>Item</label>
                                <select name="name" class="form-control " required>
                                    <option value="">Item</option>
                                    @foreach ($productoN as $productos)
                                        
                                    <option value="{{$productos->id}}">{{$productos->tipo}}</option>
                                    
                                    @endforeach
                                </select>
                                @error('name')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <!-- parte del inventario -->
                            <div class="form-group col-md-6">
                                <label>Inventario</label>
                                <input type="text" class="form-control" placeholder="Inventario" name="inventario" value="{{old('inventario')}}">
                                @error('inventario')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <!-- parte de serie -->
                        <div class="form-group mb-4">
                            <label>Numero de serie</label>
                            <input type="text" class="form-control" placeholder="Numero de serie" name="serie" value="{{old('serie')}}">
                            @error('serie')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <!-- parte de orden de compta -->
                        <div class="form-group mb-4">
                            <label>orden de compra</label>
                            <input type="text" class="form-control" placeholder="orden de compra" name="orden" value="{{old('orden')}}">
                            @error('orden')
                            <small class="text-danger">{{$message}}</small>
                            @enderror 
                        </div>
                         <!-- parte de la factura -->
                        <div class="form-group mb-4">
                            <label>factura</label>
                            <input type="text" class="form-control" placeholder="factura" name="factura" value="{{old('factura')}}">
                            @error('factura')
                            <small class="text-danger">{{$message}}</small>
                            @enderror 
                        </div>
                        <!-- parte de la imagen -->
                        <div class="form.group mb-4">
                            <label>Imagen</label>
                            <br>
                            <span>
                                <img id="imagenSeleccionada" class="profile-img" width="90px" height="90px">
                            </span>
                            <input type="file" name="file" id="imagen" accept="image/*"> 
                            @error('file')
                            <small class="text-danger">{{$message}}</small>
                            @enderror 
                        </div>
                        <!-- botones -->
                        <div class="btn-toolbar" role="toolbar">
                            <button class="btn btn-primary btn-sm mx-3">Submit</button>
                        </form>
                        <form action="{{route('producto.index')}}">
                            <button class="btn btn-primary btn-sm">Cancel</button>
                        </div>  
                    </form>      
                    <!-- fin de botones -->
                </div>
            </div>
        </div>
    </div>
</div>


@section('js')

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> 
<script>   
//actualiza la imagen en la pagina
    $(document).ready(function (e) {   
        $('#imagen').change(function(){            
            let reader = new FileReader();
            reader.onload = (e) => { 
                $('#imagenSeleccionada').attr('src', e.target.result); 
            }
            reader.readAsDataURL(this.files[0]); 
        });
    });
</script>

@endsection
@endsection
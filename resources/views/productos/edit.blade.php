@extends('layouts.plantilla')

@section('title','editar ' . $producto->tipo_producto->tipo)

@section('contend')
    



<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <form action="{{route('producto.update', $producto)}}" method="POST" class="formulario-editar" enctype="multipart/form-data">
                        @method('put')
                        @csrf
<!-- parte del tipo de producto -->
                        <div class="form-row mb-4">
                            <div class="form-group col-md-6">
                                <label>Item</label>
                                <select name="name" class="form-control "  required>
                                    @foreach ($productoN as $productos)
                                    
                                    @if ($productos->tipo == $producto->tipo_producto->tipo)

                                    <option value="{{$productos->id}}" selected="selected">{{$productos->tipo}}</option>
                                    
                                    @else
                                    <option value="{{$productos->id}}">{{$productos->tipo}}</option>
                                    @endif
                                    
                                @endforeach
                                </select>
                            </div>
                            <!-- parte del serial/inventario -->
                            <div class="form-group col-md-6">
                                <label>Inventario</label>
                                <input type="text" class="form-control" placeholder="Inventario" name="inventario" value="{{old('inventario',$producto->inventario)}}" required>
                                @error('inventario')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <!-- parte del codigo/serie -->
                        <div class="form-group mb-4">
                            <label>Numero de serie</label>
                            <input type="text" class="form-control" placeholder="Numero de serie" name="serie" value="{{old('serie',$producto->serie)}}" required>
                            @error('serie')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <!-- parte del serial daem/orden de compta -->
                        <div class="form-group mb-4">
                            <label>orden de compra</label>
                            <input type="text" class="form-control" placeholder="orden de compra" name="orden" value="{{old('orden',$producto->orden)}}">
                        </div>
                         <!-- parte de la factura -->
                        <div class="form-group mb-4">
                            <label>factura</label>
                            <input type="text" class="form-control" placeholder="factura" name="factura" value="{{old('factura',$producto->factura)}}">
                        </div>
                        <!-- parte de la imagen -->
                        <div class="form.group mb-4">
                            <label>imagen</label>
                            <br>
                            <span><img src="{{asset($producto->file)}}" id="imagenSeleccionada" class="profile-img" width="90px" height="90px" alt="avatar"></span>
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
//preview de imagen cambiada 
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
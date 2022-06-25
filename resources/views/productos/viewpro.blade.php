@extends('layouts.plantilla')

@section('title','tipo de producto')

@section('contend')

@section('css')
    

<style>
    /*elimina el diseño del boton eliminar*/
    #btneliminar{
        background-color: transparent;
        border: none; 
        outline:none;
    }
</style>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@endsection

<div id="content" class="main-content">
    <div class="layout-px-spacing"> 
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
<!-- tabla -->
                    <table id="zero-config">
                        <thead>
                            <tr>
                                <th>Tipo</th>
                                <th>Descripcion</th>
                                <th>proveedor</th>
                                <th style="max-width: 160px"></th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($tipo as $tipos)

                            <tr>
                                <td>{{$tipos->tipo}}</td>
                                <td>{{$tipos->descripcion}}</td>
                                <td>{{$tipos->proveedor}}</td>
                                <td style="max-width: 160px">         
                                    <form action="{{route('producto.destruir', $tipos)}}" class="formulario-eliminar" method="POST">
                                        @csrf
                                        @method('delete') 
                                        <div class="d-flex flex-nowrap">
                                            <div>
                                                <a href="{{route('producto.editpro',$tipos)}}" title="editar" class="col-sm-1 col-md-1" data-toggle="tooltip" data-placement="top" title=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-6 mb-1"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a>
                                            </div>
                                            <div>
                                                <button class="col-sm-1 col-md-1" id="btneliminar" title="eliminar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-6 mb-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></button>
                                            </div>
                                        </div>      
                                    </form>
                                </td>
                            </tr>  
                             
                            @endforeach

                        </tbody>
                    </table>
<!-- fin de la tabla -->
                </div>
            </div>
        </div>
    </div>
</div>

@section('js')

<script>
    //mensaje de confirmacion de eliminacion
            $('.formulario-eliminar').submit(function(e){
                e.preventDefault();
    
                Swal.fire({
            title: '¿Estas seguro de borrar esto?',
            text: "¡este tipo de producto se eliminara permanentemente!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Si, eliminar!'
            }).then((result) => {
            if (result.isConfirmed) {
    
                this.submit();
            }
            })
            });
    
        </script>
        

    @if (session('eliminar') == 'ok')
        <script>
            //mensaje de eliminado
            Swal.fire(
            '¡Eliminado!',
            'Tu tipo de producto se elimino satisfactoriamente.',
            'success'
            )
        </script>    
    @endif

    @if (session('editar') == 'ok')
        <script>
            //mensaje de editado
            Swal.fire(
            '¡Felicidades!',
            'Tu tipo de producto se edito satisfactoriamente.',
            'success'
            )
        </script>       
    @endif

 
    
@endsection

@endsection

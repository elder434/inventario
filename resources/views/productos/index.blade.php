@extends('layouts.plantilla')

@section('title','inventario')

 @section('css')
 <style>
     /*eliminar el estilo del boton de eliminar*/
    #btneliminar{
        background-color: transparent;
        border: none; 
        outline:none;
    }

</style>   
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>  
 @endsection

@section('contend')

    

<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <!-- tabla -->
                    <table id="zero-config">
                        <thead>
                            <tr>
                                <th>imagen</th>
                                <th>Item</th>
                                <th>Inventario</th>
                                <th>Numero de serie</th>
                                <th>Orden de compra</th>
                                <th>Factura</th>
                                <th>entregado</th>
                                <th style="max-width: 160px"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($producto as $productos)
                            <tr>
                                <td class="text-center">
                                    <span><img src="{{asset($productos->file)}}" class="profile-img" width="90px" height="90px" alt="avatar"></span>
                                </td>
                                <td>{{$productos->tipo_producto->tipo}}</td>
                                <td>{{$productos->inventario}}</td>
                                <td>{{$productos->serie}}</td>
                                <td>{{$productos->orden}}</td>
                                <td>{{$productos->factura}}</td>
                                <td>{{$productos->docente}}</td>
                                <td style="max-width: 160px"> 
                                    <form action="{{route('producto.destroy', $productos)}}" class="formulario-eliminar" method="POST">   
                                        @csrf
                                        @method('delete')  
                                        <div class="d-flex flex-nowrap">
                                            <div>
                                                <a href="{{route('historial.create',$productos)}}" class="col-sm-1 col-md-1" id="all-notes"  title="imprimir"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-6 mb-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></a> 
                                            </div>
                                            <div>
                                                <a href="{{route('producto.edit',$productos)}}" class="col-sm-1 col-md-1" data-toggle="tooltip" data-placement="top" title="editar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-6 mb-1"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a>
                                            </div>
                                            <div>
                                                <button class="col-sm-1 col-md-1" id="btneliminar"  title="eliminar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-6 mb-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></button>  
                                            </div>
                                        </div>
                                    </form>
                                </td>
                            </tr>  
                        @endforeach
                        </tbody>
                    </table>
                    <!-- din de tabla -->
                </div>
            </div>
        </div>
    </div>
</div>



@section('js')



<script>

//alerta de borrar

    $('.formulario-eliminar').submit(function(e){
        e.preventDefault();

        Swal.fire({
    title: '¿Estas seguro de borrar esto?',
    text: "¡este producto se eliminara permanentemente!",
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


    @if (session('error') == 'ok')
        <script>
            //mensaje de elimindado
            Swal.fire(
            '¡error!',
            'Tu producto ya esta entregado.',
            'error'
            )
        </script>    
    @endif


    @if (session('eliminar') == 'ok')
        <script>
            //mensaje de elimindado
            Swal.fire(
            '¡Eliminado!',
            'Tu producto se elimino satisfactoriamente.',
            'success'
            )
        </script>    
    @endif


    @if (session('editar') == 'ok')
        <script>
            //mensaje de editado
            Swal.fire(
            '¡Felicidades!',
            'Tu producto se edito satisfactoriamente.',
            'success'
            )
        </script>    
    @endif


@endsection

@endsection
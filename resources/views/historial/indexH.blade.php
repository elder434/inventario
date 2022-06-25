@extends('layouts.plantilla')

@section('title','index')

 @section('css')
 <style>
     /*elimina el diseño del boton de eliminar*/
    #btneliminar{
        background-color: transparent;
        border: none; 
        outline:none;
    }

</style>     
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
                                <th>EQUIPAMIENTO</th>
                                <th>N° INVENTARIO</th>
                                <th>N° DE SERIE</th>
                                <th>RESPONSABLE</th>
                                <th>ESTADO</th>
                                <th>OBSERVACIONES</th>
                                <th style="max-width: 160px"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tipo as $tipos) 
                            <tr>
                                <td>{{$tipos->tipoE}}</td>
                                <td>{{$tipos->inventarioE}}</td>
                                <td>{{$tipos->serieE}}</td>
                                <td>{{$tipos->responsable}}</td>
                                <td>{{$tipos->estado}}</td>
                                <td>{{$tipos->observacion}}</td>
                                <td style="max-width: 160px">         
                                    <form action="{{route('historial.eliminar',$tipos)}}" class="formulario-eliminar" method="POST">
                                        @csrf
                                        @method('delete')  
                                        <div class="d-flex flex-nowrap">
                                            <a href="{{route('historial.print',$tipos)}}" class="nav-link list-actions active" title="imprimir" id="all-notes"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-6 mb-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></a> 
                                            <button class="col-sm-0.5 col-md-1" id="btneliminar"  title="eliminar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-6 mb-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></button>
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('eliminar') == 'ok')
        <script>
            //mensaje de eliminar
            Swal.fire(
            '¡Eliminado!',
            'Tu registro se elimino satisfactoriamente.',
            'success'
            )
        </script>    
    @endif

    @if (session('editar') == 'ok')
        <script>
            //mensaje de editar
            Swal.fire(
            '¡Felicidades!',
            'Tu registro se edito satisfactoriamente.',
            'success'
            )
        </script>    
    @endif

    <script>
        //mensaje de confirmacion para eliminar
        $('.formulario-eliminar').submit(function(e){
            e.preventDefault();

            Swal.fire({
        title: '¿Estas seguro de borrar esto?',
        text: "¡este registro se eliminara permanentemente!",
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
@endsection

@endsection
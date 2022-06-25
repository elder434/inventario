@extends('layouts.plantilla')

@section('title','imprimir')

 @section('css')
 <link href="{{asset('/cork/assets/css/apps/invoice-preview.css')}}" rel="stylesheet" type="text/css" />

 <style>
     .linea {
  border-top: 1px solid black;
  height: 2px;
  max-width: 200px;
  padding: 0;
  margin: 20px auto 0 auto;
}

    .dt{
        max-width: 150px; 
        overflow: hidden;
    }

     /*eliminar el estilo del boton de eliminar*/
     #btneliminar{
        background-color: transparent;
        border: none; 
        outline:none;
    }
 </style>
 
 @endsection

@section('contend')
<?php $n = 0; ?>
<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="row invoice layout-top-spacing layout-spacing">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="doc-container">
                    <div class="row">
                        <div class="col-xl-9">
                            <div class="invoice-container">
                                <div class="invoice-inbox">
                                    <div id="ct" class="">
                                        <div class="invoice-00001">
                                            <div class="content-section">
                                                <div class="inv--head-section inv--detail-section">
                                                    <div class="row">
                                                        <div class="col-sm-6 col-12 mr-auto">
                                                            <div class="d-flex">
                                                                <h3 class="in-heading align-self-center">Invetario.</h3>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 align-self-center mt-3 text-sm-right">
                                                            <p class="inv-created-date"><span class="inv-title">Fecha : </span><span class="inv-date">{{$date->format('d/m/y')}}</span></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="inv--detail-section inv--customer-detail-section">
                                            <!-- tabla -->
                                                <div class="inv--product-table-section">
                                                    <div class="table-responsive">
                                                        <table class="table table-responsive">
                                                            <thead>
                                                                <tr>
                                                                    <th style="max-width: 160px" scope="col"></th>
                                                                    <th class="dt" scope="col">EQUIPAMIENTO</th>
                                                                    <th class="dt" scope="col">N° INVENTARIO</th>
                                                                    <th class="dt" scope="col">N° DE SERIE</th>
                                                                    <th class="dt" scope="col">RESPONSABLE</th>
                                                                    <th class="dt" scope="col">ESTADO</th>
                                                                    <th class="dt" scope="col">OBSERVACIONES</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($tipo as $tipos)
                                                                <tr>
                                                                    <td scope="col">
                                                                        <form action="{{route('temporal.eliminar',$tipos)}}" class="formulario-eliminar" method="POST">   
                                                                        @csrf
                                                                        @method('delete')  
                                                                        <div class="d-flex flex-nowrap">
                                                                            <div>
                                                                                <a href="{{route('temporal.edit',$tipos)}}" class="col-sm-1 col-md-1" data-toggle="tooltip" data-placement="top" title="editar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-6 mb-1"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a>
                                                                            </div>
                                                                            <div>
                                                                                <button class="col-sm-1 col-md-1" id="btneliminar"  title="eliminar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-6 mb-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></button>  
                                                                            </div>
                                                                        </div>
                                                                        </form>
                                                                    </td style="max-width: 160px">
                                                                    <td class="dt" scope="col">{{$tipos->tipoT}}</td>
                                                                    <td class="dt" scope="col">{{$tipos->inventarioT}}</td>
                                                                    <td class="dt" scope="col">{{$tipos->serieT}}</td>
                                                                    <td class="dt" scope="col">{{$tipos->responsableT}}</td>
                                                                    <td class="dt" scope="col">{{$tipos->estadoT}}</td>
                                                                    <td class="dt" scope="col">{{$tipos->observacionT}}</td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- fin de tabla -->
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        <!-- fin de firmas -->
                        <!--botones-->
                        <div class="col-xl-3">
                            <div class="invoice-actions-btn">
                                <div class="invoice-action-btn">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-3 col-sm-3">
                                            <a href="{{route('temporal.imprimir')}}" class="btn btn-dark btn-edit">Ir a imprimir</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- fin de botones -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  END CONTENT AREA  -->
</div>
@section('js')

<script src="{{asset('/cork/assets/js/apps/invoice-preview.js')}}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
            //mensaje de edicion
            Swal.fire(
            '¡Felicidades!',
            'Tu registro se edito satisfactoriamente.',
            'success'
            )
        </script>    
    @endif
    
@endsection

@endsection
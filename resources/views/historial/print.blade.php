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
 </style>
 
 @endsection

@section('contend')
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
                                                            <p class="inv-created-date"><span class="inv-title">Fecha : </span> <span class="inv-date">{{$date->format('d/m/y')}}</span></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="inv--detail-section inv--customer-detail-section">
                                            <!-- tabla -->
                                                <div class="inv--product-table-section">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead class="">
                                                                <tr>
                                                                    <th scope="col">EQUIPAMIENTO</th>
                                                                    <th scope="col">N° INVENTARIO</th>
                                                                    <th scope="col">N° DE SERIE</th>
                                                                    <th scope="col">RESPONSABLE</th>
                                                                    <th scope="col">ESTADO</th>
                                                                    <th scope="col">OBSERVACIONES</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td scope="col">{{$tipos->tipoE}}</td>
                                                                    <td scope="col">{{$tipos->inventarioE}}</td>
                                                                    <td scope="col">{{$tipos->serieE}}</td>
                                                                    <td scope="col">{{$tipos->responsable}}</td>
                                                                    <td scope="col">{{$tipos->estado}}</td>
                                                                    <td scope="col">{{$tipos->observacion}}</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- fin de tabla -->
                                            <!-- firmas -->
                                            <div class="inv--total-amounts"> 
                                                <div class="row mt-4">
                                                    <div class="col-sm-5 col-12 order-sm-0 order-0">
                                                        <div class="col-sm-7 col-12 order-sm-1 order-0">
                                                            <div class="text-center">
                                                                <div class="row">
                                                                    <div class="col-sm-8 col-7">
                                                                        <div class="linea">firma</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-5 col-12 order-sm-0 order-1">
                                                        <div class="col-sm-7 col-12 order-sm-1 order-0 float-right">
                                                            <div class="text-center">
                                                                <div class="row">
                                                                    <div class="col-sm-8 col-7">
                                                                        <div class="linea">firma</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
                                        <div class="col-xl-12 col-md-4 col-sm-6">
                                            <a href="javascript:void(0);" class="btn btn-secondary btn-print  action-print">Imprimir</a>
                                        </div>
                                        <div class="col-xl-12 col-md-4 col-sm-6">
                                            <a href="{{route('historial.index')}}" class="btn btn-success btn-download">Ir al historial</a>
                                        </div>
                                        <div class="col-xl-12 col-md-4 col-sm-6">
                                            <form action="" method="get">
                                                <a href="{{route('historial.edit',$tipos)}}" class="btn btn-dark btn-edit">Editar</a>
                                            </form>
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
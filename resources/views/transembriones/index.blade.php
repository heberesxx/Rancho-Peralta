<!--
Universidad Nacional Autónoma de Honduras (UNAH)
Facultad de Ciencias Económicas, Administrativas y Contables Departamento de Informática Administrativa
Analisis, Programacion y Evaluacion de Sistemas
Primer Período 2022

Equipo:
Jennifer Azucena Claros Flores..........(jeniclaros028@gmail.com)
Nancy Gicela Dominguez Cruz.............(cruzgicela0503@gmail.com)			 
Jeffry Joseph Aguilar Corrales..........(jeffryaguilaraguilarcorrales@gmail.com)			
Carlos Ramón Funes Silva................(Carlosramon.funessilva@gmail.com)			
Nisi Farid Sanchéz......................(farid.sanchez26@gmail.com)				
Heber Noel Espinoza Alvarado............(ever2526v5@gmail.com)				
					




===============================================================================
Catedrático:
Lic. Lester Josué Fiallos Peralta 
Lic. Lester Josué Fiallos Peralta 
Lic. Karla Melisa Garcia Pineda


===============================================================================
Programa:          Rancho Peralta
Pantalla:          Transferencias de Embriones
Fecha:             0/02/2022
Programador:       Heber Espinoza
descripción:       Pantalla que permite vizualizar el las Transferencias hechas a través de embriones. 



-->
@extends('adminlte::page')

@section('title', 'Transferencias de Embriones')
@can('VER_TRANSFERENCIAS EMBRION')
@section('content_header')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Registro de Transferencia de Embriones</h1>
            </div>
            <div class="col-sm-6">
            </div>
        </div>
    </div>
</section>

@stop

@section('content')

<div class="container-fluid">
    @if (session('info'))
    <div class="alert alert-success alert-dismissible mt-2 text-center" role="alert">
        <span type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
        <strong>{{session('info')}}</strong>
    </div>
    @endif
    @if (session('edit'))
    <div class="alert alert-warning text-center" role="alert">
        <span type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
        <strong>{{session('edit')}}</strong>
    </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                @can('INSERTAR_TRANSFERENCIAS EMBRION')
                <div class="card-header">
                    <div class="box-header">

                        <a href="{{route('transembriones.create')}}" class="btn btn-info">
                            <span class="mr-2">Nueva Transferencia</span> <i class="fas fa-plus-square"></i>
                        </a>

                        <a href="{{route('transembriones.pdf')}}" class="btn btn-danger"  target="_blank" style=" margin-left: 35%;" >
                            <span class="mr-2">PDF</span>
                        </a>
                    </div>
                </div>
                @ENDCAN


                <div class="card-body">


                    <table id="TB" class="table table-bordered table-hover US">
                        <thead style="background-color: #e1e2f6;">
                            <tr>
                                <th class="text-center">Código</th>
                                <th class="text-center">Raza Vaca Donadora</th>
                                <th class="text-center">Raza Toro Donador</th>
                                <th class="text-center">Detalles Vaca Receptora</th>
                                <th class="text-center">Estado Embrión</th>
                                <th class="text-center">Fecha de Fecundación</th>
                                @can('EDITAR_TRANSFERENCIAS EMBRION')
                                <th class="text-center" >Editar</th>
                                @ENDCAN
                             
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transembriones as $transembrion)
                            <tr>
                                <td class="text-center">{{ $transembrion->COD_TRANS_EMBRION }}</td>
                                <td class="text-center">{{ $transembrion->RAZ_VACA_DONADORA }}</td>
                                <td class="text-center">{{ $transembrion->RAZ_TORO_DONADOR }}</td>
                                <td class="text-center">{{'Nombre: '. $transembrion->NOM_GANADO.', Raza: '.$transembrion->RAZA.', Arete: '.$transembrion->ARETE.', Color: '.$transembrion->COLOR.', Edad: '.$transembrion->EDAD_GANADO.' años'}}</td>
                                <td class="text-center">{{ $transembrion->IND_FECUNDACION }}</td>
                                <td class="text-center" >{{\Carbon\Carbon::parse( $transembrion->FEC_REGISTRO)->format('d-m-Y') }}</td>
                                @can('EDITAR_TRANSFERENCIAS EMBRION')
                                <td class="text-center" ><a class="btn btn-warning btn-sm fa fa-edit " href="{{url('transembriones/' . $transembrion->COD_TRANS_EMBRION . '/edit')}}"></a>
                                </td>
                                @ENDCAN
                             
                            </tr>
                            @endforeach
                        </tbody>
                    </table>



                </div>
            </div>
        </div>
    </div>
</div>

@stop
@else
@section('content')
<div class="error-page">
    <h2 class="headline text-warning"> 403</h2>
    <div class="error-content">
        <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! página no encontrada.</h3>
        <p>
            No podemos mostrarle esta página porque no tiene permisos, si desea acceder consulte al administrador de seguridad.
        </p>

    </div>

</div>
@stop
@endcan

@section('footer')
<strong>Copyright &copy; 2022<a href="#">UNAH</a>.</strong> Todos los derechos reservados
<div class="float-right d-none d-sm-inline-block">
   
</div>

@stop

@section('css')
<link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="{{ asset ('vendors/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
 
@stop

@section('js')
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

<script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.1.1/js/buttons.html5.styles.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.1.1/js/buttons.html5.styles.templates.min.js"></script>

<script>
    $(document).ready(function() {
        $('#TB').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"

            },
            "bSort": false,
            "autoWidth": false,
            "responsive": true,
            dom: '<"pt-2 row" <"col-xl mt-2"l><"col-xl text-center"B><"col-xl text-right mt-2 "f>> <"row"rti<"col"><p>>',
            buttons: {
                dom: {
                    button: {

                        className: 'btn'

                    }
                },
                buttons: [{

                        extend: 'print',
                        text: 'Imprimir',
                        className: 'btn btn-secondary glyphicon glyphicon-duplicate',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5]
                        },
                    },
                    {
                        extend: "excel",
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5]
                        },
                        text: 'Excel',
                        className: 'btn btn-success',


                        // 1 - ejemplo básico - uso de templates pre-definidos
                        //definimos los parametros al exportar a excel

                        excelStyles: {
                            template: "header_blue", // Apply the 'header_blue' template part (white font on a blue background in the header/footer)
                        },


                        // 2 - estilos a una fila   

                        excelStyles: { // Add an excelStyles definition
                            cells: "2",
                            // adonde se aplicaran los estilos (fila 2)
                            style: { // The style block
                                font: { // Style the font
                                    name: "Arial", // Font name
                                    size: "12", // Font size
                                    color: "FFFFFF", // Font Color
                                    b: true,
                                   // negrita SI
                                },
                                fill: { // Estilo de relleno (background)
                                    pattern: { // tipo de rellero (pattern or gradient)
                                        color: "ff7961", // color de fondo de la fila
                                    }
                                }
                            }
                        },



                     


                        // ejemplo para IMPRIMIR

                        pageStyle: {
                            sheetPr: {
                                pageSetUpPr: {
                                    fitToPage: 1 // Fit the printing to the page
                                }
                            },
                            printOptions: {
                                horizontalCentered: true,
                                verticalCentered: true,
                            },
                            pageSetup: {
                                orientation: "landscape", // Orientacion
                                paperSize: "9", // Tamaño del papel (1 = Legal, 9 = A4)
                                fitToWidth: "1", // Ajustar al ancho de la página
                                fitToHeight: "0", // Ajustar al alto de la página
                            },
                            pageMargins: {
                                left: "0.2",
                                right: "0.2",
                                top: "0.4",
                                bottom: "0.4",
                                header: "0",
                                footer: "0",
                            },
                            repeatHeading: true, // Repeat the heading row at the top of each page
                            repeatCol: 'A:A', // Repeat column A (for pages wider than a single printed page)
                        },
                        excelStyles: {
                            template: 'blue_gray_medium', // Add a template style as well if you like
                        }

                    }
                ]

            }





        });
    });
</script>
</script>
@stop
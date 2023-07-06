<x-doctor-layout>
    @push('styles')
        <link rel="stylesheet" href="{{ asset('Datatables/datatables.min.css') }}">
        <style>
            .btn {
                display: inline-block;
                font-size: 14px;
                font-weight: 400;
                line-height: 1.42857143;
                text-align: center;
                white-space: nowrap;
                vertical-align: middle;
                cursor: pointer;
                user-select: none;
                background-image: none;
                border: 1px solid transparent;
                border-radius: 4px;
            }


            .btn-app {
                color: white;
                box-shadow: none;
                border-radius: 3px;
                position: relative;
                padding: 10px 15px;
                margin: 0;
                min-width: 60px;
                max-width: 80px;
                text-align: center;
                border: 1px solid #ddd;
                background-color: #f4f4f4;
                font-size: 12px;
                transition: all .2s;
                background-color: steelblue !important;
            }

            .btn-app>.fa,
            .btn-app>.glyphicon,
            .btn-app>.ion {
                font-size: 30px;
                display: block;
            }

            .btn-app:hover {
                border-color: #aaa;
                transform: scale(1.1);
            }

            .pdf {
                background-color: #dc2f2f !important;
            }

            .excel {
                background-color: #3ca23c !important;
            }

            .csv {
                background-color: #e86c3a !important;
            }

            .imprimir {
                background-color: #8766b1 !important;
            }

            .selectTable {
                height: 40px;
                float: right;
            }

            div.dataTables_wrapper div.dataTables_filter {
                text-align: left;
                margin-top: 15px;
            }

            .btn-secondary {
                color: #fff;
                background-color: #4682b4;
                border-color: #4682b4;
            }

            .btn-secondary:hover {
                color: #fff;
                background-color: #315f86;
                border-color: #545b62;
            }



            .titulo-tabla {
                color: #606263;
                text-align: center;
                margin-top: 15px;
                margin-bottom: 15px;
                font-weight: bold;
            }






            .inline {
                display: inline-block;
                padding: 0;
            }
        </style>
    @endpush
    <div class="border mx-auto max-w-7xl p-8 my-6">
        <x-marco class="max-w-7xl">

            <x-slot name="titulo">{{ __('list of surgeries') }} </x-slot>

            <table style="width:100%" id="patologias" class="w-full text-sm text-left text-gray-500 dark:text-gray-400"
                style="width:100%">
                <caption
                    class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                    Filtros de Cirugías que poseen los Pacientes
                    <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Puede filtrar por los pacientes
                        que poseen ciertas cirugías y han sido revisadas durante entrevistas, por el % de ellos que los
                        poseen, el total de ellos y generar
                        reportes en los formatos disponibles.</p>
                </caption>
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th width="10%" style="text-align: center">{{ __('Cantidad') }}</th>
                        <th width="10%" style="text-align: center">{{ __('%') }}</th>
                        <th width="50%">{{ __('Cirugía') }}</th>
                        <th width="30%">{{ __('Pacientes') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $d)
                        <tr>
                            <td class="text-center text-sm text-gray-500">{{ $d['total'] }}</td>
                            <td class="text-center text-sm text-gray-500">{{ $d['promedio'] }}</td>
                            <td>{{ $d['cirugia'] }}</td>
                            <td class="text-justify text-sm">
                                @foreach ($d['pacientes'] as $p)
                                    <p>{{ $p->name }}</p>
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </x-marco>
        @push('script')
            <script src="{{ asset('js/code.jquery.com_jquery-3.5.1.js') }}"></script>
            <script src="{{ asset('Datatables/datatables.min.js') }}"></script>
            <script>
                $(document).ready(function() {
                    var idioma =

                        {
                            "sProcessing": "Procesando...",
                            "sLengthMenu": "Mostrar _MENU_ registros",
                            "sZeroRecords": "No se encontraron resultados",
                            "sEmptyTable": "NingÃºn dato disponible en esta tabla",
                            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                            "sInfoPostFix": "",
                            "sSearch": "Buscar:",
                            "sUrl": "",
                            "sInfoThousands": ",",
                            "sLoadingRecords": "Cargando...",
                            "oPaginate": {
                                "sFirst": "Primero",
                                "sLast": "Ãšltimo",
                                "sNext": "Siguiente",
                                "sPrevious": "Anterior"
                            },
                            "oAria": {
                                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                            },
                            "buttons": {
                                "copyTitle": 'Informacion copiada',
                                "copyKeys": 'Use your keyboard or menu to select the copy command',
                                "copySuccess": {
                                    "_": '%d filas copiadas al portapapeles',
                                    "1": '1 fila copiada al portapapeles'
                                },

                                "pageLength": {
                                    "_": "Mostrar %d filas",
                                    "-1": "Mostrar Todo"
                                }
                            }
                        };
                    var $tableSel = $('#patologias');
                    var dataTable = $tableSel.DataTable({
                        "paging": true,
                        "lengthChange": true,
                        "searching": true,
                        "ordering": true,
                        "info": true,
                        "autoWidth": true,
                        "language": idioma,
                        "lengthMenu": [
                            [5, 10, 20, -1],
                            [5, 10, 50, "Mostrar Todo"]
                        ],
                        "columnDefs": [{
                            "targets": [],
                            "orderable": true
                        }],
                        "dom": 'Bfrt<"col-md-6 inline"i> <"col-md-6 inline"p>',
                        buttons: {
                            dom: {
                                container: {
                                    tag: 'div',
                                    className: 'flexcontent'
                                },
                                buttonLiner: {
                                    tag: null
                                }
                            },
                            buttons: [{
                                    extend: 'copyHtml5',
                                    text: '<i class="fa fa-clipboard"></i>Copiar',
                                    title: 'Reporte de Cirugías',
                                    titleAttr: 'Copiar',
                                    className: 'btn btn-app export barras',
                                    exportOptions: {
                                        columns: [0, 1, 2, 3]
                                    }
                                },
                                {
                                    extend: 'pdfHtml5',
                                    text: '<i class="fa fa-file-pdf-o"></i>PDF',
                                    title: 'Reporte de Cirugías',
                                    titleAttr: 'PDF',
                                    className: 'btn btn-app export pdf',
                                    exportOptions: {
                                        columns: [0, 1, 2, 3]
                                    },
                                    customize: function(doc) {

                                        doc.styles.title = {
                                            color: '#4c8aa0',
                                            fontSize: '30',
                                            alignment: 'center'
                                        }
                                        doc.styles['td:nth-child(2)'] = {
                                                width: '100px',
                                                'max-width': '100px'
                                            },
                                            doc.styles.tableHeader = {
                                                fillColor: '#4c8aa0',
                                                color: 'white',
                                                alignment: 'center'
                                            },
                                            doc.content[1].margin = [100, 0, 100, 0]
                                    }
                                },
                                {
                                    extend: 'excelHtml5',
                                    text: '<i class="fa fa-file-excel-o"></i>Excel',
                                    title: 'Reporte de Cirugías',
                                    titleAttr: 'Excel',
                                    className: 'btn btn-app export excel',
                                    exportOptions: {
                                        columns: [0, 1, 2, 3]
                                    },
                                },
                                {
                                    extend: 'csvHtml5',
                                    text: '<i class="fa fa-file-text-o"></i>CSV',
                                    title: 'Reporte de Cirugías',
                                    titleAttr: 'CSV',
                                    className: 'btn btn-app export csv',
                                    exportOptions: {
                                        columns: [0, 1, 2, 3]
                                    }
                                },
                                {
                                    extend: 'print',
                                    text: '<i class="fa fa-print"></i>Imprimir',
                                    title: 'Reporte de Cirugías',
                                    titleAttr: 'Imprimir',
                                    className: 'btn btn-app export imprimir',
                                    exportOptions: {
                                        columns: [0, 1, 2, 3]
                                    }
                                },
                                {
                                    extend: 'pageLength',
                                    titleAttr: 'Registros a mostrar',
                                    className: 'selectTable'
                                }
                            ]
                        }
                    });
                });
            </script>
        @endpush
</x-doctor-layout>

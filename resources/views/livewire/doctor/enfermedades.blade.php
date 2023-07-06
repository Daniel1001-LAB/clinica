@push('styles')
<link rel="stylesheet" href="{{ asset('css/cdn.datatables.net_1.13.4_css_jquery.dataTables.min.css') }}">
@endpush
<section class="bg-white z-1 rounded max-w-3xl mx-auto p-8 border shadow-xl my-6">
    <h1 class="text-center my-3">Listado de Enfermedades OMS</h1>
    <table id="tenfermedades" class="row-border text-sm" style="width:100%">
        <thead>
            <tr>
                <th>Patologías</th>
                <th>Btn</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</section>
@push('script')
<script src="{{ asset('js/code.jquery.com_jquery-3.5.1.js') }}"></script>
<script src="{{ asset('js/cdn.datatables.net_1.13.4_js_jquery.dataTables.min.js') }}"></script>
<script>
        $(document).ready(function() {
            $('#tenfermedades').DataTable({
                responsive: true,
                "pagingType": "first_last_numbers",
                "language": {
                    "info": "_PAGE_ de _PAGES_ ,  Total: _TOTAL_ ",
                    "search": " ",
                    "paginate": {
                        "next": "Siguiente",
                        "previous": "Anterior",
                        "last": "Último",
                        "first": "Primero",
                    },
                    "lengthMenu": "<select class='custom-select custom-select-sm'>" +
                        "<option value='5'>5</option>" +
                        "<option value='10'>10</option>" +
                        "<option value='15'>15</option>" +
                        "<option value='20'>20</option>" +
                        "<option value='25'>25</option>" +
                        "<option value='50'>50</option>" +
                        "<option value='100'>100</option>" +
                        "<option value='-1'>Todos</option>" +
                        "</select>",
                    "loadingRecord": "Cargando....",
                    "processing": "Procesando...",
                    "emptyTable": "No hay Registros",
                    "zeroRecords": "No hay coincidencias",
                    "infoEmpty": "",
                    "infoFiltered": ""
                },

                processing: true,
        serverSide: true,
        ajax: "{{route('pathologies.index')}}",
            dataType: 'json',
            columns: [{
                    data: 'name',
                    name: 'name'
                },
                {
                    data:'btn',
                    name: 'btn'

                }

            ]

            });
        });
    </script>
@endpush

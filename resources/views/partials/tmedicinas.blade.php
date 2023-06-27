<section class="bg-white z-1 rounded max-w-2xl mx-auto p-8">
    <table id="tmedicinas" class="text-sm" style="width:100%">
        <thead>
            <tr>
                <th>Medicinas</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($medicines as $a)
                <tr>
                    <th class="px-6 py-4 font-normal text-gray-900 text-center">
                        <div class="text-sm">
                            <div class="text-sm text-gray-500">
                                <span class="text-gray-700 font-medium">{{ $a->name }}</span>
                                <div class="border p-4">
                                <span>Prescripción: Tomar {{ $a->dose.'   '.$a->dose_unit  }} </span>
                                <br>
                                <span>Frecuencia: Cada {{ $a->num_frecuency.'   '.$a->frecuency  }} </span>
                                <br>
                                <span>Duración: Por {{ $a->num_duration.'   '.$a->duration  }} </span>
                                <br>
                                <span>Instrucciones: Por {{ $a->instruction  }} </span>
                                <br>
                                <span>{{ date('d-m-Y', strtotime($a->created_at))}},</span>
                                <span>{{date('g:i A', strtotime($a->created_at)) }},</span>

                            </div>

                        </div>
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>
</section>
@push('script')
    <script>
        $(document).ready(function() {
            $('#tmedicinas').DataTable({
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
                "columnDefs": [{
                    "targets": [0],
                    "orderable": true
                }]


            });
        });
    </script>
@endpush

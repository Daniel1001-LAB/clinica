<section class="bg-white z-1 rounded max-w-2xl mx-auto p-8">
    <table id="tsintomas" class="row-border text-sm" style="width:100%">
        <thead>
            <tr>
                <th>Sistomatología</th>
            </tr>
        </thead>
        <tbody>
            @foreach (auth()->user()->symptoms as $a)
                <tr>
                    <th class="px-6 py-4 font-normal text-gray-900 text-center">
                        <div class="text-sm">
                            <div class="font-medium text-gray-700">{{ $a->pivot->name }}</div>
                            <div class="font-medium text-gray-400">{{$a->created_at->diffForHumans()}}</div>
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
            $('#tsintomas').DataTable({
                responsive: true,
                "pagingType": "first_last_numbers",
                "language": {
                    "info": "pag  _PAGE_ de _PAGES_  pags,  Total: _TOTAL_ ",
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

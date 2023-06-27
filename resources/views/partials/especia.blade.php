
<section class="bg-white z-1 rounded max-w-2xl mx-auto p-8">
    <table id="especialidades" class="row-border text-sm" style="width:100%">
        <thead>
            <tr>
                <th>Especialidad</th>
                <th class="sm:hidden md:block">Medico</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($specialties as $specialty )
            <tr>
                <td>
                    <div class=" text-gray-400">{{ $specialty->name }}</div>
                </td>
                <th class="sm:hidden md:block flex flex-col gap-3 px-6 py-4 font-normal text-gray-900">
                    @foreach ($specialty->doctors as $doctor )
                    <div class="text-sm">

                        <div class="text-justify font-medium text-gray-700">
                            <span>
                                <i class="icono fa-solid fa-hand-holding-medical"></i>
        </span>
                            {{ $doctor->name }}</div>
                    </div>
                    @endforeach
                </th>
                <td><i class="icono fa-solid fa-newspaper"></i></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</section>
@push('script')
<script>
   $(document).ready(function () {
    $('#especialidades').DataTable({
        responsive: true,
        "pagingType":"first_last_numbers",
           "language":{
             "info": "pag  _PAGE_ de _PAGES_  pags,  Total: _TOTAL_ ",
               "search":"Buscar  ",
               "paginate":{
                   "next":"Siguiente",
                   "previous":"Anterior",
                   "last":"Último",
                   "first":"Primero",
               },
               "lengthMenu":"Mostrar  <select class='custom-select custom-select-sm'>"+
                             "<option value='5'>5</option>"+
                             "<option value='10'>10</option>"+
                             "<option value='15'>15</option>"+
                             "<option value='20'>20</option>"+
                             "<option value='25'>25</option>"+
                             "<option value='50'>50</option>"+
                             "<option value='100'>100</option>"+
                             "<option value='-1'>Todos</option>"+
                             "</select> Registros",
               "loadingRecord":"Cargando....",
               "processing":"Procesando...",
               "emptyTable":"No hay Registros",
               "zeroRecords":"No hay coincidencias",
               "infoEmpty":"",
               "infoFiltered":""
           },
           "columnDefs": [{ "targets": [2], "orderable": false }]


    });
});
</script>

@endpush

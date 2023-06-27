
<section class="bg-white z-1 rounded max-w-2xl mx-auto p-8">
    <table id="te" class="row-border text-sm" style="width:100%">
        <thead>
            <tr>
                <th>Doctor</th>
<th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($interviews as $a )
            <tr>
                <th class="flex gap-3 px-6 py-4 font-normal text-gray-900">
                    <div class="relative h-10 w-10 top-4">
                      <img
                        class="h-full w-full rounded-full object-cover object-center"
                        src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                        alt=""
                      />
                      <span class="absolute right-0 bottom-0 h-2 w-2 rounded-full bg-green-400 ring ring-white"></span>

                    </div>
                    <div class="text-sm">
                        <div class="font-medium text-gray-700">{{ $a->doctor }}</div>
                      <div class="font-medium text-gray-400">{{ date('d-m-Y', strtotime($a->date))}}</div>
                    </div>
                  </th>

                <td>
                  <div>
                    <small><p class="text-center text-gray-700 font-medium underline">Motivos</p></small>
                    <small><p>{{ $a->suspicion }}</p></small>
                  </div>
                  <div>
                    <small><p class="text-center text-gray-700 font-medium underline">Diagnóstico</p></small>
                    <small><p>{{ $a->diagnosis }}</p></small>
                  </div>
                  <div>
                    <small><p class="text-center text-gray-700 font-medium underline">Medicinas</p></small>
                    @forelse($a->medicines as $m)
                    <small><p>{{ $m->name }}</p></small>
                    @empty
                    <small><p>No hay Medicinas registradas</p></small>

                    @endforelse
                  </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</section>
@push('script')
<script>
   $(document).ready(function () {
    $('#te').DataTable({
        responsive: true,
        "pagingType":"first_last_numbers",
           "language":{
             "info": "pag  _PAGE_ de _PAGES_  pags,  Total: _TOTAL_ ",
               "search":"  ",
               "paginate":{
                   "next":"Siguiente",
                   "previous":"Anterior",
                   "last":"Último",
                   "first":"Primero",
               },
               "lengthMenu":"<select class='custom-select custom-select-sm'>"+
                             "<option value='5'>5</option>"+
                             "<option value='10'>10</option>"+
                             "<option value='15'>15</option>"+
                             "<option value='20'>20</option>"+
                             "<option value='25'>25</option>"+
                             "<option value='50'>50</option>"+
                             "<option value='100'>100</option>"+
                             "<option value='-1'>Todos</option>"+
                             "</select>",
               "loadingRecord":"Cargando....",
               "processing":"Procesando...",
               "emptyTable":"No hay Registros",
               "zeroRecords":"No hay coincidencias",
               "infoEmpty":"",
               "infoFiltered":""
           },
           "columnDefs": [{ "targets": [1], "orderable": false }]


    });
});
</script>


@endpush

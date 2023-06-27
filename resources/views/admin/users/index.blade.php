<x-admin-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">

    <script src="https://kit.fontawesome.com/1b1b574e94.js" crossorigin="anonymous"></script>
    <x-slot name="header">
        {{-- <h1>{{ auth()->user()->users()->first()->permissions}}</h1> --}}
        <h3 class="text-black fw-bolder">{{ __('User Administration') }}</h3>
    </x-slot>

    <div class="container mt-10">
        <div class="card shadow h-100 mb-4 mx-auto w-full">
            <div class="card-header ">
                <div class="flex justify-between items-center">
                    <h5 class="text-black fw-bolder">{{ __('List of users') }}</h5>


                </div>
            </div>


            <div class="card-body">
                <div class="table-responsive">
                    <table id="user" name="user" class="table table-hover text-sm table-md table-responsive"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Email') }}</th>
                                {{-- <th>{{ __('Address') }}</th> --}}
                                <th>{{ __('Phone') }}</th>
                                <th>{{ __('Role') }}</th>
                                <th data-orderable="false">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>

                    </table>
                </div>

            </div>

        </div>

    </div>


    @push('script')
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

        <script>
            $(document).ready(function() {
                var table = new DataTable('#user', {
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
                    },
                    "dom": 'Bfrtilp',
                    "stateSave":true,
                    "processing": true,
                    "responsive": true,
                    "serverSide": true,
                    "ajax": '{{ url('api/users') }}',
                    "columns": [{
                            data: 'id'
                        },
                        {
                            data: 'name'
                        },
                        {
                            data: 'email'
                        },
                        {
                            data: 'phone'
                        },
                        {
                            data: 'roles.[0].name'
                        },
                        {
                            data: 'btn'
                        },
                    ],

                    "columnDefs": [{
                            "targets": [4],
                            "orderable": false,
                            "searchable": false,
                            "targets": 4, // el índice de la columna "Estado" en base 0 es 6
                            "render": function(data, type, row) {
                                var badgeClass =
                                'text-bg-secondary'; // asignar la clase "text-bg-secondary" por defecto
                                var text = '';
                                switch (data) {
                                    case 'super-admin':
                                        badgeClass = 'text-bg-warning';
                                        break;
                                    case 'admin':
                                        badgeClass = 'text-bg-warning';
                                        break;
                                    case 'doctor':
                                        badgeClass = 'text-bg-primary';
                                        break;
                                    case 'patient':
                                        badgeClass = 'text-bg-success';
                                        break;
                                    case 'user':
                                        badgeClass = 'text-bg-info';
                                        break;
                                    case '':
                                        badgeClass = 'text-bg-secondary';
                                        break;
                                }
                                return '<span class="text-capitalize badge strong ' + badgeClass +
                                    '">' + data + '</span>';
                            }
                        },

                    ],



                });


                setTimeout(function() {
                    $('#alert').remove();
                }, 12200);

                $('.form-delete').submit(function(e) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Swal.fire(
                            //     'Deleted!',
                            //     'Your file has been deleted.',
                            //     'success'
                            // )

                            this.submit()
                        }
                    })
                });

            });
        </script>
    @endpush
</x-admin-layout>

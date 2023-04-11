<x-admin-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">

    <script src="https://kit.fontawesome.com/1b1b574e94.js" crossorigin="anonymous"></script>
    <x-slot name="header">
        {{-- <h1>{{ auth()->user()->specialties()->first()->permissions}}</h1> --}}
        <h3 class="text-black fw-bolder">{{ __('Specialtie Administration') }}</h3>
    </x-slot>

    <div class="container mt-10">
        <div class="card shadow h-100 mb-4 mx-auto w-full">
            <div class="card-header ">
                <div class="flex justify-between items-center">
                    <h5 class="text-black fw-bolder">{{ __('List of specialties') }}</h5>
                    <a href="{{ route('specialties.create') }}" specialtie="button"
                        class="btn btn-outline-success d-inline-flex align-items-center"
                        title="{{ __('add specialtie') }}">
                        {{ __('add specialtie') }}
                        <i class="ms-1 fa-solid fa-arrow-right-long"></i>
                    </a>

                </div>
            </div>


            <div class="card-body">
                <table id="specialtie" name="specialtie" class="table table-hover table-sm table-responsive"
                    style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th data-orderable="false">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($specialties as $specialtie)
                            <tr>
                                <td width="20%">{{ $specialtie->id }}</td>
                                <td class="text-capitalize" width="30%">{{ __($specialtie->name) }}</td>
                                <td class="text-capitalize" width="30%">{{ __($specialtie->description) }}</td>
                                <td width="10%">
                                    <a class="btn btn-primary rounded-circle p-2 lh-1"
                                        href="{{ route('specialties.show', $specialtie->id) }}"> <i
                                            class="fa-solid fa-eye"></i></a>
                                    <a class="btn btn-warning rounded-circle p-2 lh-1"
                                        href="{{ route('specialties.edit', $specialtie->id) }}"> <i
                                            class="fa-solid fa-pen-to-square"></i></a>
                                    <form action="{{ route('specialties.destroy', $specialtie->id) }}" method="POST"
                                        class="btn btn-danger rounded-circle p-2 lh-1 form-delete">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>

        </div>

    </div>


    @push('script')
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            $(document).ready(function() {
                var table = new DataTable('#specialtie', {
                    language: {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
                    },
                    "stateSave":true,
                    "processing": true,
                    "responsive": true,


                });

                //Tiempo de la alerta
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

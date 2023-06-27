<x-admin-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">
    <x-slot name="header">
        {{-- <h1>{{ auth()->user()->roles()->first()->permissions}}</h1> --}}
        <h3 class="text-black fw-bolder">{{__('Role Administration')}}</h3>
    </x-slot>

    <div class="container mt-10">
        <div class="card shadow h-100 mb-4 mx-auto w-full">
            <div class="card-header ">
                <div class="flex justify-between items-center">
                    <h5 class="text-black fw-bolder">{{__('List of Roles')}}</h5>
                <a href="{{ route('roles.create')}}" role="button" class="btn btn-outline-success d-inline-flex align-items-center" title="{{__('add role')}}">
                    {{__('add role')}}
                    <i class="ms-1 fa-solid fa-arrow-right-long"></i>
                </a>

                </div>
            </div>


            <div class="card-body">
                <table id="role" name="role" class="table table-hover table-sm table-responsive" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th data-orderable="false">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                        <tr>
                            <td width="5%" >{{ $role->id }}</td>
                            <td class="text-capitalize" width="70%">{{ __($role->name) }}</td>
                            <td width="20%">
                                <a class="btn btn-primary rounded-circle p-2 lh-1" href="{{ route('roles.show', $role->id)}}"> <i class="fa-solid fa-eye"></i></a>
                                <a class="btn btn-warning rounded-circle p-2 lh-1" href="{{ route('roles.edit', $role->id)}}"> <i class="fa-solid fa-pen-to-square"></i></a>
                                <form action="{{ route('roles.destroy', $role->id)}}" method="POST" class="btn btn-danger rounded-circle p-2 lh-1">
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
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>

        <script>
            $(document).ready(function () {
                var table  = new DataTable ('#role' ,{
                    language: {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
                    },


                });


                setTimeout(function(){
                    $('#alert').remove();
                }, 12200);

            });
        </script>
    @endpush
</x-admin-layout>


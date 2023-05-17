<x-admin-layout>

    <x-slot name="header">
        {{-- <h1>{{ auth()->user()->users()->first()->permissions}}</h1> --}}
        <h3 class="text-black fw-bolder">{{__('User Administration')}}</h3>
    </x-slot>

    <div class="container mt-10">
        <div class="card shadow h-100 mb-4 mx-auto w-full">
            <div class="card-header ">
                <div class="flex justify-between items-center">
                    <h5 class="text-black fw-bolder">{{__('List of users')}}</h5>
                <a href="{{ route('users.create')}}" user="button" class="btn btn-outline-success d-inline-flex align-items-center" title="{{__('add user')}}">
                    {{__('add user')}}
                    <i class="ms-1 fa-solid fa-arrow-right-long"></i>
                </a>

                </div>
            </div>


            <div class="card-body">
                <table id="user" name="user" class="table table-hover text-sm table-md table-responsive" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>{{__('Name')}}</th>
                            <th>{{__('Email')}}</th>
                            <th>{{__('Address')}}</th>
                            <th>{{__('Phone')}}</th>
                            <th>{{__('Role')}}</th>
                            <th data-orderable="false">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td width="2%" >{{ $user->id }}</td>
                            <td class="text-capitalize" >{{ __($user->name) }}</td>
                            <td class="" >{{ __($user->email) }}</td>
                            <td class="text-capitalize" >{{ __($user->address) }}</td>
                            <td class="" >{{ __($user->phone) }}</td>
                            <td class="text-capitalize" >{{ __($user->role) }}</td>

                            <td class="justify-between" width="15%">
                                <a class="btn btn-primary rounded-circle p-2 lh-1" href="{{ route('users.show', $user->id)}}"> <i class="fa-solid fa-eye"></i></a>
                                <a class="btn btn-warning rounded-circle p-2 lh-1" href="{{ route('users.edit', $user->id)}}"> <i class="fa-solid fa-pen-to-square"></i></a>
                                <form action="{{ route('users.destroy', $user->id)}}" method="POST" class="btn btn-danger rounded-circle p-2 lh-1">
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


        <script>
            $(document).ready(function () {
                var table  = new DataTable ('#user' ,{
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


<x-admin-layout>



    <div class="container-sm   pt-4 ">
        <div class="card mb-3 text-dark border-secondary  shadow-lg" >
            <div class="card-header font-bold text-2xl capitalize"><strong>{{ __($title) }}</div>
            <div class="card-body">

                <form action="{{route('users.update', $user->id)}}" method="POST">
                    @method('PUT')
                    @include('admin.users.partials.form')

                </form>
            </div>
        </div>
    </div>


</x-admin-layout>

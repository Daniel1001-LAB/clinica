<x-admin-layout>



    <div class="container-sm callout callout-primary  pt-4 ">
        <div class="card mb-3 text-dark  mb-3 shadow-lg" >
            <div class="card-header font-bold text-2xl capitalize"><strong>{{ __($title) }}</div>
            <div class="card-body">

                <form action="{{route('users.store')}}" method="POST">
                    @include('admin.users.partials.form')

                </form>
            </div>
        </div>
    </div>


</x-admin-layout>

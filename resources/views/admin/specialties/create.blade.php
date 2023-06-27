<x-admin-layout>

    <div class="container-sm pt-4 col-6">
        <div class="card text-dark bg-light mb-3 shadow-lg" >
            <div class="card-header font-bold text-2xl capitalize"><strong>{{ __($title) }}</div>
            <div class="card-body">

                <form action="{{route('specialties.store')}}" method="POST">
                    @include('admin.specialties.partials.form')

                </form>
            </div>
        </div>
    </div>


</x-admin-layout>

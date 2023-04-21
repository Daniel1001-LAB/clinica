<x-doctor-layout>
    <div class="container p-3">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('assets/vectors/DrawKit Vector Illustration Health & Medical (6).svg') }}"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-capitalize">{{ __('specialties') }}</h5>
                        @livewire('specialty.specialty-list')
                        <hr>
                        @livewire('specialty.specialty-create')
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-doctor-layout>

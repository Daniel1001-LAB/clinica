<x-dialog-modal wire:model="workdayEditModal">
    <x-slot name="title">
        <div class="row d-flex flex-column align-items-start">
            <h2 class="text-monospace font-medium">Horario del dia <strong
                    class="text-primary text-uppercase">{{ __($dia) }}</strong> </h2>
            <div class=" ">
                <span
                    class="badge d-flex align-items-center p-2 pe-3 text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-pill">

                    <input class="form-check-input p-2 m-2" type="checkbox" wire:model="active">
                    <label class="form-check-label text-capitalize" for="active">
                        {{ __('active') }}
                    </label>

                </span>

            </div>

        </div>

    </x-slot>

    <x-slot name="content">

        <div class="card row d-flex flex-column align-items-start mb-3 shadow p-3">

            <h4 class="text-capitalize">{{ __('morning') }} <i class="ms-3 fa-solid fa-sun" style="color: #cbce32;"></i>
            </h4>
            <hr class="border border-dark border-2 opacity-50">
            @include('livewire.doctor.partials.morning')
        </div>

        <div class="card row d-flex flex-column align-items-start mb-3 shadow p-3">
            <h4 class="text-capitalize">{{ __('afternoon') }} <i class="ms-3 fa-solid fa-cloud-sun"
                    style="color: #376ac3;"></i></h4>
            <hr class="border border-dark border-2 opacity-50">
            @include('livewire.doctor.partials.afternoon')
        </div>


        <div class="card row d-flex flex-column align-items-start mb-3 shadow p-3">
            <h4 class="text-capitalize">{{ __('evening') }} <i class="ms-3 fa-solid fa-moon"
                    style="color: #476190;"></i></h4>
            <hr class="border border-dark border-2 opacity-50">
            @include('livewire.doctor.partials.evening')
        </div>



    </x-slot>

    <x-slot name="footer">
        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-outline-danger text-capitalize"
                    wire:click="$set('workdayEditModal', false)">{{ __('cancel') }}</button>
                <button class="btn btn-success text-capitalize" wire:click="update({{$day}})">{{ __('update') }}</button>
            </div>
        </div>
    </x-slot>
</x-dialog-modal>

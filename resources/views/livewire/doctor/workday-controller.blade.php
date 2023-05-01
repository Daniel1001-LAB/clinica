<div>
    <div class="row">

    </div>
    <div class="container-fluid p-3 ">
        <div class="row row-cols-1 row-cols-md-4">
            @foreach ($workdays as $workday)
                <div class="col mb-3">
                    <div class="card shadow-lg h-100">
                        <div class="card-header shadow  p-3 d-flex flex-column align-items-start" style="background-color: #E1EBEE">
                            <div class="d-flex justify-content-between w-100">
                                <h5 class="card-title text-capitalize text-bold">{{ DIA[$workday->day] }}</h5>
                                <div class="form-check position-relative">
                                    <input class="form-check-input" type="checkbox"
                                        @if ($workday->active) checked @endif>
                                    <label class="form-check-label text-capitalize">
                                        {{ __('active') }}
                                    </label>
                                </div>
                            </div>
                            <button class="btn btn-sm btn-outline-primary text-capitalize mt-2"
                                wire:click="edit({{ $workday->day }})">{{ __('edit') }}</button>
                        </div>


                        <div class="card-body">

                            <h5 class=" text-capitalize text-center">{{ __('morning') }}<i class="ms-3 fa-solid fa-sun"
                                    style="color: #eff250;"></i></h5>
                        </div>
                        <ul class="list-group list-group-flush">

                            <li class="list-group-item btn btn-sm btn-outline-dark d-inline-flex align-items-center">
                                <i class="fa-regular fa-clock me-3"></i>
                                <span class="text-truncate ">{{ $workday->HourMS }} - {{ $workday->HourME }}</span>
                            </li>

                            <li class="list-group-item btn btn-sm btn-outline-dark d-inline-flex align-items-center">
                                <i class="fa-regular fa-building me-3"></i>
                                <span class="text-truncate">{{ $workday->MO }}</span>
                            </li>

                            <li class="list-group-item btn btn-sm btn-outline-dark d-inline-flex align-items-center">
                                <i class="fa-solid fa-money-check-dollar me-3"></i>
                                <span class="text-truncate ">{{ price($workday->morning_price) }}</span>
                            </li>
                        </ul>
                        <ul class="list-group list-group-flush">
                            <h5 class="list-group-item text-capitalize text-center">{{ __('afternoon') }}<i
                                    class="ms-3 fa-solid fa-cloud-sun" style="color: #376ac3;"></i></h5>
                            <li class="list-group-item btn btn-sm btn-outline-dark d-inline-flex align-items-center">
                                <i class="fa-regular fa-clock me-3"></i>
                                <span class="text-truncate ">{{ $workday->HourAS }} - {{ $workday->HourAE }}</span>
                            </li>

                            <li class="list-group-item btn btn-sm btn-outline-dark d-inline-flex align-items-center">
                                <i class="fa-regular fa-building me-3"></i>
                                <span class="text-truncate "> {{ $workday->AO }} </span>
                            </li>

                            <li class="list-group-item btn btn-sm btn-outline-dark d-inline-flex align-items-center">
                                <i class="fa-solid fa-money-check-dollar me-3"></i>
                                <span class="text-truncate "><span class="text-truncate ">{{ price($workday->afternoon_price) }}</span></span>
                            </li>
                        </ul>
                        <ul class="list-group list-group-flush">
                            <h5 class="list-group-item text-capitalize text-center">{{ __('evening') }}<i
                                    class="ms-3 fa-solid fa-moon" style="color: #476190;"></i></h5>
                            <li class="list-group-item btn btn-sm btn-outline-dark d-inline-flex align-items-center">
                                <i class="fa-regular fa-clock me-3"></i>
                                <span class="text-truncate ">{{ $workday->HourES }} -
                                    {{ $workday->HourEE }}</span>
                            </li>

                            <li class="list-group-item btn btn-sm btn-outline-dark d-inline-flex align-items-center">
                                <i class="fa-regular fa-building me-3"></i>
                                <span class="text-truncate ">{{ $workday->EO }}</span>
                            </li>

                            <li class="list-group-item btn btn-sm btn-outline-dark d-inline-flex align-items-center">
                                <i class="fa-solid fa-money-check-dollar me-3"></i>
                                <span class="text-truncate "><span class="text-truncate ">{{ price($workday->evening_price) }}</span></span>
                            </li>
                        </ul>

                    </div>
                </div>
            @endforeach
        </div>
    </div>




    <x-dialog-modal wire:model="officesEmpty">
        <x-slot name="title">
            <h1 class="text-capitalize">{{ __('warning') }}</h1>
        </x-slot>
        <x-slot name="content">
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <i class="fa-solid fa-triangle-exclamation fa-2xl fa-beat me-3"></i>
                <div>
                    {{ __('No tiene oficinas de trabajo registradas, por favor cree una oficina antes de crear y editar días de trabajo.') }}
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <button class="btn btn-outline-warning text-capitalize"
                wire:click="officesEmptyClose">{{ __('continue') }}</button>
        </x-slot>
    </x-dialog-modal>

    @include('livewire.doctor.partials.workdayEditModal')
</div>

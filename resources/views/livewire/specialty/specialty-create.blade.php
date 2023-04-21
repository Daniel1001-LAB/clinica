<div class="section">
    <div>
        <button wire:click="$set('openModal', true)" type="button"
            class="w-full btn btn-success d-inline-flex align-items-center text-capitalize"
            title="{{ __('add specialty') }}">
            {{ __('add specialty') }}
            <i class="ms-1 fa-solid fa-plus"></i>
        </button>
    </div>

    <x-dialog-modal wire:model="openModal">
        <x-slot name="title">
            <div class="row">
                <h2 class="text-center">{{ __('Add specialties') }}</h2>
            </div>
            {{-- <img class="object-fit-fill border rounded shadow" src="{{ asset('assets/MedicalBanner.png') }}"
                alt="{{ auth()->user()->name }}" style="height: 300px; width: 1500px; object-fit: cover;"> --}}
        </x-slot>
        <x-slot name="content">
            <div class="row">
                <div class="col-md-12">

                          <h5 class="text-dark fw-bold">{{__(auth()->user()->name)}}</h5>

                    <input wire:model="search" class="mb-3 form-control d-inline-flex align-items-center"
                        placeholder="{{ __('search speciality') }}" type="search">

                </div>

                <div class="col-md-6">
                    <div class="aseleccionar">

                        <h6 class=" fw-bold text-capitalize">{{__('specialties')}}</h6>
                        <hr>
                        @foreach ($specialties as $s)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{$s->id}}" wire:change="modify({{$s->id}})">
                                <label class="form-check-label text-capitalize" for="specialty">
                                    {{__($s->name)}}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="seleccionadas">
                        <h6 class=" fw-bold text-capitalize">{{__('selected')}}</h6>
                        <hr>
                        @foreach ($user_specialties as $s)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{$s->id}}" wire:change="del({{$s->id}})">
                                <label class="form-check-label text-capitalize">
                                    {{__($s->name)}}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <button wire:click="$set('openModal', false)" type="button"
                class=" btn btn-outline-success me-3 d-inline-flex align-items-center text-capitalize"
                title="{{ __('Okay') }}">
                {{ __('Okay') }}
                <i class="fa-solid fa-check"></i>
            </button>

        </x-slot>

    </x-dialog-modal>
</div>

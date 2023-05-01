<div class="section">
    <div>
        <button wire:click="$set('openModal', true)" type="button"
            class="w-full btn btn-outline-success d-inline-flex align-items-center text-capitalize" title="{{ __('add skill') }}">
            {{ __('add skill') }}
            <i class="ms-1 fa-solid fa-plus"></i>
        </button>
    </div>

    <x-dialog-modal wire:model="openModal">
        <x-slot name="title">
            <div class="row">
                <h2 class="text-center">{{ __('Add skill') }}</h2>
            </div>
            {{-- <img class="object-fit-fill" src="{{ asset('assets/banner1.png') }}"
                alt="{{ auth()->user()->name }}" style="height: 300px; width: 1500px; object-fit: cover;"> --}}
        </x-slot>
        <x-slot name="content">
            <div class="row">
                <div class="col-md-12 p-2 mb-3 shadow rounded" style="background-color: #E1EBEE">
                    <h6 class=" fw-bold text-capitalize">{{ __('name of doctor/ user:') }}<mark
                            class="ms-3 badge bg-primary text-wrap"> {{ auth()->user()->name }}</mark></h6>
                </div>
                <div class="col-md-6">
                    <div class="aseleccionar">

                        <h6 class=" fw-bold text-capitalize">{{ __('select specialty') }}</h6>
                        <hr>
                        <select class="form-select text-capitalize" aria-label="select specialty" wire:model="specialty">
                            <option class="text-capitalize" value=""> {{ __('select specialty') }}</option>
                            @foreach ($specialties as $s)
                                <option class="text-capitalize" value="{{ __($s->id) }}">{{ __($s->name) }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="specialty"></x-input-error>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="seleccionadas">
                        <h6 class=" fw-bold text-capitalize">{{ __('title') }}</h6>
                        <hr>
                        <input wire:model="title" class="form-control" type="text" placeholder="title">
                        <x-input-error for="title"></x-input-error>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="seleccionadas">
                        <h6 class=" fw-bold text-capitalize">{{ __('description') }}</h6>
                        <hr>
                        <div class="form-floating">
                            <textarea wire:model="description" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                            <label for="floatingTextarea2">{{ __('description of your skills...') }}</label>
                        </div>
                        <x-input-error for="description"></x-input-error>
                    </div>
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <button wire:click="$set('openModal', false)" type="button"
                class=" btn btn-outline-danger me-3 d-inline-flex align-items-center text-capitalize"
                title="{{ __('cancel') }}">
                {{ __('cancel') }}
                <i class="fa-solid fa-x ms-2"></i>
            </button>

            <button type="submit" wire:click="addSkill"
                class=" btn btn-outline-success me-3 d-inline-flex align-items-center text-capitalize">
                {{ __('create') }}
                <i class="fa-solid fa-check ms-2"></i>
            </button>

        </x-slot>

    </x-dialog-modal>
</div>

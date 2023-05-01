<div class="section">
    <div>
        <button wire:click="$set('openModal', true)" wire:submit="addSocial" type="button"
            class="w-full btn btn-outline-success d-inline-flex align-items-center text-capitalize"
            title="{{ __('add social') }}">
            {{ __('add social') }}
            <i class="ms-1 fa-solid fa-plus"></i>
        </button>
    </div>

    <x-dialog-modal wire:model="openModal">
        <x-slot name="title">
            <div class="row">
                <h2 class="text-center text-capitalize">{{ __('add socials media') }}</h2>
            </div>
            <button disabled class="btn btn-dark rounded-circle p-2 lh-1" type="button">
                <i class="fa-brands fa-facebook" ></i>
            </button>
            <button  disabled class="btn btn-dark rounded-circle p-2 lh-1" type="button">
                <i class="fa-brands fa-instagram"></i>
            </button>
            <button disabled class="btn btn-dark rounded-circle p-2 lh-1" type="button">
                <i class="fa-brands fa-twitter"></i>
            </button>
            <button disabled class="btn btn-dark rounded-circle p-2 lh-1" type="button">
                <i class="fa-brands fa-whatsapp"></i>
            </button>
            <button disabled class="btn btn-dark rounded-circle p-2 lh-1" type="button">
                <i class="fa-brands fa-linkedin"></i>
            </button>
        </x-slot>
        <x-slot name="content">
            <div class="row">
                <div class="col-md-6">
                    <div class="aseleccionar">

                        <h6 class=" fw-bold text-capitalize">{{ __('socials media') }}</h6>
                        <hr>
                        <select wire:model="social_id" class="form-select text-capitalize" aria-label="Default select example">
                            <option class="text-capitalize" value=""> {{ __('select social media')}}</option>
                            @foreach ($socials as $s)
                                <option class="text-capitalize" value="{{ __($s->id) }}">{{ __($s->name) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="seleccionadas">
                        <h6 class=" fw-bold text-capitalize">{{ __('socials urls for')}}<mark class=" ms-3 badge bg-primary text-wrap"> {{auth()->user()->name}}</mark></h6>
                        <hr>
                        <input wire:model="url" class="form-control" type="text" placeholder="URL">
                        <x-input-error for="url"></x-input-error>
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

            <button type="submit" wire:click="addSocial"
                class=" btn btn-outline-success me-3 d-inline-flex align-items-center text-capitalize">
                {{ __('save') }}
                <i class="fa-solid fa-check ms-2"></i>
            </button>

        </x-slot>

    </x-dialog-modal>
</div>

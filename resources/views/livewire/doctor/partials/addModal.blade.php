<x-dialog-modal wire:model="officeAddModal">
    <x-slot name="title">
        <h1 class="text-capitalize">{{ __('add new office') }}</h1>
    </x-slot>

    <x-slot name="content">
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="input-group flex-nowrap">
                    <span for="local" class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-street-view" style="color: #728fc5;"></i></span>
                    <input type="text" name="local" class="form-control" placeholder="{{__('local')}}" aria-label="{{__('local')}}"
                        aria-describedby="addon-wrapping" wire:model.defer="local">

                </div>
                <x-input-error for="local"/>
            </div>
            <div class="col-md-8 mb-3">
                <div class="input-group flex-nowrap">
                    <span for="address" class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-map-location-dot" style="color: #728fc5;"></i></span>
                    <input type="text" class="form-control" placeholder="{{__('address')}}" aria-label="{{__('address')}}"
                        aria-describedby="addon-wrapping" wire:model.defer="address">
                </div>
                <x-input-error for="address"/>
            </div>
            <div class="col-md-6 mb-3">
                <div class="input-group flex-nowrap">
                    <span for="phone" class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-phone" style="color: #728fc5;"></i></span>
                    <input type="phone" class="form-control" placeholder="{{__('phone')}}" aria-label="{{__('phone')}}"
                        aria-describedby="addon-wrapping" wire:model.defer="phone">
                </div>
                <x-input-error for="phone"/>
            </div>
            <div class="col-md-6 mb-3">
                <div class="input-group flex-nowrap">
                    <span for="mobil" class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-mobile" style="color: #728fc5;"></i></span>
                    <input type="phone" class="form-control" placeholder="{{__('mobil')}}" aria-label="{{__('mobil')}}"
                        aria-describedby="addon-wrapping" wire:model.defer="mobil">
                </div>
                <x-input-error for="mobil"/>
            </div>
            <div class="col-md-12 mb-3">
                <div class="input-group flex-nowrap">
                    <span for="email" class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-envelope" style="color: #728fc5;"></i></span>
                    <input type="email" class="form-control" placeholder="{{__('email')}}" aria-label="{{__('email')}}"
                        aria-describedby="addon-wrapping" wire:model.defer="email">
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="input-group flex-nowrap">
                    <span for="map" class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-map" style="color: #728fc5;"></i></span>
                    <input type="text" class="form-control" placeholder="{{__('map')}}" aria-label="{{__('map')}}"
                        aria-describedby="addon-wrapping" wire:model.defer="map">
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="input-group flex-nowrap">
                    <span for="lat" class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-location-crosshairs" style="color: #728fc5;"></i></span>
                    <input type="text" class="form-control" placeholder="{{__('lat')}}" aria-label="{{__('lat')}}"
                        aria-describedby="addon-wrapping" wire:model.defer="lat">
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="input-group flex-nowrap">
                    <span for="lgn" class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-location-crosshairs" style="color: #728fc5;"></i></span>
                    <input type="text" class="form-control" placeholder="{{__('lgn')}}" aria-label="{{__('lgn')}}"
                        aria-describedby="addon-wrapping" wire:model.defer="lgn">
                </div>
            </div>
            {{-- <div class="col-md-4 mb-3">
                <div class="input-group flex-nowrap">
                    <span for="doctor_id" class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-user-doctor" style="color: #728fc5;"></i></span>
                    <input type="text" class="form-control" placeholder="{{__('doctor_id')}}" aria-label="{{__('doctor_id')}}"
                        aria-describedby="addon-wrapping" wire:model.defer="doctor_id">
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="input-group flex-nowrap">
                    <span for="created_at" class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-calendar-plus" style="color: #728fc5;"></i></span>
                    <input type="text" class="form-control" placeholder="{{__('created_at')}}" aria-label="{{__('created_at')}}"
                        aria-describedby="addon-wrapping" wire:model.defer="created_at">
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="input-group flex-nowrap">
                    <span for="updated_at" class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-calendar-plus " style="color: #728fc5;"></i></span>
                    <input type="text" class="text-capitalize form-control" placeholder="{{__('updated_at')}}" aria-label="{{__('updated_at')}}"
                        aria-describedby="addon-wrapping" wire:model.defer="updated_at">
                </div>
            </div> --}}
        </div>

    </x-slot>

    <x-slot name="footer">
        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-outline-danger text-capitalize" wire:click="$set('officeAddModal', false)">{{__('cancel')}}</button>
                <button class="btn btn-success text-capitalize" wire:click="addOffice">{{__('create')}}</button>
            </div>
        </div>
    </x-slot>
</x-dialog-modal>

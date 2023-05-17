<section class="soft-scrollbar">
    <x-modal.card  sm  title="{{ __('add new office') }}" blur wire:model.defer="officeAddModal">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <x-input icon="home" wire:model.defer="local"  label="{{__('Local')}}" placeholder="{{__('full name of the local')}}" />
            <x-input icon="location-marker" wire:model.defer="address"  label="{{__('Address')}}" placeholder="{{__('full name of the address')}}" />

            <div class="col-span-1 sm:col-span-2">
                <x-input icon="at-symbol" wire:model.defer="email"  label="{{__('Email')}}" placeholder="{{__('email')}}" />
            </div>
            <x-input icon="phone" wire:model.defer="phone"  label="{{__('Phone')}}" placeholder="{{__('your phone')}}" />
            <x-input icon="device-mobile" wire:model.defer="mobil"  label="{{__('Mobile Phone')}}" placeholder="{{__('your mobile phone number')}}" />

            <div class="col-span-1 sm:col-span-2">
                <x-input icon="map" wire:model.defer="map"  label="{{__('Map name')}}" placeholder="{{__('full map name')}}" />
            </div>
            <x-input icon="location-marker" wire:model.defer="lat"  label="{{__('Latitude')}}" placeholder="{{__('a latitude')}}" />
            <x-input icon="location-marker" wire:model.defer="lgn"  label="{{__('Longitude')}}" placeholder="{{__('a longitude')}}" />
            <div class="w-full flex justify-center">
                <x-errors />
            </div>
        </div>

        <x-slot name="footer">
            <div class="flex justify-between gap-x-4">
                <div class="flex">
                    <x-button icon="trash" class="me-3" negative flat label="{{__('cancel')}}" x-on:click="close" />
                    <x-button icon="save" onclick="notificationSaved()" wire:click="addOffice" class="capitalize" primary label="{{__('save')}}" />
                </div>
            </div>
        </x-slot>
    </x-modal.card>
</section>

@push('script')
    <script>
        function notificationSaved(){
            window.$wireui.notify({
            title: 'Office saved!',
            description: 'Your office was successfully saved',
            icon: 'success'
        });
        }

    </script>
@endpush

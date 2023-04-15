<x-dialog-modal wire:model="officeDeleteModal">
    <x-slot name="title">
        <h1 class="text-capitalize">{{ __('delete office') }}</h1>
    </x-slot>

    <x-slot name="content">
        <div class="alert alert-danger alert-dismissible fade show " role="alert">
            <strong class="text-capitalize">{{__('warning')}}</strong> {{__('you want to delete this office: ' ) . $local.' with address: '.$address .'?'}}

        </div>

    </x-slot>

    <x-slot name="footer">
        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-outline-danger text-capitalize"
                    wire:click="$set('officeDeleteModal', false)">{{ __('cancel') }}</button>
                <button class="btn btn-success text-capitalize"
                    wire:click="deleteOffice({{ $office_id }})">{{ __('delete') }}</button>
            </div>
        </div>
    </x-slot>
</x-dialog-modal>

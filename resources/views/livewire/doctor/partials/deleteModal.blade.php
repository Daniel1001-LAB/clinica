<x-modal.card title="{{ __('delete office') }}" blur wire:model="officeDeleteModal">
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">


        <div class="col-span-1 sm:col-span-2">
            <div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                role="alert">
                <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <strong class="capitalize">{{ __('warning') }}</strong>
                    {{ __('you want to delete this office: ') . $local . ' with address: ' . $address . '?' }}
                </div>
            </div>

        </div>


    </div>

    <x-slot name="footer">
        <div class="flex justify-between gap-x-4">
            <div class="flex">
                <x-button class="me-4" icon="x" flat red label="Cancel" x-on:click="close" />
                <x-button icon="trash" red label="{{ 'delete' }}" wire:click="deleteOffice({{ $office_id }})" />
            </div>
        </div>
    </x-slot>
</x-modal.card>

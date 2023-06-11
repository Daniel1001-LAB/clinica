<div class="p-2">
    <div class="flex items-center">
        <label for="simple-search" class="sr-only">Search</label>
        <div class="relative w-full">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                        clip-rule="evenodd"></path>
                </svg>
            </div>
            <input type="text" id="simple-search " wire:model="search"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="{{__('Search diseases')}}" required>
        </div>
    </div>

    <div class="pt-2">
        <h2 class="mb-2 text-sm capitalize font-semibold text-gray-900 dark:text-white">{{ __('registered diseases') }}</h2>
        <ul class="w-full text-center space-y-1 text-gray-500 list-inside dark:text-gray-400">
            @forelse ($patient_disases as $patient_disase)
            <li class="grid grid-cols-1 w-full items-center shadow-sm font-semibold ">

                <div class="flex justify-between items-center">
                    <svg class="w-4 h-4  text-blue-500 dark:text-blue-400 " fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <a class="cursor-pointer"> {{ $patient_disase->name }}</a>
                    <x-button.circle 2xs negative icon="x"
                        wire:click="removeDisase({{ $patient_disase->id }})" />
                </div>
            </li>
            @empty
            <div class="justify-start">
                <x-badge icon="clipboard-list" md flat primary label="{{ 'no registered diseases' }}" />

            </div>
            @endforelse

        </ul>
    </div>

    <x-dialog />

    <div class="items-center">
        <ul class="mb-8 mt-3  space-y-4 text-center text-gray-500 dark:text-gray-400">
            @forelse ($disases as  $disase)
                <li class="flex items-center space-x-3">
                    <!-- Icon -->
                    <svg class="flex-shrink-0 w-5 h-5 text-blue-500 dark:text-blue-400" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <a wire:click="addModalDisase({{ $disase->id }})" class="cursor-pointer">{{ $disase->name }}</a>
                </li>

            @empty

                @if (strlen(trim($this->search)) > 8)
                    <div class="justify-center">
                        <x-badge icon="clipboard-list" sm flat primary label="{{ 'no search result' }}" />

                    </div>
                    <x-button wire:click="addNew" icon="save" primary
                        label="{{ __('¿do you want to add this') }} {{ $this->search }} {{ __('to list?') }}" />
                @endif
            @endforelse
        </ul>
    </div>


    <x-modal.card title="{{ __('add disase to patient history') }}" blur wire:model="modal">
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div class="col-span-2 sm:col-span-2">
                <x-input wire:model="name" label="{{ 'Name' }}" placeholder="{{ 'name of the disase' }}" />
            </div>
            <x-inputs.number wire:model="year" label="{{ 'Year' }}" placeholder="{{ 'year of the disase' }}" />
            <input type="hidden" wire:model="patient_id">
            {{-- <div class="col-span-1 sm:col-span-2">
                <x-input label="Email" placeholder="example@mail.com" />
            </div> --}}


        </div>

        <x-slot name="footer">
            <div class="flex justify-between items-end gap-x-4">
                <x-button icon="x" flat negative label="Cancel" x-on:click="close" />
                <x-button icon="check" primary label="{{ __('add disase') }}" wire:click="addDisase" />
            </div>
        </x-slot>
    </x-modal.card>

</div>

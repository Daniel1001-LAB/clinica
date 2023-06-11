<div class="">
    <x-card  title="{{ __('Prescribe Medicine to Patient') }}">
        <div class="container mx-auto p-2 my-4">
            <x-button wire:click="$set('openModal', true)" class="mb-3 w-full" md icon="pencil" primary
                label="{{ __('Prescribe Medicine') }}" />
            <ul
                class="w-full text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                @forelse ($patient_medicines as $m)
                    <div id="task"
                        class="flex justify-between items-center border-b border-blue-200 p-1 border-l-4  border-l-sky bg-gradient-to-r from-transparent to-transparent hover:from-blue-100 transition ease-linear duration-150">
                        <div class="flex items-center space-x-2">
                            <div>

                            </div>
                            <div>
                                <a wire:click="edit({{ $m->id }})"
                                    class="capitalize cursor-pointer hover:underline hover:decoration-primary-500">{{ $m->name }}</a>
                                <div class="flex-col">
                                    <p class="text-gray-600 text-xs mb-1"><strong>{{ __('dosage') }}</strong>:
                                        {{ $m->pivot->dosage }}</p>
                                    <p class="text-gray-800 text-xs italic mb-2">
                                        <strong>{{ __('instruction') }}</strong>:
                                        {{ $m->pivot->instruction }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <x-button.circle wire:click="delete({{ $m->id }})" md red flat icon="trash" />
                    </div>

                @empty
                    <div id="task"
                        class="flex justify-between items-center border-b border-blue-200 p-1 border-l-4  border-l-sky bg-gradient-to-r from-transparent to-transparent hover:from-blue-100 transition ease-linear duration-150">
                        <div class="inline-flex items-center space-x-2">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-negative-500"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 1.944A11.954 11.954 0 012.166 5C2.056 5.649 2 6.319 2 7c0 5.225 3.34 9.67 8 11.317C14.66 16.67 18 12.225 18 7c0-.682-.057-1.35-.166-2.001A11.954 11.954 0 0110 1.944zM11 14a1 1 0 11-2 0 1 1 0 012 0zm0-7a1 1 0 10-2 0v3a1 1 0 102 0V7z"
                                        clip-rule="evenodd" />
                                </svg>

                            </div>
                            <span class="text-sm font-medium hidden md:block">{{ __('no medication') }}</span>
                        </div>

                    </div>
                @endforelse
            </ul>
        </div>
    </x-card>


    <x-modal.card title="{{ __('add medicine') }}" blur wire:model="openModal">
        <div class="flex items-center bg-gray-200 rounded-xl shadow-md p-4 mb-4">
            <div class="flex-shrink-0 h-16 w-16 rounded-full overflow-hidden">
                <img src="{{ asset('assets/medicines.jpg') }}" alt="Imagen de banner" class="object-cover h-full w-full">
            </div>
            <h2 class="ml-4 text-xl font-semibold">{{ __('add medicine to patient') }}</h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div class="col-span-1 sm:col-span-2">
                <x-select wire:model="medicine_id" label="Search a Medicine" placeholder="Select a medicine" :async-data="route('api.medicines.index')" option-label="name" option-value="id">
                    <x-slot name="afterOptions" class="p-2 flex justify-center" x-show="displayOptions.length === 0">
                        <x-button wire:click="createNewMedicine" primary flat>
                            <span x-html="`Create new medicine <b>${search}</b>`"></span>
                        </x-button>
                    </x-slot>
                </x-select>
                <x-input class="mb-3" wire:model="dosage" label="{{ __('dosage') }}"
                    placeholder="{{ __('input dosage') }}" />
                <x-textarea class="mb-3" wire:model="instruction" label="{{ __('instruction') }}"
                    placeholder="{{ __('input instructions') }}" />
            </div>
        </div>

        <x-slot name="footer">
            <div class="flex justify-between gap-x-4">
                <x-button flat negative label="Delete" wire:click="delete" />

                <div class="flex">
                    <x-button flat label="Cancel" x-on:click="close" />
                    <x-button primary label="{{ __('Add') }}" wire:click="add" />
                </div>
            </div>
        </x-slot>
    </x-modal.card>
</div>

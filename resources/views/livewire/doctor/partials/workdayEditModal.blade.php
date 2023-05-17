<div class="capitalize mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
    <x-modal.card title="{{ __('Horario del dia') }} {{ __($dia) }}" blur wire:model="workdayEditModal">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div class="flex items-center mb-4">
                <x-checkbox class="capitalize" id="right-label" md wire:model="active" />
                <label for="right-label"
                    class="capitalize ml-2 text-sm font-bold text-gray-900 dark:text-gray-300">{{ __('active') }}</label>
            </div>

        </div>

        <div class="mb-4">
            <div class="bg-gray-100 rounded-xl shadow-md w-full p-6 flex items-center ">
                <div class="flex justify-center mb-4 pe-3">
                    <x-badge warning lg flat label="{{ __('morning') }}" />
                    <x-badge.circle warning lg icon="sun" />
                </div>
                @include('livewire.doctor.partials.morning')
            </div>
        </div>

        <div class="mb-4">
            <div class="bg-gray-100 rounded-xl shadow-md w-full p-6 flex items-center ">
                <div class="flex justify-center mb-4 pe-3">
                    <x-badge sky lg flat label="{{ __('afternoon') }}" />
                    <x-badge.circle sky lg icon="cloud" />
                </div>
                @include('livewire.doctor.partials.afternoon')
            </div>
        </div>

        <div class="mb-4">
            <div class="bg-gray-100 rounded-xl shadow-md w-full p-6 flex items-center ">
                <div class="flex justify-center mb-4 pe-3">
                    <x-badge dark lg flat label="{{ __('evening') }}" />
                    <x-badge.circle dark lg icon="moon" />
                </div>
                @include('livewire.doctor.partials.evening')
            </div>
        </div>
        <x-slot name="footer">
            <div class="flex justify-end gap-x-4">
                {{-- <x-button flat negative label="Delete" wire:click="delete" /> --}}

                <div class="flex">
                    <x-button icon="arrow-left" flat label="Cancel" x-on:click="close" />
                    <x-button icon="check" class="capitalize" primary label="{{ __('update') }}"
                        wire:click="update({{ $day }})" />
                </div>
            </div>
        </x-slot>
    </x-modal.card>

</div>

<section>
    <div>
        <x-button icon="plus" primary wire:click="$set('openModal', true)" type="button" class="w-full capitalize"
            label="{{ __('add specialty') }}">
        </x-button>
    </div>

    <x-modal.card title="{{ __('Add specialties') }}" blur wire:model="openModal">
        <div class="grid grid-cols-1 sm:grid-cols-1 gap-4">
            <x-badge flat lg primary label="Doc: {{ auth()->user()->name }}" />
            <div class="col-span-1 sm:col-span-2">
                <label for="default-search"
                    class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input wire:model="search" type="text" id="search"
                        class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="{{ __('search speciality') }}" required>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="flex flex-col bg-gray-100 p-2 shadow-xl rounded-md mb-4 w-full h-full " style="max-height: 200px; overflow-y: scroll;"
                    >
                    <x-badge flat lg dark label="{{ __('specialties') }}" />
                    @foreach ($specialties as $s)
                        <div class="flex items-start mb-1 mt-2 ">
                            <input wire:change="modify({{ $s->id }})" id="specialties1" type="checkbox"
                                value="{{ $s->id }}"
                                class=" w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="specialties1"
                                class="capitalize ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __($s->name) }}</label>
                        </div>
                    @endforeach
                </div>

                <div class="flex flex-col bg-gray-100 p-2 shadow-xl rounded-md w-full h-full" style="max-height: 200px; overflow-y: scroll;"
                    >
                    <x-badge flat lg dark label="{{ __('selected') }}" />
                    @foreach ($user_specialties as $s)
                        <div class="flex items-start mb-1 mt-2 ">
                            <input wire:change="del({{ $s->id }})" id="specialties2" type="checkbox"
                                value="{{ $s->id }}"
                                class=" w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="specialties2"
                                class="capitalize ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __($s->name) }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <x-slot name="footer">
            <div class="flex justify-end gap-x-4">
                <div class="flex">
                    <x-button primary flat icon="check" label="Okay" x-on:click="close" />
                </div>
            </div>
        </x-slot>
    </x-modal.card>
</section>

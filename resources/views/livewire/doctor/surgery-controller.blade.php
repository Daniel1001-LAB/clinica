<div class="antialiased bg-gray-200">
    <div class="container mx-auto px-4 sm:px-8">
        <div class="py-8">
            <div>
                <h2 class="text-2xl capitalize font-semibold leading-tight">{{ __('surgeries') }}</h2>
            </div>
            <div class="my-2 flex sm:flex-row flex-col">
                <div class="flex flex-row mb-1 sm:mb-0 justify-center">
                    <div class=" w-72 relative me-1 ">
                            <label for="simple-search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <input type="text" id="simple-search " wire:model="search"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Search" required>
                            </div>

                    </div>

                    <div class="flex justify-between items-center capitalize">

                        <div class=" me-2">
                            <x-select placeholder="5" wire:model.lazy="perPage">
                                <x-select.option label="5" value="5" />
                                <x-select.option label="10" value="10" />
                                <x-select.option label="15" value="15" />
                                <x-select.option label="25" value="25" />
                                <x-select.option label="50" value="50" />
                            </x-select>
                        </div>

                        <div class=" me-2">
                            <x-select placeholder="asc" wire:model.lazy="sortAsc">
                                <x-select.option label="asc" value="1" />
                                <x-select.option label="des" value="0" />
                            </x-select>
                        </div>

                        <x-button wire:click="$set('modal', 'true')" label="{{ __('add') }}" flat primary icon="plus"></x-button>
                    </div>

                </div>

            </div>
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                    <table class="min-w-full table-auto leading-normal">
                        <thead>
                            <tr>
                                <th
                                    class="font-bold px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs text-gray-600 uppercase tracking-wider">
                                    {{ __('name') }}
                                </th>
                                <th
                                    class="font-bold px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs text-gray-600 uppercase tracking-wider">
                                    {{ __('description') }}
                                </th>
                                <th
                                    class="font-bold px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs text-gray-600 uppercase tracking-wider">
                                    {{ __('actions') }}
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($surgeries as $surgery)
                                <tr>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 w-10 h-10">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                   class="text-blue-400">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M3.75 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 013.75 9.375v-4.5zM3.75 14.625c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5a1.125 1.125 0 01-1.125-1.125v-4.5zM13.5 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 0113.5 9.375v-4.5z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M6.75 6.75h.75v.75h-.75v-.75zM6.75 16.5h.75v.75h-.75v-.75zM16.5 6.75h.75v.75h-.75v-.75zM13.5 13.5h.75v.75h-.75v-.75zM13.5 19.5h.75v.75h-.75v-.75zM19.5 13.5h.75v.75h-.75v-.75zM19.5 19.5h.75v.75h-.75v-.75zM16.5 16.5h.75v.75h-.75v-.75z" />
                                                </svg>
                                            </div>
                                            <div class="ml-3">
                                                <p class="capitalize font-bold text-gray-900 whitespace-no-wrap">
                                                    {{ $surgery->name }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="60%" class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        {{ $surgery->description }}
                                    </td>
                                    <td width="10%" class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex sm:flex-wrap justify-end items-center gap-1">
                                            <x-button.circle spinner="edit" loading-delay="short" wire:click="edit({{$surgery->id}})" primary icon="pencil" />
                                            <x-button.circle spinner="delete" loading-delay="short" wire:click="delete({{$surgery->id}})" negative icon="trash" />
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div
                        class="px-5 py-5 bg-white border-t items-center ">
                        {{ $surgeries->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-dialog />

    {{-- Modal Crear --}}
    <x-modal.card title="{{ __('add surgery') }}" blur wire:model="modal">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div class="col-span-1 sm:col-span-2">
                <x-badge flat lg primary label="Doc: {{ auth()->user()->name }}" />
            </div>


            <x-input wire:model="name" label="{{ __('Name') }}"
                placeholder="{{ __('name of the surgery..') }}" />

            <div class="col-span-1 sm:col-span-2">
                <x-textarea id="new" wire:model="description" label="{{ __('description') }}"
                    placeholder="{{ __('Describe the surgery...') }}" />

            </div>
        </div>

        <x-slot name="footer">
            <div class="flex justify-end gap-x-4">
                <div class="flex">
                    <x-button flat label="Cancel" x-on:click="close" />
                    <x-button primary label="{{ __('create') }}" wire:click="addSurgery" />
                </div>
            </div>
        </x-slot>
    </x-modal.card>


    {{-- Modal Editar --}}
    <x-modal.card title="{{ __('edit surgery') }}" blur wire:model="modalEdit">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div class="col-span-1 sm:col-span-2">
                <x-badge flat lg primary label="Doc: {{ auth()->user()->name }}" />
            </div>


            <x-input wire:model="name" label="{{ __('Name') }}"
                placeholder="{{ __('name of the surgery..') }}" />

            <div class="col-span-1 sm:col-span-2">
                <x-textarea id="edit2" wire:model="description" label="{{ __('description') }}"
                    placeholder="{{ __('Describe the surgery...') }}" />

            </div>
        </div>

        <x-slot name="footer">
            <div class="flex justify-end gap-x-4">
                <div class="flex">
                    <x-button flat icon="x" label="Cancel" x-on:click="close" />
                    <x-button spinner="update" loading-delay="short"  primary icon="check" label="{{ __('update') }}" wire:click="update({{$surgeryId}})" />
                </div>
            </div>
        </x-slot>
    </x-modal.card>

</div>

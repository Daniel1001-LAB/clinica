<div class="container">
    <div class="w-full">
        <!-- Profile Card -->
        <div class="bg-white rounded-2xl ">
            <!-- Profile Card -->
            <section class="antialiased bg-gray-100 text-gray-600 ">
                <div class="flex flex-col justify-center h-full">
                    <!-- Table -->
                    <div class="w-full mx-auto bg-white  rounded-sm ">
                        <header class="px-5 py-4 border-b border-gray-100 flex justify-between">
                            {{ __('allergy history') }}
                            <x-button xs wire:click="$set('modal', 'true')" icon="pencil" primary
                                label="agregar nueva alergia" />
                        </header>
                        <div class="p-3">
                            <div class="overflow-x-auto">
                                <table class="table-auto w-full">
                                    <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                                        <tr>
                                            <th class="p-2 whitespace-nowrap">
                                                <div class="font-semibold text-center">{{ __('allergy') }}</div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-sm divide-y divide-gray-100">
                                        @forelse($userAllergies as $item)
                                            <tr>
                                                <td class="p-2 whitespace-nowrap text-center">
                                                    <div class="flex items-center">
                                                        <div class="w-10 h-10 flex-shrink-0 mr-2 sm:mr-3"><img
                                                                class="rounded-full"
                                                                src="{{ $user->profile_photo_url }}" width="40"
                                                                height="40" alt="Alex Shatov">
                                                        </div>
                                                        <button wire:click="delete({{ $item->id }})"
                                                            class="cursor-pointer"
                                                            title="{{ 'eliminar ' . $item->name . ' a paciente' }}">
                                                            <i class="fa-solid fa-virus-slash text-red-500"></i>
                                                            <span class="font-medium text-gray-800">
                                                                {{ $item->name . '  ' }}</span>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <td class="p-2 whitespace-nowrap" colspan="2">
                                                <div class="text-left">no hay alergias
                                                    registrada</div>
                                            </td>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section>
                <x-modal.card title="{{ __('allergies') }}" wire:model="modal" wire:submit.self="save">
                    <div class="grid grid-cols-1 sm:grid-cols-1 gap-4">
                        <x-badge flat lg primary label="Doc: {{ auth()->user()->name }}" />
                        <div class="col-span-1 sm:col-span-2">
                            <label for="default-search"
                                class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </div>
                                <input wire:model="search" type="text" id="search"
                                    class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="{{ __('find check') }}" required>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="flex flex-col bg-gray-100 p-2 shadow-xl rounded-md mb-4 w-full h-full "
                                style="max-height: 200px; overflow-y: scroll;">
                                <x-badge flat lg dark label="{{ __('allergies list') }}" />
                                @forelse ($allergies as $s)
                                    <div class="w-full border mb-1 px-3">
                                        <button wire:click="modify({{ $s->id }})" class="cursor-pointer"
                                            title="{{ 'agregar ' . $s->name . ' a paciente' }}">

                                            <i class="fa-solid fa-tachograph-digital text-green-500"></i>
                                            <span class="text-gray-500">
                                                {{ $s->name . '  ' }}
                                            </span>
                                        </button>
                                    </div>
                                @empty
                                    @if (strlen(trim($this->search)) > 8)
                                        <h3 class="bg-red-500 text-white p-2 w-full mt-2 text-center font-bold">
                                            {{ __('no search result') }}</h3>
                                        <div class="bg-blue-500 text-white text-center p-2 my-2">
                                            <button wire:click="addNew">{{ __('¿ want add this') }}
                                                <br>
                                                <strong class="text-xl">{{ __($this->search) }}</strong>
                                                <br>
                                                <p>{{ __('to list ...?') }}</p>
                                                <p>{{ __('push OK') }}</p>
                                            </button>

                                        </div>
                                    @endif
                                @endforelse
                            </div>

                            <div class="flex flex-col bg-gray-100 p-2 shadow-xl rounded-md w-full h-full"
                                style="max-height: 200px; overflow-y: scroll;">
                                <x-badge flat lg dark label="{{ __('register allergies') }}" />
                                @forelse($userAllergies as $d)
                                    <div class="border mb-1 px-2">
                                        <button wire:click="delete({{ $d->id }})" class="cursor-pointer">
                                            <i class="fa-solid fa-trash-can text-red-600 mx-2"
                                                title="{{ 'eliminar ' . $d['name'] . ' a paciente' }}"></i>
                                        </button>
                                        <span class="ml-4 text-gray-500 italic">{{ $d['name'] }}</span>
                                    </div>

                                @empty
                                    <div class="border mb-1">
                                        <a class="cursor-pointer">
                                            <span class="ml-4 font-bold">No hay registro de alergias</span> </a>
                                    </div>
                                @endforelse
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
        </div>
    </div>
</div>

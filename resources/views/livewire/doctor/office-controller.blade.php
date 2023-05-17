<div class="container mx-auto p-12">
    <div class="w-full mb-10 ">
        <x-button wire:click="openAddModal" lg icon="pencil" class="capitalize" primary label="{{ __('add new office') }}"
            spinner />
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($offices as $item)
            <div
                class="h-100 w-full max-w-md mx-auto rounded-md overflow-hidden shadow-2xl hover:-translate-y-1 hover:shadow-2xl transition duration-500 ease-in-out">
                <img class="h-56 w-full object-contain shadow"
                    src="{{ asset('assets/undraw_in_the_office_re_jtgc.svg') }}" alt="Doctor's office">
                <div class="p-4 bg-white dark:bg-gray-700 ">
                    <h2 class="text-xl font-bold text-black dark:text-white">{{ $item->local }}</h2>
                    <p class="text-gray-600 dark:text-gray-400">{{ $item->address }}</p>
                    <p class="text-gray-400 text-sm dark:text-gray-400 capitalize ">{{ __('contact info') }}:</p>
                    <ul class="mt-4 h-full">

                        <div
                            class=" text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                            <p
                                class="truncate relative inline-flex items-center w-full px-4 py-2 text-sm font-medium border-b border-gray-200 rounded-t-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">
                                <i class="mr-2 fa-solid fa-phone fa-xs"></i>
                                {{ $item->phone }}
                            </p>
                            <p
                                class="truncate relative inline-flex items-center w-full px-4 py-2 text-sm font-medium border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">
                                <i class="mr-2 fa-solid fa-mobile fa-xs"></i>
                                {{ $item->mobil }}
                            </p>
                            <p
                                class="truncate h-full relative inline-flex items-center w-full px-4 py-2 text-sm font-medium border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white ">
                                <i class="mr-2 fa-solid fa-at fa-xs"></i>
                                {{ $item->email }}
                            </p>
                        </div>

                    </ul>

                </div>

                <div class="footer object-bottom w-full">
                    <div class="flex p-3">
                        <x-button spinner="save" icon="x" negative
                            class="capitalize me-2 hover:-translate-y-1 hover:shadow-2xl transition duration-200 ease-in-out"
                            wire:click="openDeleteModal({{ $item->id }})" label="{{ __('delete') }}" />
                        <x-button spinner="save" icon="pencil" primary
                            class="capitalize hover:-translate-y-1 hover:shadow-2xl transition duration-200 ease-in-out"
                            wire:click="openEditModal({{ $item->id }})" label="{{ __('edit') }}" />
                    </div>
                </div>
            </div>
        @endforeach
    </div>




    @include('livewire.doctor.partials.addModal')
    @include('livewire.doctor.partials.editModal')
    @include('livewire.doctor.partials.deleteModal')
</div>

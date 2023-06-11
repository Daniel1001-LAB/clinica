<div class="">
    <x-card title="{{ __('add files to patient') }}">
        <div class="container mx-auto">
            <x-button wire:click="$set('openModal', true)" class="mb-3 w-full" md icon="pencil" primary
                label="{{ __('Prescribe file') }}" />

            <ul class="w-full divide-y divide-gray-200 dark:divide-gray-700">
                @forelse ($patient_files as $file)
                    <li class="pb-3 sm:pb-4 py-3 sm:py-4">
                        <div class="flex justify-start items-center">
                            <div class="flex-shrink-0">
                                @if ($file->extension !== 'pdf')
                                    <img class="w-10 h-10 rounded-full" src="{{ asset($file->url) }}"
                                        alt="{{ $file->name }}">
                                @else
                                    <a href="{{ asset($file->url) }}">
                                        <img class="w-10 h-10 rounded-full" src="{{ asset('assets/pdf.png') }}"
                                            alt="{{ $file->name }}">
                                    </a>
                                @endif
                            </div>
                            <div class="ml-4">
                                <p class="text-lg font-medium text-gray-900 truncate dark:text-white">
                                    <a href="{{ asset($file->url) }}"
                                        class="font-bold hover:underline">{{ $file->name }}</a>
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    {{ $file->observation }}
                                </p>
                            </div>
                            <div class="flex items-center ml-auto space-x-2">
                                <x-button.circle wire:click="edit({{ $file->id }})" primary flat icon="pencil" />
                                <x-button.circle wire:click="delete({{ $file->id }})" red flat icon="trash" />
                            </div>
                        </div>
                    </li>


                @empty
                    <li class="pb-3 sm:pb-4 py-3 sm:py-4">
                        <div class="flex justify-center items-center space-x-4">
                            <div class="flex-shrink-0">

                            </div>
                            <div class="flex-1 min-w-0">
                                <x-badge outline secondary label="{{ __('no files') }}" />
                            </div>
                        </div>
                    </li>
                @endforelse
                @if ($patient_files->count() > 0)
                    <div class="flex justify-center pt-2 text-sm">
                        {{ $patient_files->links('vendor.livewire.simple-tailwind') }}
                    </div>
                @endif
            </ul>

        </div>
    </x-card>

    <x-modal.card title="{{ __('add file') }}" blur wire:model="openModal">
        <div class="flex items-center bg-gray-200 rounded-xl shadow-md p-4 mb-4">
            <div class="flex-shrink-0 h-16 w-16 rounded-full overflow-hidden">
                <img src="{{ asset('assets/files.jpg') }}" alt="Imagen de banner" class="object-cover h-full w-full">
            </div>
            <h2 class="ml-4 text-xl font-semibold">{{ __('add file to patient') }}</h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div class="col-span-1 sm:col-span-2">

                <x-input id="fil1" wire:model="file" type="file" icon="photo"
                    label="{{ 'file of the interview' }}" placeholder="your name"
                    corner-hint="Ejm: PDF, Radiografias, etc" />
                <x-input id="nam1" wire:model="name" label="Name" placeholder="your name" />
                <x-textarea id="1" class="mb-3" wire:model="observation" label="{{ __('observation') }}"
                    placeholder="{{ __('input observations') }}" />
            </div>
        </div>

        <x-slot name="footer">
            <div class="flex justify-between gap-x-4">
                <x-button flat negative label="Delete" wire:click="delete" />

                <div class="flex">
                    <x-button flat label="Cancel" x-on:click="close" />
                    <x-button spinner="add" loading-delay="short" primary label="{{ __('Add') }}"
                        wire:click="add" />
                </div>
            </div>
        </x-slot>
    </x-modal.card>

    <x-modal.card title="{{ __('Edit File') }}" blur wire:model="editModal">
        <div class="flex items-center bg-gray-200 rounded-xl shadow-md p-4 mb-4">
            <div class="flex-shrink-0 h-16 w-16 rounded-full overflow-hidden">
                <img src="{{ asset('assets/files.jpg') }}" alt="Imagen de banner" class="object-cover h-full w-full">
            </div>
            <h2 class="ml-4 text-xl font-semibold">{{ __('add file to patient') }}</h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div class="col-span-1 sm:col-span-2">

                <x-input id="fil2" wire:model="file" type="file" icon="photo"
                    label="{{ 'file of the interview' }}" placeholder="your name"
                    corner-hint="Ejm: PDF, Radiografias, etc" />
                <x-input id="nam2" wire:model="name" label="Name" placeholder="your name" />
                <x-textarea id="2" class="mb-3" wire:model="observation" label="{{ __('observation') }}"
                    placeholder="{{ __('input observations') }}" />
            </div>
        </div>

        <x-slot name="footer">
            <div class="flex justify-between gap-x-4">
                <x-button flat negative label="Delete" wire:click="delete" />

                <div class="flex">
                    <x-button flat label="Cancel" x-on:click="close" />
                    <x-button spinner="update" loading-delay="short" primary label="{{ __('Edit') }}"
                        wire:click="update" />
                </div>
            </div>
        </x-slot>
    </x-modal.card>

</div>

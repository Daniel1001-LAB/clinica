<section class="">
    <div class="p-2 mb-10 grid grid-cols-1 gap-10 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1">
        @foreach ($skills as $skill)
            <div class="border relative bg-white py-6 px-6 rounded-3xl w-full h-full my-4 shadow-xl">
                <div
                    class="flex capitalize shadow-xl items-center absolute rounded-full bg-pink-100 py-4 px-4 left-4 -top-6">
                    <x-badge lg flat pink label="{{ $skill->specialty }}" />
                </div>
                <div class="mt-8">
                    <div class="flex flex-wrap justify-between items-center">
                        <p class="capitalize text-xl font-semibold my-2">{{ $skill->title }}:</p>
                        <div>
                            <a wire:click="edit({{ $skill->id }})" class="me-2 cursor-pointer">
                                <x-badge.circle lg primary icon="pencil" />
                            </a>
                            <a wire:click="$emit('deleteSkill',{{ $skill->id }})" class="cursor-pointer">
                                <x-badge.circle lg warning icon="trash" />
                            </a>
                        </div>
                    </div>

                    <div class="flex space-x-2 text-gray-400 text-sm">
                        <!-- svg  -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" />
                        </svg>
                        <p>{{ Str::limit($skill->description, 50) }}</p>
                    </div>
                    <div class="flex space-x-2 text-gray-400 text-sm my-3">
                        <a href="" class="font-bold mr-8">
                            {{ __('read more...') }}
                        </a>
                    </div>
                    <div class="border-t-2"></div>
                </div>
            </div>
        @endforeach
    </div>

    <x-modal.card title="{{ __('add skill') }}" blur wire:model="openModal">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div class="col-span-1 sm:col-span-2">
                <x-badge flat lg primary label="Doc: {{ auth()->user()->name }}" />
            </div>
            <x-native-select label="{{ __('Select specialty') }}" wire:model="specialty">
                <option class="capitalize" value=""> {{ __('select specialty') }}</option>
                @foreach ($specialties as $s)
                    <option class="capitalize" value="{{ __($s->name) }}">{{ __($s->name) }}</option>
                @endforeach
            </x-native-select>

            <x-input wire:model="title" label="{{ __('Title') }}"
                placeholder="{{ __('title of your specialty..') }}" />

            <div class="col-span-1 sm:col-span-2">
                <x-textarea wire:model="description" label="{{ __('Description') }}"
                    placeholder="{{ __('Describe your skills of your specialties...') }}" />

            </div>
        </div>

        <x-slot name="footer">
            <div class="flex justify-end gap-x-4">
                <div class="flex">
                    <x-button icon="x" flat red label="Cancel" x-on:click="close" />
                    <x-button icon="check" primary label="{{ __('update') }}" wire:click="update" />
                </div>
            </div>
        </x-slot>
    </x-modal.card>
</section>

@push('script')
    <script>
        livewire.on('deleteSkill', skillId => {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    livewire.emitTo('skill.skill-list', 'delete', skillId)
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                }
            })
        })
    </script>
@endpush

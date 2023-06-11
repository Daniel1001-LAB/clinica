<div>
    <x-card  title="{{__('add new medicines')}}">
        <form>
            <x-input wire:model="name" class="mb-2" icon="" id="name" label="{{ __('Name') }}"
                placeholder="{{ __('input name') }}" />
            {{-- <x-input wire:model="slug" class="mb-2 " icon="shield-check" id="slug" label="{{ __('Slug') }}"
                placeholder="{{ __('slug') }}" readonly /> --}}

            <x-slot name="footer">
                <div class="flex justify-between items-center">
                    @if ($create)
                        <x-button spinner="add" loading-delay="short" wire:click="add" icon="plus"
                            label="{{ __('Create') }}" flat primary />
                    @else
                        <x-button spinner="update" loading-delay="short" wire:click="update" icon="refresh"
                            label="{{ __('Edit') }}" primary />
                    @endif
                </div>
            </x-slot>
        </form>

        <div class="container mx-auto p-2">
            <ul
                class="w-full text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                @forelse ($medicines as $m)
                    <div id="task"
                        class="flex justify-between items-center border-b border-slate-200 p-1 border-l-4  border-l-sky bg-gradient-to-r from-transparent to-transparent hover:from-slate-100 transition ease-linear duration-150">
                        <div class="inline-flex items-center space-x-2">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-primary-500 ">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>

                            </div>
                            <a wire:click="edit({{ $m->id }})"
                                class="cursor-pointer hover:underline hover:decoration-primary-500">{{ $m->name }}</a>
                        </div>
                        <x-button.circle wire:click="delete({{ $m->id }})" md red flat icon="trash" />
                    </div>
                @empty
                    <div id="task"
                        class="flex justify-between items-center border-b border-slate-200 p-1 border-l-4  border-l-sky bg-gradient-to-r from-transparent to-transparent hover:from-slate-100 transition ease-linear duration-150">
                        <div class="inline-flex items-center space-x-2">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-negative-500" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 1.944A11.954 11.954 0 012.166 5C2.056 5.649 2 6.319 2 7c0 5.225 3.34 9.67 8 11.317C14.66 16.67 18 12.225 18 7c0-.682-.057-1.35-.166-2.001A11.954 11.954 0 0110 1.944zM11 14a1 1 0 11-2 0 1 1 0 012 0zm0-7a1 1 0 10-2 0v3a1 1 0 102 0V7z"
                                        clip-rule="evenodd" />
                                </svg>

                            </div>
                            <span class="text-sm font-medium hidden md:block">{{__('no medication')}}</span>
                        </div>

                    </div>
                @endforelse
            </ul>
        </div>
        @if ($medicines->count() > 0)
            <div class="flex justify-center pt-2  text-sm">
                {{ $medicines->links('vendor.livewire.simple-tailwind') }}
            </div>
        @endif
    </x-card>
</div>

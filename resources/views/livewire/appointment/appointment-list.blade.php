<div class="h-full bg-white p-4 rounded-lg">
    <div class="flex justify-between items-center mb-4">
        <h1
            class="me-4 capitalize text-2xl font-extrabold leading-none tracking-tight text-gray-900 md:text-2xl lg:text-2xl dark:text-white">
            {{ __('list of appoinments') }}
        </h1>
        <x-badge primary label="{{ $appoinments->count() }}" />
        <x-button flat negative sm icon="trash" wire:click="resetFilters" class="ml-auto">
            {{ __('Reset Filters') }}
        </x-button>
    </div>

    <div class="mb-2 grid grid-cols-1 gap-6  items-center">
        <div class="flex gap-2">
            <x-button primary 2xs wire:click="showToday">Hoy</x-button>
            <x-button primary 2xs wire:click="showNext5Days">Próximos 5 días</x-button>
            <x-button primary 2xs wire:click="showNext15Days">Próximos 15 días</x-button>
        </div>
        <x-native-select label="{{ 'search by status' }}" lg wire:model="status">
            <option value="">{{ __('All') }}</option>
            <option value="CONFIRMED">{{ __('CONFIRMED') }}</option>
            <option value="PENDING">{{ __('PENDING') }}</option>
            <option value="CANCELED">{{ __('CANCELED') }}</option>
            <option value="ACCOMPLISHED">{{ __('ACCOMPLISHED') }}</option>
            <option value="UNREALIZED">{{ __('UNREALIZED') }}</option>
        </x-native-select>
    </div>

    <div class="overflow-y-auto h-96">
        <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 gap-4">
            @forelse ($appoinments as $appoinment)
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-md border border-spacing-1 rounded-xl">
                    <div>
                        <div class="flex items-center space-x-4 bg-slate-200 p-4">
                            <div class="flex-shrink-0">
                                <img class="w-10 h-10 rounded-full" src="{{ $appoinment->patient->profile_photo_url }}"
                                    alt="{{ $appoinment->patient->name }}">
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex justify-between items-center">
                                    <a href="#"
                                        class="text-lg font-bold text-gray-900 truncate dark:text-white hover:underline">{{ $appoinment->patient->name }}</a>
                                    @switch($appoinment->status)
                                        @case('CONFIRMED')
                                            @php
                                                $statusColor = 'positive';
                                                $statusIcon = 'check';
                                            @endphp
                                        @break

                                        @case('PENDING')
                                            @php
                                                $statusColor = 'warning';
                                                $statusIcon = 'clock';
                                            @endphp
                                        @break

                                        @case('ACCOMPLISHED')
                                            @php
                                                $statusColor = 'sky';
                                                $statusIcon = 'star';
                                            @endphp
                                        @break

                                        @case('UNREALIZED')
                                            @php
                                                $statusColor = 'secondary';
                                                $statusIcon = 'ban';
                                            @endphp
                                        @break

                                        @case('CANCELED')
                                            @php
                                                $statusColor = 'negative';
                                                $statusIcon = 'x';
                                            @endphp
                                        @break

                                        @default
                                            @php
                                                $statusColor = 'gray';
                                                $statusIcon = 'question-mark-circle';
                                            @endphp
                                    @endswitch

                                    <x-badge flat color="{{ $statusColor }}" icon="{{ $statusIcon }}"
                                        label="{{ __($appoinment->status) }}" />
                                    @if (!in_array($appoinment->status, ['CONFIRMED', 'PENDING', 'ACCOMPLISHED', 'UNREALIZED', 'CANCELED']))
                                        <span class="text-gray-500 text-xs font-light">Estado no definido</span>
                                    @endif
                                </div>
                                <div class="flex justify-start items-center p-2">
                                    <a href="#"
                                        class="justify-center w-full shadow-lg transform hover:-translate-y-1 hover:scale-110 transition duration-500 ease-in-out bg-blue-500 hover:bg-blue-700 text-white font-bold rounded inline-flex items-center capitalize p-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-white">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 9v3.75m0-10.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.75c0 5.592 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.57-.598-3.75h-.152c-3.196 0-6.1-1.249-8.25-3.286zm0 13.036h.008v.008H12v-.008z" />
                                        </svg>
                                        <p class="text-center text-sm text-white truncate dark:text-gray-400">
                                            {{ $appoinment->specialty->name }}
                                        </p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col bg-white rounded-lg p-4">
                            <div class="flex items-center justify-between mb-4">
                                <h2 class="text-lg font-bold text-gray-900 capitalize">{{ __('opening hours') }}</h2>
                                <div>
                                    <x-badge right-icon="information-circle" info
                                        label="{{ Carbon\Carbon::parse($appoinment->date)->format('d/m/Y') }}" />
                                        @csrf
                                    @if ($appoinment->status == 'CONFIRMED')
                                    <x-button wire:click="notifyAppoinment({{ $appoinment->id }})" warning icon="exclamation" xs>Notificar</x-button>
                                    @endif
                                </div>
                            </div>
                            <div class="flex flex-col gap-2">
                                <div class="flex items-center">
                                    <div class="w-1/2">
                                        <span class="text-sm text-gray-600 uppercase">{{ __('date') }}:</span>
                                        <span class="text-sm font-medium">
                                            <x-badge flat indigo
                                                label="{{ Carbon\Carbon::parse($appoinment->date)->format('d/m/Y') }}" />
                                        </span>
                                    </div>
                                    <div class="w-1/2">
                                        <span class="text-sm text-gray-600 uppercase">{{ __('hour') }}:</span>
                                        <span class="text-sm font-medium">
                                            <x-badge flat indigo
                                                label="{{ Carbon\Carbon::parse($appoinment->hour)->format('h:ia') }}" />
                                        </span>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <div class="w-1/2">
                                        <span class="text-sm text-gray-600 uppercase">{{ __('office') }}:</span>
                                        <span class="text-sm font-medium">
                                            <x-badge flat indigo label="{{ $appoinment->office->local }}" />
                                        </span>
                                    </div>
                                    <div class="w-1/2">
                                        <span class="text-sm text-gray-600 uppercase">{{ __('price') }}:</span>
                                        <span class="text-sm font-medium">
                                            <x-badge flat indigo label="{{ $appoinment->price }}" />
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 text-sm text-gray-700">
                                <span class="font-bold">{{ __('Description') }}:</span>
                                <span class="ml-2">{{ $appoinment->description }}</span>
                            </div>
                            <div class="flex flex-col mt-4 md:flex-row md:justify-between md:items-center md:gap-x-4">
                                <div class="flex justify-center md:justify-start mb-2 md:mb-0">
                                    <x-button spinner wire:click="canceled({{ $appoinment->id }})" xs icon="x"
                                        negative label="{{ __('cancel') }}" :disabled="$appoinment->status !== 'PENDING'" />
                                </div>
                                <div class="flex justify-center md:justify-end">
                                    <x-button spinner wire:click="confirmed({{ $appoinment->id }})" xs icon="check"
                                        positive label="{{ __('confirm') }}" :disabled="$appoinment->status !== 'PENDING'" />

                                    <x-button wire:click="accomplished({{ $appoinment->id }})" class="ms-4" spinner
                                        xs icon="chevron-up" primary label="{{ __('go to interview') }}"
                                        :disabled="$appoinment->status === 'CANCELED' ||
                                            $appoinment->status === 'UNREALIZED'"
                                        href="{{ route('interviews.index', $appoinment->patient_id) }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                    <h1
                        class="me-4 capitalize text-center text-2xl font-extrabold leading-none tracking-tight text-gray-900 md:text-2xl lg:text-2xl dark:text-white">
                        {{ __('no appoinments recorded') }}
                    </h1>
                @endforelse
            </div>

        </div>
        @if ($appoinments->count() > 0)
            <div class="flex justify-center pt-6 text-sm">
                {{ $appoinments->links('vendor.livewire.simple-tailwind') }}
            </div>
        @endif
    </div>

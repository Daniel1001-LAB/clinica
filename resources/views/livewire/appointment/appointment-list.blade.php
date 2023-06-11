<div class="bg-white shadow-lg p-6 rounded-lg">
    <div class="flex justify-between items-center mb-4">
        <h1
            class="me-4 capitalize text-2xl font-extrabold leading-none tracking-tight text-gray-900 md:text-2xl lg:text-2xl dark:text-white">
            {{ __('list of appoinments') }} </h1>
        <x-badge.circle lg positive label="{{ $appoinments->count() }}" />

    </div>

    <div class="mb-2">
        <x-native-select label="Appoinments" lg wire:model="days">
            <option value="0">{{ __('today') }}</option>
            <option value="5">{{ __('next 5 days') }}</option>
            <option value="15">{{ __('next 15 days') }}</option>
        </x-native-select>
    </div>
    <div>
        <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 gap-4">
            @forelse ($appoinments as $appoinment)
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-md rounded-xl">
                    <div class="p-4">
                        <div class="flex items-center space-x-4">
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
                        <div class="flex flex-col items-center justify-between text-xs font-light gap-2 mt-4">
                            <span
                                class="text-lg font-bold capitalize text-gray-900 dark:text-white">{{ __('opening hours') }}</span>
                            <span class="text-lg capitalize font-medium text-gray-900 dark:text-white">
                                {{__('date')}}:{{ Carbon\Carbon::parse($appoinment->date)->format('d/m/Y') }}
                            </span>
                            <span class="text-sm capitalize text-gray-700 dark:text-gray-400">
                                {{__('hour')}}:{{ Carbon\Carbon::parse($appoinment->hour)->format('h:ia') }}
                            </span>
                            <span class="text-sm capitalize text-gray-700 dark:text-gray-400">
                                {{__('local')}}: {{ $appoinment->office }}
                            </span>
                            <span class="text-sm text-gray-700 dark:text-gray-400">{{__('price')}}:{{ $appoinment->price }}</span>
                            <span class="mx-4 text-justify capitalize">{{__('desc')}}:{{ $appoinment->description }}</span>
                        </div>
                        <div class="flex flex-col mt-4 md:flex-row md:justify-between md:items-center md:gap-x-4">
                            <div class="flex justify-center md:justify-start mb-2 md:mb-0">
                                <x-button flat spinner wire:click="canceled({{ $appoinment->id }})" xs icon="x"
                                    negative label="{{ __('canceled') }}" :disabled="$appoinment->status !== 'PENDING'" />
                            </div>
                            <div class="flex justify-center md:justify-end">
                                <x-button flat spinner wire:click="confirmed({{ $appoinment->id }})" xs icon="check"
                                    positive label="{{ __('confirmed') }}" :disabled="$appoinment->status !== 'PENDING'" />

                                <x-button flat spinner xs icon="chevron-up" primary label="{{ __('go to interview') }}"
                                    :disabled="$appoinment->status === 'CANCELED'"
                                    href="{{ route('interviews.index', $appoinment->patient_id) }}" />
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
            @if ($appoinments->count() > 0)
                <div class="flex justify-center pt-6 text-sm">
                    {{ $appoinments->links('vendor.livewire.simple-tailwind') }}
                </div>
            @endif
            </ul>
        </div>

    </div>

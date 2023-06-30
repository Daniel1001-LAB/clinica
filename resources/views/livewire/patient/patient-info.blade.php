<div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
    <div class="max-w-xl mb-10 md:mx-auto sm:text-center lg:max-w-2xl md:mb-12">
        <div>
            <x-badge flat primary label="{{ __('UAPS - SAN LUIS PLANES - INFORMACION DEL PACIENTE') }}" />
        </div>
        <h2
            class="max-w-lg mb-6 font-sans text-3xl font-bold leading-none tracking-tight text-gray-900 sm:text-4xl md:mx-auto">
            <span class="relative inline-block">
                <svg viewBox="0 0 52 24" fill="currentColor"
                    class="absolute top-0 left-0 z-0 hidden w-32 -mt-8 -ml-20 text-blue-gray-100 lg:w-32 lg:-ml-28 lg:-mt-10 sm:block">
                    <defs>
                        <pattern id="18302e52-9e2a-4c8e-9550-0cbb21b38e55" x="0" y="0" width=".135"
                            height=".30">
                            <circle cx="1" cy="1" r=".7"></circle>
                        </pattern>
                    </defs>
                    <rect fill="url(#18302e52-9e2a-4c8e-9550-0cbb21b38e55)" width="52" height="24"></rect>
                </svg>
                <span class="relative">{{ auth()->user()->name }}</span>
            </span>

        </h2>
        <p class="text-base text-gray-700 md:text-lg">
            {{ __('In this section you will see your medical history and everything related to your appointments and doctors, you will be able to see your medical history and prescription drugs.') }}
        </p>
    </div>
    <div class="grid gap-4 row-gap-5 sm:grid-cols-2 lg:grid-cols-4">
        <div class="flex flex-col justify-between p-5 border rounded shadow-sm  h-96 overflow-y-auto">
            <div>
                <div class="flex items-center justify-center w-16 h-16 mb-4 rounded-full bg-indigo-50">
                    <i class="fa-regular fa-calendar-check fa-beat fa-2xl" style="color: #1b56bb;"></i>
                </div>
                <h6 class="mb-2 font-semibold leading-5 capitalize">{{ 'appointments' }}</h6>
                @forelse ($data['appointments'] as $a)
                    <div class="flex justify-between">
                        <p class="mb-3 text-sm text-gray-900">
                            <span class="icon"><i class="fa-solid fa-user-doctor"></i></span>
                            {{ $a->doctor->name }}
                        </p>
                        <p class="mb-3 text-2xs text-gray-900 bg-blue-200 p-1 rounded-xl">
                            <span class="icon"><i class="fas fa-certificate"></i></span>
                            {{ $a->specialty->name }}
                        </p>
                    </div>
                    <hr class="w-48 h-1 mx-auto my-2 bg-gray-300 border-0 rounded md:my-2 dark:bg-gray-700">
                    <div class="flex flex-wrap flex-shrink">
                        <div class="grid">
                            <p class="mb-3 text-sm text-gray-900">
                                <span class="icon"><i class="fas fa-building"></i></span>
                                {{ $a->oficina->local }}
                            </p>
                            <p class="mb-3 text-2xs text-gray-900">
                                <span class="icon"><i class="fas fa-map-marker"></i></span>
                                {{ $a->oficina->address }}
                            </p>
                            <p class="mb-3 text-2xs text-gray-900">
                                <span class="icon"><i class="fas fa-phone"></i></span>
                                {{ $a->oficina->phone }}
                            </p>
                            <p class="mb-3 text-2xs text-gray-900">
                                <span class="icon"><i class="fas fa-envelope"></i></span>
                                {{ $a->oficina->email }}
                            </p>
                            <div class="flex justify-between">
                                <p class="mb-3 text-2xs text-gray-900">
                                    <span class="icon"><i class="far fa-calendar-alt"></i></span>
                                    {{ Carbon\Carbon::parse($a->date)->format('d-m-Y') }}
                                </p>
                                <p class="mb-3 text-2xs text-gray-900 ml-2">
                                    <span class="icon"><i class="far fa-clock"></i></span>
                                    {{ Carbon\Carbon::parse($a->hour)->format('g:ia') }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <hr class="w-48 h-1 mx-auto my-2 bg-gray-300 border-0 rounded md:my-2 dark:bg-gray-700">
                @empty
                    <p class="mb-3 text-sm text-gray-900">{{ __('no appointments registered') }}</p>
                @endforelse
            </div>
            {{-- <a href="/" aria-label=""
                class="inline-flex items-center font-semibold transition-colors duration-200 text-deep-purple-accent-400 hover:text-deep-purple-800">Learn
                more</a> --}}
        </div>
        <div class="flex flex-col justify-between p-5 border h-96 rounded shadow-sm overflow-y-auto">
            <div>
                <div class="flex items-center justify-center w-16 h-16 mb-4 rounded-full bg-indigo-50">
                    <i class="fa-solid fa-clipboard-question fa-beat fa-2xl" style="color: #1b56bb;"></i>
                </div>
                <h6 class="mb-2 font-semibold leading-5 capitalize">{{ __('interviews') }}</h6>
                @forelse ($data['interviews'] as $i)
                    <div class="flex justify-between">
                        <p class="mb-3 text-sm text-gray-900">
                            <span class="icon"><i class="fa-solid fa-user-doctor"></i></span>
                            {{ $i->doctor }}
                        </p>
                    </div>
                    {{-- <hr class="w-48 h-1 mx-auto my-2 bg-gray-300 border-0 rounded md:my-2 dark:bg-gray-700"> --}}
                    <div class="flex flex-wrap flex-shrink">
                        <div class="grid">
                            <div x-data="{ open: false }">
                                {{-- <x-button class="mb-4 w-full" flat x-on:click="open=!open" icon="pencil" primary label="{{__('suspicion')}}" /> --}}
                                <p class="mb-3 text-sm text-gray-600">
                                    <span class="icon"><i class="fa-regular fa-chart-bar"></i></span>
                                    {{ $i->suspicion }}
                                </p>
                                <x-button class="mb-4 w-full" flat x-on:click="open=!open" icon="pencil" primary
                                    label="{{ __('diagnosis') }}" />
                                <p x-show="open" class="mb-3 text-sm text-gray-600">
                                    <span class="icon"><i class="fa-solid fa-stethoscope"></i></span>
                                    {{ $i->diagnosis }}
                                </p>
                            </div>
                            <div class="flex justify-start">
                                <p class="mb-3 text-2xs text-gray-600">
                                    <span class="icon"><i class="far fa-calendar-alt"></i></span>
                                    {{ Carbon\Carbon::parse($i->date)->format('d-m-Y') }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <hr class="w-48 h-1 mx-auto my-2 bg-gray-300 border-0 rounded md:my-2 dark:bg-gray-700">
                @empty
                    <p class="mb-3 text-sm text-gray-900">{{ __('no interviews registered') }}</p>
                @endforelse
                {{ $data['interviews']->links() }}

            </div>
        </div>
        <div class="flex flex-col justify-between p-5 border h-96 rounded shadow-sm overflow-y-auto">
            <div>
                <div class="flex items-center justify-center w-16 h-16 mb-4 rounded-full bg-indigo-50">
                    <i class="fa-solid fa-file-waveform fa-beat fa-2xl" style="color: #1b56bb;"></i>
                </div>
                <h6 class="mb-2 font-semibold leading-5 capitalize">{{ __('your files') }}</h6>
                <ul class="w-full divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse ($data['files'] as $file)
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

                            </div>
                        </li>


                    @empty
                        <p class="mb-3 text-sm text-gray-900">{{ __('no files registered') }}</p>
                    @endforelse

                    {{ $data['files']->links() }}

            </div>

        </div>
        <div class="flex flex-col justify-between p-5 border rounded shadow-sm overflow-y-auto h-96">
            <div>
                <div class="flex items-center justify-center w-16 h-16 mb-4 rounded-full bg-indigo-50">
                    <i class="fa-solid fa-prescription-bottle fa-beat fa-2xl" style="color: #1b56bb;"></i>
                </div>
                <h6 class="mb-2 font-semibold leading-5 capitalize">{{ __('medicines') }}</h6>
                @forelse ($data['medicines'] as $medicine)
                    <div class="flex justify-between">
                        <p class="mb-3 text-sm text-gray-900">
                            <span class="icon"><i class="fa-solid fa-user-doctor"></i></span>
                            {{ $medicine->name }}
                        </p>
                    </div>
                    {{-- <hr class="w-48 h-1 mx-auto my-2 bg-gray-300 border-0 rounded md:my-2 dark:bg-gray-700"> --}}
                    <div class="flex flex-wrap flex-shrink">
                        <div class="grid">
                            <div class="w-full" x-data="{ open: false }">
                                {{-- <x-button class="mb-4 w-full" flat x-on:click="open=!open" icon="pencil" primary label="{{__('suspicion')}}" /> --}}
                                <p class="mb-3 text-sm text-gray-600">
                                    <span class="icon"><i class="fa-regular fa-chart-bar"></i></span>
                                    {{ $medicine->pivot->dosage }}
                                </p>
                                <x-button class="mb-4 w-full" flat x-on:click="open=!open" icon="pencil" primary
                                    label="{{ __('instruction') }}" />
                                <p x-show="open" class="mb-3 text-sm text-gray-600">
                                    <span class="icon"><i class="fa-solid fa-stethoscope"></i></span>
                                    {{ $medicine->pivot->instruction }}
                                </p>
                            </div>
                            <div class="flex justify-start">
                                <p class="mb-3 text-2xs text-gray-600">
                                    <span class="icon"><i class="far fa-calendar-alt"></i></span>
                                    {{ Carbon\Carbon::parse($medicine->created_at)->format('d-m-Y') }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <hr class="w-48 h-1 mx-auto my-2 bg-gray-300 border-0 rounded md:my-2 dark:bg-gray-700">
                @empty
                    <p class="mb-3 text-sm text-gray-900">{{ __('no medicines registered') }}</p>
                @endforelse

                {{ $data['medicines']->links() }}

            </div>

        </div>
    </div>
</div>

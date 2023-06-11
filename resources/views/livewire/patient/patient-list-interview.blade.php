<div class="h-full bg-white shadow-lg p-3 border rounded-lg">
    <div class="flex flex-col sm:flex-row justify-between items-center mb-4">
        <h1 class="capitalize text-2xl font-extrabold leading-none tracking-tight text-gray-900 md:text-2xl lg:text-2xl dark:text-white">
            {{ __('list of') }} <mark class="px-2 text-white bg-blue-600 rounded dark:bg-blue-500">{{ __('interviews') }}</mark>
        </h1>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
        </svg>
    </div>

    <ul class="max-w-md divide-y divide-gray-200 dark:divide-gray-700">
        @forelse ($interviews as $interview)
            <li class="pb-3 sm:pb-4 py-3 sm:py-4">
                <li class="pb-3 sm:pb-4 py-3 sm:py-4">
                    <div class="flex justify-center items-center space-x-4">
                        {{-- <div class="flex-shrink-0">
                            @if ($interview->external_auth == 'google')
                                <img class="w-10 h-10 rounded-full" src="{{ $interview->avatar }}"
                                    alt="{{ $interview->name }}">
                                    @else
                                    <img class="w-10 h-10 rounded-full" src="{{ $interview->profile_photo_url }}"
                                    alt="{{ $interview->name }}">
                            @endif
                        </div> --}}
                        <div class="flex-1 min-w-0">
                            <p class="text-lg font-medium text-gray-900 truncate dark:text-white">
                                <a href="{{route('interviews.detail', $interview->id)}}" class="font-bold cursor-pointer hover:underline">{{ $interview->doctor }}</a>
                                <x-badge flat secondary label="{{ Carbon\Carbon::parse($interview->date)->format('d-m-Y') }}" />

                            </p>
                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                {{ $interview->phone }}
                            </p>
                        </div>
                    </div>
                </li>
            </li>
        @empty
            <li class="py-3 sm:py-4">
                <p class="text-gray-500 dark:text-gray-400 text-center">
                    {{ __('No interviews found.') }}
                </p>
            </li>
        @endforelse

        @if ($interviews->count() > 0)
            <div class="flex justify-center pt-2 text-sm">
                {{ $interviews->links('vendor.livewire.simple-tailwind') }}
            </div>
        @endif
    </ul>
</div>

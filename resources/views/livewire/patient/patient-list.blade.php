<div>
    <div class="h-full bg-white shadow-lg p-4 rounded-lg">
        <div class="flex flex-col sm:flex-row justify-between items-center mb-4">
            <h1
                class="capitalize text-2xl font-extrabold leading-none tracking-tight text-gray-900 md:text-2xl lg:text-2xl dark:text-white">
                {{ __('list of') }} <mark
                    class="px-2 text-white bg-blue-600 rounded dark:bg-blue-500">{{ __('patients') }}</mark></h1>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-10 h-10">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
            </svg>
        </div>

        <div class="mb-4">
            <label for="simple-search" class="sr-only">Search</label>
            <div class="relative w-full">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <input wire:model="search" type="text" id="simple-search"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="{{ __('find patient...') }}" required>
            </div>
        </div>

        <ul class=" divide-y divide-gray-200 dark:divide-gray-700">
            @foreach ($users as $user)
                <li class="pb-3 sm:pb-4 py-3 sm:py-4 ">
                    <div class="flex justify-center items-center space-x-4">
                        <div class="flex-shrink-0">
                            @if ($user->external_auth == 'google')
                                <img class="w-10 h-10 rounded-full" src="{{ $user->avatar }}" alt="{{ $user->name }}">
                            @else
                                <img class="w-10 h-10 rounded-full" src="{{ $user->profile_photo_url }}"
                                    alt="{{ $user->name }}">
                            @endif


                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-lg font-medium text-gray-900 truncate dark:text-white">
                                <a href="{{ route('interviews.index', $user->id) }}" class="font-bold hover:underline">
                                    {{ $user->name }}
                                    @if (\Carbon\Carbon::parse($user->birthdate)->diffInYears(\Carbon\Carbon::now()) <= 12)
                                        <i class="fa-solid fa-child-reaching"></i>
                                        @if ($user->gender == 'male')
                                            <i class="text-blue-500 fa-solid fa-mars"></i>
                                        @elseif ($user->gender == 'female')
                                            <i class="text-pink-500 fa-solid fa-venus"></i>
                                        @elseif ($user->gender == 'other')
                                            <i class="text-gray-500 fa-solid fa-venus-mars"></i>
                                        @endif
                                    @elseif ($user->gender == 'male')
                                        <i class="text-blue-500 fa-solid fa-mars"></i>
                                    @elseif ($user->gender == 'female')
                                        <i class="text-pink-500 fa-solid fa-venus"></i>
                                    @elseif ($user->gender == 'other')
                                        <i class="text-gray-500 fa-solid fa-venus-mars"></i>
                                    @endif
                                </a>
                            </p>
                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                {{ $user->phone }}
                            </p>
                        </div>

                        <div class="capitalize text-center">
                            <p class="text-sm text-gray-500 truncate dark:text-gray-400 ">
                                {{ __('born') }}:
                                {{ __(\Carbon\Carbon::parse($user->birthdate)->diffForHumans(['parts' => 2, 'join' => true])) }}
                            </p>

                            @if (\Carbon\Carbon::parse($user->birthdate)->diffInYears(\Carbon\Carbon::now()) <= 12)
                            <x-badge flat primary label="Es un niño">
                                <x-slot name="prepend" class="relative flex items-center w-2 h-2">
                                    <span class="absolute inline-flex w-full h-full rounded-full opacity-75 bg-cyan-500 animate-ping"></span>
                                    <span class="relative inline-flex w-2 h-2 rounded-full bg-cyan-500"></span>
                                </x-slot>
                            </x-badge>
                            @endif

                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
        @if ($users->count() > 0)
            <div class="flex justify-center pt-6 text-sm">
                {{ $users->links('vendor.livewire.simple-tailwind') }}
            </div>
        @endif
    </div>
</div>

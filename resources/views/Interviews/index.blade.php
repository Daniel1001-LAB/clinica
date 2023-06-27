<x-doctor-layout>
    <!-- component -->
    <style>
        :root {
            --main-color: #4a76a8;
        }

        .bg-main-color {
            background-color: var(--main-color);
        }

        .text-main-color {
            color: var(--main-color);
        }

        .border-main-color {
            border-color: var(--main-color);
        }
    </style>

    <div class="bg-gray-100 bg-contain pt-4">
        <div class="container mx-auto p-2">
            <div class="md:flex no-wrap md:-mx-2  ">
                <!-- Left Side -->
                <div class="w-full md:w-3/12 md:mx-2 ">
                    <!-- Profile Card -->
                    <div class="bg-white p-3 border-t-4 border-blue-400 rounded-lg shadow-sm">
                        <div class="image overflow-hidden">
                            <img class="h-auto w-full mx-auto rounded-lg shadow-lg" src="{{ $user->profile_photo_url }}"
                                alt="">
                        </div>
                        <h1 class="text-gray-900 font-bold text-xl leading-8 my-1">{{ $user->name }}</h1>

                        <ul
                            class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                            <li class="flex items-center py-3">
                                <span>Status</span>
                                <span class="ml-auto"><span
                                        class="bg-blue-500 py-1 px-2 rounded text-white text-sm">{{ $user->status }}</span></span>
                            </li>
                            <li class="flex items-center py-3">
                                <span>Member since</span>
                                <span class="ml-auto">{{ $user->created_at->format('d-m-Y') }}</span>
                            </li>
                            @if ($user->gender == 'female')
                                <li class="flex items-center py-3 ">
                                    <span class="text-black underline">{{('Status of woman')}}</span>
                                    @if ($user->pregnants()->where('active', 1)->count() == 0)
                                        <span
                                            class="ml-auto">
                                            @livewire('patient.patient-gesta', ['user' => $user->id])
                                        </span>
                                    @else
                                        <span
                                            class="ml-auto bg-pink-700 text-white px-2 py-1 text-sm  rounded">
                                            EN CONTROL
                                        </span>
                                    @endif
                                </li>
                            @endif


                        </ul>
                    </div>
                    <!-- End of profile card -->
                    <div class="my-4"></div>

                    <!-- Friends card -->
                    <div class="bg-white p-3 hover:shadow rounded-xl shadow-lg">
                        <div
                            class="flex items-center justify-center space-x-3 font-semibold text-gray-900 text-xl leading-8">
                            <span class="text-blue-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                                </svg>

                            </span>
                            <span class="capitalize">{{ __('Appoinments history') }}</span>
                        </div>
                        <div class="grid grid-cols-1">
                            @livewire('patient.patient-appoinment', ['user' => $user->id])
                        </div>
                    </div>
                    <!-- End of friends card -->
                    <div class="my-4"></div>
                    <!-- Friends card -->
                    <div class="bg-white p-3 hover:shadow rounded-xl shadow-lg">
                        <div
                            class="flex items-center justify-center space-x-3 font-semibold text-gray-900 text-xl leading-8">
                            <span class="text-blue-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                                </svg>

                            </span>
                            <span class="capitalize">{{ __('disease history') }}</span>
                        </div>
                        <div class="grid grid-cols-1">
                            @livewire('patient.patient-disase', ['user' => $user->id])
                        </div>
                    </div>
                    <!-- End of friends card -->
                    <div class="my-4"></div>
                    <!-- Friends card -->
                    <div class="bg-white p-3 hover:shadow rounded-xl shadow-lg">
                        <div
                            class="flex items-center justify-center space-x-3 font-semibold text-gray-900 text-xl leading-8">
                            <span class="text-blue-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                                </svg>

                            </span>
                            <span class="capitalize">{{ __('surgeries history') }}</span>
                        </div>
                        <div class="grid grid-cols-1">
                            @livewire('patient.patient-surgery', ['user' => $user->id])
                        </div>
                    </div>
                    <!-- End of friends card -->


                </div>
                <!-- Right Side -->
                <div class="w-full md:w-9/12 mx-2 md:h-full">
                    <!-- Profile tab -->
                    <!-- patient Section -->
                    <div class="relative bg-white py-6 px-6 rounded-3xl h-full w-full my-4 shadow-xl">
                        <div
                            class=" text-white flex items-center absolute rounded-full py-4 px-4 shadow-xl bg-blue-500 left-4 -top-6">
                            <!-- svg  -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                            </svg>
                            <span class="tracking-wide text-xl  capitalize">{{ __('patient information') }}</span>
                        </div>
                        <div class="mt-8">
                            <p class="text-xl font-semibold my-2">{{ $user->name }}</p>
                            <div class="flex space-x-2 text-gray-400 text-sm">
                                <div class="text-gray-700">
                                    <div class="grid md:grid-cols-2 text-sm">
                                        <div class="grid grid-cols-2">
                                            <div class="px-4 py-2 font-semibold capitalize">{{ __('name') }}</div>
                                            <div class="px-4 py-2">{{ $user->name }}</div>
                                        </div>
                                        <div class="grid grid-cols-2">
                                            <div class="px-4 py-2 font-semibold capitalize">{{ __('age') }}</div>
                                            @if ($user->birthdate)
                                                <div class="px-4 py-2 capitalize">{{ __('born') }}
                                                    {{ __(\Carbon\Carbon::parse($user->birthdate)->diffForHumans(['parts' => 2, 'join' => true])) }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="grid grid-cols-2">
                                            <div class="px-4 py-2 font-semibold capitalize">{{ __('gender') }}</div>
                                            <div class="px-4 py-2">{{ $user->gender }}</div>
                                        </div>
                                        <div class="grid grid-cols-2">
                                            <div class="px-4 py-2 font-semibold capitalize">{{ __('contact no') }}.
                                            </div>
                                            <div class="px-4 py-2">{{ $user->phone }}</div>
                                        </div>
                                        <div class="grid grid-cols-2">
                                            <div class="px-4 py-2 font-semibold capitalize">{{ __('address') }}</div>
                                            <div class="px-4 py-2">{{ $user->address }}</div>
                                        </div>

                                        @if ($user->birthdate)
                                            <div class="grid grid-cols-2">
                                                <div class="px-4 py-2 font-semibold capitalize">{{ 'birthdate' }}
                                                </div>
                                                <div class="px-4 py-2">{{ $user->birthdate }}</div>
                                            </div>
                                        @endif
                                        <div class="grid grid-cols-2">
                                            <div class="px-4 py-2 font-semibold capitalize">{{ __('email') }}.</div>
                                            <div class="px-4 py-2">
                                                <a class="text-blue-800"
                                                    href="mailto:({{ $user->email }})">{{ $user->email }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button
                            class="block w-full text-blue-800 text-sm font-semibold rounded-lg hover:bg-gray-100 focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4">Show
                            Full Information</button>
                        <div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-3 gap-2">
                            <div class="col-span-1 md:col-span-2 xl:col-span-2">
                                @livewire('patient.patient-interview', ['user' => $user->id])
                            </div>
                            <div class="col-span-1 md:col-span-1 xl:col-span-1">
                                @livewire('patient.patient-list-interview', ['user' => $user->id])
                            </div>

                        </div>
                    </div>
                    <!-- End of patient section -->
                    <div class="my-8"></div>

                    <div
                        class="relative bg-white py-6 px-6 rounded-3xl w-full h-full my-4 shadow-xl border-t-4 border-blue-400 ">
                        <div
                            class=" text-white flex items-center absolute rounded-full py-4 px-4 shadow-xl bg-blue-500 left-4 -top-6">
                            <!-- svg  -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" />
                            </svg>
                            <span class="tracking-wide text-2xl ms-3 capitalize">{{ __('about patient') }}</span>
                        </div>
                        <div class="mt-8">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 h-full">
                                <div class="h-full shadow-xl rounded-xl ">
                                    <div class="flex justify-start ">
                                        <!-- svg  -->
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9.75 3.104v5.714a2.25 2.25 0 01-.659 1.591L5 14.5M9.75 3.104c-.251.023-.501.05-.75.082m.75-.082a24.301 24.301 0 014.5 0m0 0v5.714c0 .597.237 1.17.659 1.591L19.8 15.3M14.25 3.104c.251.023.501.05.75.082M19.8 15.3l-1.57.393A9.065 9.065 0 0112 15a9.065 9.065 0 00-6.23-.693L5 14.5m14.8.8l1.402 1.402c1.232 1.232.65 3.318-1.067 3.611A48.309 48.309 0 0112 21c-2.773 0-5.491-.235-8.135-.687-1.718-.293-2.3-2.379-1.067-3.61L5 14.5" />
                                        </svg>
                                        <span
                                            class="text-xl capitalize font-semibold my-2">{{ __('vaccination history') }}</span>

                                    </div>
                                    @livewire('interview.interview-patient-vaccine', ['user' => $user->id])
                                </div>
                                <div class="h-full shadow-xl rounded-2xl">
                                    <div class=" flex justify-start ">
                                        <!-- svg  -->
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 01-.825-.242m9.345-8.334a2.126 2.126 0 00-.476-.095 48.64 48.64 0 00-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0011.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155" />
                                        </svg>

                                        <span
                                            class="text-xl capitalize font-semibold my-2">{{ __('history of allergies') }}</span>

                                    </div>
                                    @livewire('interview.interview-patient-allergy', ['user' => $user->id])
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>


</x-doctor-layout>

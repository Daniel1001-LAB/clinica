<div class="">
    <div class="relative overflow-hidden">
        <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-10">
            <div class="text-center">
                <h1 class="text-4xl sm:text-6xl capitalize font-bold text-gray-800 dark:text-gray-200">
                    {{ __('Our Specialties') }}
                </h1>

                <p class="mt-3 text-gray-600 dark:text-gray-400">
                    {{ __('search for the specialty you need ') }}
                </p>

                <div class="mt-7 sm:mt-12 mx-auto max-w-xl relative">
                    <!-- Form -->
                    <form>
                        <div
                            class="relative z-10 flex space-x-3 p-3 bg-white border rounded-lg shadow-lg shadow-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:shadow-gray-900/[.2]">
                            <div class="flex-[1_0_0%]">
                                <label for="hs-search-article-1"
                                    class="block text-sm text-gray-700 font-medium dark:text-white"><span
                                        class="sr-only">Search a Specialty:</span></label>
                                <input wire:model="search" placeholder="{{ 'search specialties' }}"
                                    name="hs-search-article-1" id="hs-search-article-1"
                                    class="p-3 block w-full border-transparent rounded-md focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:text-gray-400"
                                    placeholder="Search specialties">
                            </div>
                            <div class="flex-[0_0_auto]">
                                <a class="p-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800"
                                    href="#specialties">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" viewBox="0 0 16 16">
                                        <path
                                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </form>
                    <!-- End Form -->

                    <!-- SVG Element -->
                    <div class="hidden md:block absolute top-0 right-0 -translate-y-12 translate-x-20">
                        <svg class="w-16 h-auto text-orange-500" width="121" height="135" viewBox="0 0 121 135"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 16.4754C11.7688 27.4499 21.2452 57.3224 5 89.0164" stroke="currentColor"
                                stroke-width="10" stroke-linecap="round" />
                            <path d="M33.6761 112.104C44.6984 98.1239 74.2618 57.6776 83.4821 5" stroke="currentColor"
                                stroke-width="10" stroke-linecap="round" />
                            <path d="M50.5525 130C68.2064 127.495 110.731 117.541 116 78.0874" stroke="currentColor"
                                stroke-width="10" stroke-linecap="round" />
                        </svg>
                    </div>
                    <!-- End SVG Element -->

                    <!-- SVG Element -->
                    <div class="hidden md:block absolute bottom-0 left-0 translate-y-10 -translate-x-32">
                        <svg class="w-40 h-auto text-cyan-500" width="347" height="188" viewBox="0 0 347 188"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M4 82.4591C54.7956 92.8751 30.9771 162.782 68.2065 181.385C112.642 203.59 127.943 78.57 122.161 25.5053C120.504 2.2376 93.4028 -8.11128 89.7468 25.5053C85.8633 61.2125 130.186 199.678 180.982 146.248L214.898 107.02C224.322 95.4118 242.9 79.2851 258.6 107.02C274.299 134.754 299.315 125.589 309.861 117.539L343 93.4426"
                                stroke="currentColor" stroke-width="7" stroke-linecap="round" />
                        </svg>
                    </div>
                    <!-- End SVG Element -->
                </div>
            </div>
        </div>
    </div>

    <div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20  ">
        <div class="grid gap-10  grid-cols-1 mx-auto md:grid-cols-2 lg:grid-cols-2 lg:max-w-screen-lg ">
            @foreach ($specialties as $specialty)
                <div
                    class="grid sm:grid-cols-3 shadow-lg h-full hover:-translate-y-5 hover:shadow-2xl transition duration-500 ease-in-out">
                    <div class="relative w-full h-48 max-h-full rounded shadow sm:h-auto">
                        <img class="absolute object-cover w-full h-full rounded"
                            src="{{ asset('assets/virus/v' . random_int(0, 10) . '.jpg') }}" alt="Person" />
                    </div>
                    <div class="flex flex-col p-4 justify-center mt-5 sm:mt-0 sm:p-6 sm:col-span-2 ">
                        <p class="text-lg font-bold capitalize">{{ $specialty->name }}</p>
                        <p class="mb-2 text-xs capitalize text-gray-800">Descripcion:{{ $specialty->description }}</p>
                        <p class="mb-4 text-xs capitalize text-gray-800">{{ __('doctors') }}:</p>
                        <div class="max-h-32 overflow-y-auto ">
                            @if (count($specialty->doctors) > 0)
                                @foreach ($specialty->doctors as $doctor)
                                    <a class="cursor-pointer "
                                        wire:click="selectDate({{ $doctor->id }} , {{ $specialty->id }})"">
                                        <div class="flex items-center mb-2 ">
                                            <div class="h-6 w-6 mr-3   flex-shrink-0 rounded-full ">
                                                <img class="h-full w-full rounded-full object-cover"
                                                    src="{{ $doctor->profile_photo_url }}"
                                                    alt="{{ $doctor->name }}" />
                                            </div>
                                            <div>
                                                <p class="text-sm tracking-wide capitalize text-gray-800">
                                                    {{ $doctor->name }}</p>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            @else
                                <p class="text-sm text-gray-600">
                                    {{ __('this specialty dont have a doctor right now :c') }}</p>
                            @endif
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="p-10">
        @if (!empty($specialties))
            {{ $specialties->links() }}
        @endif

    </div>


    {{-- <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
        @foreach ($specialties as $specialty)
            <div
                class="border rounded-lg shadow-lg hover:-translate-y-5 hover:shadow-2xl transition duration-500 ease-in-out">
                <div class="h-60 md:h-72 lg:h-80 w-full bg-cover bg-center rounded-t-lg"
                    style="background-image: url('{{ asset('assets/virus/v' . random_int(0, 10) . '.jpg') }}')"></div>
                <div class="p-4">
                    <h1 class="text-black-700 font-bold text-xl">{{ $specialty->name }}</h1>
                    <div class="mt-4 max-h-32 overflow-y-auto">
                        <p class="text-sm text-blue-600 font-medium capitalize mb-3">{{ __('doctors') }} <i
                                class="ms-3 fa-solid fa-bookmark"></i></p>
                        @if (count($specialty->doctors) > 0)
                            @foreach ($specialty->doctors as $doctor)
                                <div class="flex items-center mb-2 cursor-pointer"
                                    wire:click="selectDate({{ $doctor->id }} , {{ $specialty->id }})">
                                    <div class="h-8 w-8 flex-shrink-0 rounded-full overflow-hidden mr-3">
                                        <img class="h-full w-full object-cover" src="{{ $doctor->profile_photo_url }}"
                                            alt="{{ $doctor->name }}" />
                                    </div>
                                    <div>
                                        <p class="text-md text-gray-600 font-medium">{{ $doctor->name }}</p>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p class="text-sm text-gray-600">
                                {{ __('this specialty dont have a doctor right now :c') }}</p>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="p-10">
        @if (!empty($specialties))
            {{ $specialties->links() }}
        @endif
    </div> --}}


</div>

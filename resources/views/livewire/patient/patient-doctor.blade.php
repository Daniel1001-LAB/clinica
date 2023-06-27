<div class="p-2">
    <!-- Hero -->

    <div class="relative overflow-hidden">
        <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-10">
            <div class="text-center">
                <h1 class="text-4xl sm:text-6xl capitalize font-bold text-gray-800 dark:text-gray-200">
                    {{ __('search and found the best doctors') }}
                </h1>

                <p class="mt-3 text-gray-600 dark:text-gray-400">
                    {{ __('Select and search for the doctor of your greatest preference') }}
                </p>

                <div class="mt-7 sm:mt-12 mx-auto max-w-xl relative">
                    <!-- Form -->
                    <form>
                        <div
                            class="relative z-10 flex space-x-3 p-3 bg-white border rounded-lg shadow-lg shadow-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:shadow-gray-900/[.2]">
                            <div class="flex-[1_0_0%]">
                                <label for="hs-search-article-1"
                                    class="block text-sm text-gray-700 font-medium dark:text-white"><span
                                        class="sr-only">Search a Doctor:</span></label>
                                <input wire:model="search" placeholder="{{ 'find doctor' }}" name="hs-search-article-1"
                                    id="hs-search-article-1"
                                    class="p-3 block w-full border-transparent rounded-md focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:text-gray-400"
                                    placeholder="Search article">
                            </div>
                            <div class="flex-[0_0_auto]">
                                <a class="p-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800"
                                    href="#doctors">
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
    <!-- End Hero -->
    <div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20  ">
        <div class="grid gap-10  grid-cols-1 mx-auto md:grid-cols-2 lg:grid-cols-2 lg:max-w-screen-lg ">
            @foreach ($doctors as $doctor)
                <div
                    class="grid sm:grid-cols-3 shadow-lg h-full hover:-translate-y-5 hover:shadow-2xl transition duration-500 ease-in-out">
                    <div class="relative w-full h-48 max-h-full rounded shadow sm:h-auto">
                        <img class="absolute object-cover w-full h-full rounded" src="{{ $doctor->profile_photo_url }}"
                            alt="Person" />
                    </div>
                    <div class="flex flex-col p-4 justify-center mt-5 sm:mt-0 sm:p-6 sm:col-span-2 ">
                        <p class="text-lg font-bold">{{ $doctor->name }}</p>
                        <p class="mb-4 text-xs capitalize text-gray-800">{{ __('specialties') }}:</p>
                        <div class="max-h-32 overflow-y-auto ">
                            @foreach ($doctor->specialties as $specialty)
                                <a class="cursor-pointer "
                                    wire:click="selectDate({{ $doctor->id }} , {{ $specialty->id }})">
                                    <div class="flex items-center mb-2 ">
                                        <div class="h-6 w-6 mr-3   flex-shrink-0 rounded-full ">
                                            <img class="h-full w-full rounded-full object-cover"
                                                src="{{ asset('assets/virus/v' . random_int(0, 10) . '.jpg') }}"
                                                alt="{{ $specialty->name }}" />
                                        </div>
                                        <div>
                                            <p class="text-sm tracking-wide capitalize text-gray-800">
                                                {{ $specialty->name }}</p>

                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
        <div class="p-10">
            {{ $doctors->links() }}
        </div>
    </div>

</div>



{{-- <section class="mx-auto my-6 ">
    <div class="flex flex-wrap p-10">
        <div class="container mx-auto px-4 mt-2 p-5">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                <div class="col-span-1 lg:col-span-4 text-left md:text-center">
                    <h3 class="text-black text-5xl capitalize">{{ __('our doctors') }}</h3>
                </div>
            </div>
        </div>
        <h2 class="text-black"></h2>
        <div class="w-full">
            <form class="flex items-center">
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
                    <input wire:model="search" placeholder="{{ 'find doctor' }}" type="text" id="simple-search"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Search" required>
                </div>
            </form>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
        @foreach ($doctors as $doctor)
            <div
                class="border rounded-lg shadow-lg hover:-translate-y-5 hover:shadow-2xl transition duration-500 ease-in-out">
                <div class="h-60 md:h-72 lg:h-80 w-full bg-cover bg-center rounded-t-lg"
                    style="background-image: url('{{ $doctor->profile_photo_url }}')"></div>
                <div class="p-4">
                    <h1 class="text-black-700 font-bold text-xl">{{ $doctor->name }}</h1>
                    <div class="mt-4 max-h-32 overflow-y-auto">
                        <p class="text-sm text-blue-600 font-medium capitalize mb-3">{{ __('specialties') }} <i
                                class="ms-3 fa-solid fa-bookmark"></i></p>
                        @foreach ($doctor->specialties as $specialty)
                            <a class="cursor-pointer"
                                wire:click="selectDate({{ $doctor->id }} , {{ $specialty->id }})">
                                <div class="flex items-center mb-2">
                                    <div class="h-8 w-8 flex-shrink-0 rounded-full overflow-hidden mr-3">
                                        <img class="h-full w-full object-cover"
                                            src="{{ asset('assets/virus/v' . random_int(0, 10) . '.jpg') }}"
                                            alt="{{ $specialty->name }}" />
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-600 font-medium">{{ $specialty->name }}</p>

                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="p-10">
        @if (!empty($doctors))
            {{ $doctors->links() }}
        @endif

    </div>
</section> --}}

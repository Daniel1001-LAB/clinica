<section class="mx-auto my-6 ">
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
                            <a class="cursor-pointer" wire:click="selectDate({{$doctor->id}} , {{$specialty->id}})">
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
</section>

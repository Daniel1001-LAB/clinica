<div class="container mx-auto">
    <div class="flex flex-wrap items-center">
        <div class="w-full md:w-6/12 mb-5 md:mb-0">
            <div class="flex">
                <img src="{{ asset('assets/special.jpg') }}" class=" w-full h-full object-cover rounded-lg "
                    alt="">
            </div>
        </div>
        <div class="w-full md:w-6/12 text-center md:text-left">
            <h2 class="text-4xl text-pink-500 capitalize font-bold text-center md:text-center">
                {{ __('first step') }}:</h2>
            <h4 class="text-2xl font-bold text-gray-700 uppercase mt-4 text-center">
                {{ __('select a medical specialty or a doctor.') }}</h4>
            <p class="text-lg text-gray-700 leading-relaxed text-center mt-4">
                {{ __('You can choose from several doctors if you search for them according to their specialty. If you already have a doctor you trust, then request your appointment') }}
            </p>
            <div class="flex justify-center md:justify-start lg:justify-center mt-6">
                <a href="#doctors"
                    class="shadow-lg m-3 transform hover:-translate-y-1 hover:scale-110 transition duration-500 ease-in-out bg-pink-500 hover:bg-pink-700 text-white font-bold py-2 px-4 rounded inline-flex items-center capitalize ml-3 mb-2">{{ __('doctors') }}
                    <i class="ms-3 fa-solid fa-user-doctor fa-beat"></i>
                </a>
                <a href="#specialties"
                    class="shadow-lg m-3 transform hover:-translate-y-1 hover:scale-110 transition duration-500 ease-in-out bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-flex items-center capitalize ml-3 mb-2">{{ __('specialties') }}
                    <i class="ms-3 fa-solid fa-bookmark fa-beat"></i>
                </a>

                <a href="#beadoctor"
                    class="shadow-lg m-3 transform hover:-translate-y-1 hover:scale-110 transition duration-500 ease-in-out bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-flex items-center capitalize ml-3 mb-2">{{ __('for doctors') }}
                </a>
            </div>
        </div>
    </div>
</div>

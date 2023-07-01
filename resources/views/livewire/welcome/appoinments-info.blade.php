<div class="relative px-4 pt-16 mx-auto lg:py-32 md:px-8 xl:px-20 sm:max-w-xl md:max-w-full">
    <div class="max-w-xl mx-auto lg:max-w-screen-xl">
        <div class="mb-16 lg:max-w-lg lg:mb-0">
            <div class="max-w-xl mb-6">
                <div>
                    <p
                        class="inline-block px-3 py-px mb-4 text-xs font-semibold tracking-wider text-white uppercase rounded-full bg-blue-500">
                        UAPS - SAN LUIS PLANES
                    </p>
                </div>
                <h2
                    class="max-w-lg mb-6 font-sans text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl sm:leading-none">
                    Deseas agendar una<br class="hidden md:block" />
                    nueva
                    <span class="inline-block text-blue-700">cita?</span>
                </h2>
                <p class="text-base text-gray-700 md:text-lg">
                    Si ya tienes una cuenta inicia sesion y escoge cualquiera de nuestras especialidades medicas
                    o al doctor de tu preferencia, sino tienes una cuenta puedes registrarte de forma gratuita.
                </p>
            </div>
            <div class="flex items-center">
                @auth
                    <a href="#historial"
                        class="shadow-lg transform hover:-translate-y-1 hover:scale-110 transition duration-500 ease-in-out bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-flex items-center capitalize ml-3 mb-2">
                        {{ __('medical history') }}
                        <i class="ms-2 fas fa-address-card"></i>
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="shadow-lg transform hover:-translate-y-1 hover:scale-110 transition duration-500 ease-in-out bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-flex items-center capitalize ml-3 mb-2">
                        {{ __('login') }}
                        <i class="ms-2 fas fa-right-to-bracket"></i>
                    </a>
                    <a href="{{ route('register') }}"
                        class="shadow-lg transform hover:-translate-y-1 hover:scale-110 transition duration-500 ease-in-out bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-flex items-center capitalize ml-3 mb-2">
                        {{ __('register') }}
                        <i class="ms-2 fas fa-address-card"></i>
                    </a>
                @endauth
            </div>
        </div>
    </div>
    <div
        class="flex justify-center h-full overflow-hidden lg:w-2/3 xl:w-1/2 lg:absolute lg:justify-start lg:bottom-0 lg:right-0 lg:items-end">
        <img src="{{ asset('assets/citasImg.jpg') }}"
            class="object-cover object-top w-full h-64 max-w-xl  mb-16 rounded-xl shadow-2xl lg:ml-64 xl:ml-8 lg:-mb-24 xl:-mb-28 lg:h-auto lg:max-w-screen-md"
            alt="" />
    </div>
</div>

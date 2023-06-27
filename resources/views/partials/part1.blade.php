<article>
    <div class="relative h-screen bg-red-500 mx-auto w-full scroll-mt-0" id="inicio">
        <img class="absolute inset-0 h-full w-full object-cover opacity-85" src="{{ asset('assets/cita_2.jpg') }}"
            alt="{{ __('appoinment') }}" />
        <div class="absolute inset-0 bg-gradient-to-tl from-blue-400 via-blue-900 to-transparent opacity-90">
        </div>
        <div class="relative max-w-3xl mx-auto text-center py-16 px-4 sm:py-20 sm:px-6 opacity-90">
            <h2 class="text-3xl font-medium text-white sm:text-4xl w-full">
                <span class="block">
                    {{ __('Enfocados en su bienestar y comodidad.') }}
                </span>
                <span class="block text-2xl">
                    {{ __('Con nosotros usted maneja su salud') }}
                </span>
            </h2>
            <p class="mt-4 text-lg leading-6 text-gray-200">
                {{ __('Somos una forma rápida y sencilla para gestionar sus citas médicas y controlar el resultado de sus consultas y entrevistas.') }}
            </p>
            <div class="mt-4 max-w-sm mx-auto sm:max-w-none sm:justify-center">
                <div class="space-y-4 sm:space-y-0 sm:mx-auto sm:inline-grid sm:grid-cols-1 sm:gap-5">
                    <a href="#seleccion"
                        class="text-white px-4 py-2 bg-red-600 hover:bg-green-600 flex items-center justify-center border text-base font-medium rounded-md shadow-sm sm:px-8 focus:ring focus:ring-offset-1">{{ __('Agendar Cita') }}</a>
                    @auth

                    <div class="bg-indigo-800 text-center py-4 lg:px-4">
                        <div class="p-2 bg-indigo-800 items-center text-white leading-none lg:rounded-md flex lg:inline-flex" role="alert">
                          <span class="flex rounded-md bg-indigo-300 uppercase px-2 py-1 text-xs font-bold mr-3">Bienvenido</span>
                          <span class="font-semibold mr-2 text-left flex-auto">{{ auth()->user()->name }}</span>
                        </div>

                        <a href="#historial"
                        class="text-white px-4 py-2 bg-red-600 hover:bg-green-600 flex items-center justify-center border text-base font-medium rounded-md shadow-sm sm:px-8 focus:ring focus:ring-offset-1">{{ __('Historial Médico') }}</a>
                      </div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <a class="text-white px-4 py-2 bg-red-600 hover:bg-green-600 flex items-center justify-center border text-base font-medium rounded-md shadow-sm sm:px-8 focus:ring focus:ring-offset-1"
                                href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </a>
                        </form>
                        @unlessrole('doctor')
                          @livewire('make-me-doctor')
                        @endunlessrole
                    @else
                        <a href="{{ route('login') }}"
                            class="text-white px-4 py-2 bg-blue-900 hover:bg-green-600 flex items-center justify-center border text-base font-medium rounded-md shadow-sm sm:px-8 focus:ring focus:ring-offset-1">{{ __('login') }}</a>

                        <a href="{{ route('register') }}"
                            class="text-white px-4 py-2 bg-blue-900 hover:bg-green-600 flex items-center justify-center border text-base font-medium rounded-md shadow-sm sm:px-8 focus:ring focus:ring-offset-1">{{ __('register') }}</a>
                    @endauth

                </div>
            </div>
        </div>
    </div>
</article>

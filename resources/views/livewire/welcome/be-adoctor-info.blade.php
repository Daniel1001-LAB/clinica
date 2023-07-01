<div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
    <div class="flex flex-col justify-between lg:flex-row">
        <div class="mb-12 lg:max-w-lg lg:pr-5 lg:mb-0">
            <div class="max-w-xl mb-6">
                <h2
                    class="max-w-lg mb-6 font-sans text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl sm:leading-none">
                    Deseas Iniciar Como <br class="hidden md:block" />

                    <span class="inline-block text-blue-400"> Médico en UAPS - San Luis?</span>
                </h2>
                <p class="text-base text-gray-700 md:text-lg">
                    Para ingresar a nuestro equipo sólo necesitas registrarte iniciar sessión y solicitar ser
                    parte de nuestros equipo de médicos. Se te solicitará ingresar de nuevo y listo, puedes
                    empezar a ingresar tus datos profesionales mientras te activamos luego de enviar los
                    requisitos y acreditaciones que te solicitaremos.
                </p>
            </div>
            <hr class="mb-6 border-gray-300" />
            <div class="flex">

                <div class="flex flex-col">
                    <a href="{{ route('register') }}"
                        class="transform hover:-translate-y-1 hover:scale-110 transition duration-500 ease-in-out bg-pink-500 hover:bg-pink-700 text-white font-bold py-2 px-4 rounded inline-flex items-center capitalize ml-3 mb-2 shadow-xl">
                        {{ __('Register') }}
                    </a>
                </div>
            </div>
        </div>
        <div class="px-5 pt-6 pb-5 text-center border border-gray-300 rounded lg:w-2/5">
            <div class="mb-5 font-semibold">Solicita ser parte de nosotros</div>
            <div class="flex justify-center w-full mb-3">
                <a href="mailto:edwindaniel.merinopaz@gmail.com?subject=Deseo ser parte de UAPS - SAN LUIS PLANES"
                    class="inline-flex items-center justify-center w-full h-12 px-6 font-medium tracking-wide text-white transition duration-200 rounded shadow-md md:w-auto bg-blue-500 hover:bg-blue-700 focus:shadow-outline focus:outline-none">
                    <div class="flex items-center">
                        <div class="mr-3 font-semibold text-white">Solicitar</div>
                        <svg class="w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M16.53,11.152l-8-5C8.221,5.958,7.833,5.949,7.515,6.125C7.197,6.302,7,6.636,7,7v10 c0,0.364,0.197,0.698,0.515,0.875C7.667,17.958,7.833,18,8,18c0.184,0,0.368-0.051,0.53-0.152l8-5C16.822,12.665,17,12.345,17,12 S16.822,11.335,16.53,11.152z">
                            </path>
                        </svg>
                    </div>
                </a>
            </div>
            <p class="max-w-md px-5 mb-3 text-xs text-gray-600 sm:text-sm md:mb-5">
                Es muy sencillo rápido y fácil. Una vez aprobado tu ingreso formarás parte de nuestro equipo y
                aparecerás en tu perfil de médico
            </p>
            <div class="flex items-center w-full mb-5">
                <hr class="flex-1 border-gray-300" />
                <div class="px-3 text-xs text-gray-500 sm:text-sm">or</div>
                <hr class="flex-1 border-gray-300" />
            </div>
            <a href="{{ route('login') }}"
                class="transform hover:-translate-y-1 hover:scale-110 transition duration-500 ease-in-out bg-pink-500 hover:bg-pink-700 text-white font-bold py-2 px-4 rounded inline-flex items-center capitalize ml-3 mb-2 shadow-xl">
                Ya tienes una cuenta?
            </a>
        </div>
    </div>
</div>

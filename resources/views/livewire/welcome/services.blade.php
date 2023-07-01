<div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
    <div class="max-w-xl mb-10 md:mx-auto sm:text-center lg:max-w-2xl md:mb-12">
        <div>
            <p
                class="inline-block px-3 py-px mb-4 text-xs font-semibold tracking-wider text-teal-900 uppercase rounded-full bg-blue-400">
                UAPS - SAN LUIS PLANES
            </p>
        </div>
        <h2
            class="max-w-lg mb-6 font-sans text-3xl font-bold leading-none tracking-tight text-gray-900 sm:text-4xl md:mx-auto">
            <span class="relative inline-block">
                <svg viewBox="0 0 52 24" fill="currentColor"
                    class="absolute top-0 left-0 z-0 hidden w-32 -mt-8 -ml-20 text-blue-gray-100 lg:w-32 lg:-ml-28 lg:-mt-10 sm:block">
                    <defs>
                        <pattern id="07690130-d013-42bc-83f4-90de7ac68f76" x="0" y="0"
                            width=".135" height=".30">
                            <circle cx="1" cy="1" r=".7"></circle>
                        </pattern>
                    </defs>
                    <rect fill="url(#07690130-d013-42bc-83f4-90de7ac68f76)" width="52" height="24">
                    </rect>
                </svg>
                <span class="relative">Nuestros</span>
            </span>
            Servicios
        </h2>
        <p class="text-base text-gray-700 md:text-lg mb-8">
            Un día decidimos crear una aplicación web que permitiese a los usuarios agendar sus citas médicas
            usando tanto su computadora como su teléfono. Pensamos que el paciente nada más debía saber una de
            <strong class="text-blue-600">tres</strong> cosas:
        </p>
        <div class="grid gap-8 row-gap-8 lg:grid-cols-3">

            <div class="sm:text-center">
                <div
                    class="flex items-center justify-center w-24 h-24 mb-4 text-5xl font-extrabold rounded-full text-blue-400 bg-indigo-50 sm:mx-auto">
                    1
                </div>
                <h6 class="mb-2 font-semibold leading-5">Especialidad</h6>
                <p class="max-w-md mb-3 text-sm text-gray-900 sm:mx-auto">
                    Qué especialidad médica necesita.
                </p>
                <a href="#specialties" aria-label=""
                    class="capitalize inline-flex items-center font-semibold transition-colors duration-200 text-blue-400 hover:text-deep-purple-800">{{ __('specialties') }}</a>
            </div>
            <div class="sm:text-center">
                <div
                    class="flex items-center justify-center w-24 h-24 mb-4 text-5xl font-extrabold rounded-full text-blue-400 bg-indigo-50 sm:mx-auto">
                    2
                </div>
                <h6 class="mb-2 font-semibold leading-5">Médicos</h6>
                <p class="max-w-md mb-3 text-sm text-gray-900 sm:mx-auto">
                    Cual es el nombre del médico que necesita.
                </p>
                <a href="#doctors" aria-label=""
                    class="inline-flex items-center font-semibold transition-colors duration-200 text-blue-400 hover:text-deep-purple-800 capitalize">{{ __('doctors') }}</a>
            </div>
            <div class="sm:text-center">
                <div
                    class="flex items-center justify-center w-24 h-24 mb-4 text-5xl font-extrabold rounded-full text-blue-400 bg-indigo-50 sm:mx-auto">
                    3
                </div>
                <h6 class="mb-2 font-semibold leading-5">Fecha de atención</h6>
                <p class="max-w-md mb-3 text-sm text-gray-900 sm:mx-auto">
                    El paciente entonces escogería la fecha y hora que desea ser atendido y el médico le
                    confirma su solicitud.
                </p>

            </div>
        </div>
    </div>
    <div class="grid max-w-screen-lg mx-auto space-y-6 lg:grid-cols-2 lg:space-y-0 lg:divide-x">
        <div class="space-y-6 sm:px-16">
            <div class="flex flex-col max-w-md sm:flex-row">
                <div class="mb-4 mr-4">
                    <div class="flex items-center justify-center w-12 h-12 rounded-full bg-indigo-50">
                        <svg class="w-8 h-8 text-blue-400 sm:w-10 sm:h-10" stroke="currentColor"
                            viewBox="0 0 52 52">
                            <polygon stroke-width="3" stroke-linecap="round" stroke-linejoin="round"
                                fill="none" points="29 13 14 29 25 29 23 39 38 23 27 23"></polygon>
                        </svg>
                    </div>
                </div>
                <div>
                    <h6 class="mb-3 text-xl font-bold leading-5">Citas Médicas</h6>
                    <p class="text-sm text-gray-900">
                        Podrá manejar su agenda de citas médicas en multiples lugares sin importar el dispositivo.
                    </p>
                </div>
            </div>
            <div class="flex flex-col max-w-md sm:flex-row">
                <div class="mb-4 mr-4">
                    <div class="flex items-center justify-center w-12 h-12 rounded-full bg-indigo-50">
                        <svg class="w-8 h-8 text-blue-400 sm:w-10 sm:h-10" stroke="currentColor"
                            viewBox="0 0 52 52">
                            <polygon stroke-width="3" stroke-linecap="round" stroke-linejoin="round"
                                fill="none" points="29 13 14 29 25 29 23 39 38 23 27 23"></polygon>
                        </svg>
                    </div>
                </div>
                <div>
                    <h6 class="mb-3 text-xl font-bold leading-5">Historial Médico</h6>
                    <p class="text-sm text-gray-900">
                        Podrá manejar el historial médico de cada uno de sus pacientes sin restricciones de ninguna clase.
                    </p>
                </div>
            </div>
            <div class="flex flex-col max-w-md sm:flex-row">
                <div class="mb-4 mr-4">
                    <div class="flex items-center justify-center w-12 h-12 rounded-full bg-indigo-50">
                        <svg class="w-8 h-8 text-blue-400 sm:w-10 sm:h-10" stroke="currentColor"
                            viewBox="0 0 52 52">
                            <polygon stroke-width="3" stroke-linecap="round" stroke-linejoin="round"
                                fill="none" points="29 13 14 29 25 29 23 39 38 23 27 23"></polygon>
                        </svg>
                    </div>
                </div>
                <div>
                    <h6 class="mb-3 text-xl font-bold leading-5">Comunicación</h6>
                    <p class="text-sm text-gray-900">
                        Podrá mantener contacto con sus pacientes de manera rápida, directa y en tiempo real.
                    </p>
                </div>
            </div>
        </div>
        <div class="space-y-6 sm:px-16">
            <div class="flex flex-col max-w-md sm:flex-row">
                <div class="mb-4 mr-4">
                    <div class="flex items-center justify-center w-12 h-12 rounded-full bg-indigo-50">
                        <svg class="w-8 h-8 text-blue-400 sm:w-10 sm:h-10" stroke="currentColor"
                            viewBox="0 0 52 52">
                            <polygon stroke-width="3" stroke-linecap="round" stroke-linejoin="round"
                                fill="none" points="29 13 14 29 25 29 23 39 38 23 27 23"></polygon>
                        </svg>
                    </div>
                </div>
                <div>
                    <h6 class="mb-3 text-xl font-bold leading-5">Promoción</h6>
                    <p class="text-sm text-gray-900">
                        Su prestigio y calidad profesional se verá incrementada al usar las nuevas tecnologias desarrolladas para telemedicina.
                    </p>
                </div>
            </div>
            <div class="flex flex-col max-w-md sm:flex-row">
                <div class="mb-4 mr-4">
                    <div class="flex items-center justify-center w-12 h-12 rounded-full bg-indigo-50">
                        <svg class="w-8 h-8 text-blue-400 sm:w-10 sm:h-10" stroke="currentColor"
                            viewBox="0 0 52 52">
                            <polygon stroke-width="3" stroke-linecap="round" stroke-linejoin="round"
                                fill="none" points="29 13 14 29 25 29 23 39 38 23 27 23"></polygon>
                        </svg>
                    </div>
                </div>
                <div>
                    <h6 class="mb-3 text-xl font-bold leading-5">Una forma nueva de atencion</h6>
                    <p class="text-sm text-gray-900">
                        La atención médica es tan importante como tambien lo es la agilidad de las gestiones.
                    </p>
                </div>
            </div>
            <div class="flex flex-col max-w-md sm:flex-row">
                <div class="mb-4 mr-4">
                    <div class="flex items-center justify-center w-12 h-12 rounded-full bg-indigo-50">
                        <svg class="w-8 h-8 text-blue-400 sm:w-10 sm:h-10" stroke="currentColor"
                            viewBox="0 0 52 52">
                            <polygon stroke-width="3" stroke-linecap="round" stroke-linejoin="round"
                                fill="none" points="29 13 14 29 25 29 23 39 38 23 27 23"></polygon>
                        </svg>
                    </div>
                </div>
                <div>
                    <h6 class="mb-3 text-xl font-bold leading-5">Futuro</h6>
                    <p class="text-sm text-gray-900">
                        Estamos comenzando la gran aventura que nos depara un futuro lleno de excelentes oportunidades.
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>

<section id="acerca">
    <h2 class="text-2xl font-bold text-gray-400 sm:text-3xl text-center">Quienes somos</h2>
    <div class="grid gap-8 text-neutral-600 grid-cols-1 md:grid-cols-2 p-6 border rounded-md">
        <!-- Card Item -->
        <div
            class="my-8 rounded shadow-lg shadow-gray-200 dark:shadow-gray-900 bg-white dark:bg-gray-800 duration-300 hover:-translate-y-1">
            <!-- Clickable Area -->
            <a _href="link" class="cursor-pointer">
                <figure>
                    <!-- Image -->
                    <img src="{{ asset('assets/secretaria.jpg') }}" class="rounded-t h-72 w-full object-cover" />

                    <figcaption class="p-4">
                        <!-- Title -->
                        <p class="text-lg mb-4 font-bold leading-relaxed text-gray-800 dark:text-gray-300">
                            ROKAVE
                        </p>

                        <!-- Description -->
                        <small class="leading-5 text-gray-500 dark:text-gray-400">
                            Un día decidimos crear una aplicación web que permitiese a los usuarios agendar sus citas
                            médicas usando tanto su computadora como su teléfono.
                            Pensamos que el paciente nada más debía saber una de dos cosas:
                        </small>
                        <p>

                            <small class="leading-5 text-gray-500 dark:text-gray-400">
                                1.- Qué especialidad médica necesita
                            </small>
                        </p>
                        <p>
                            <small class="leading-5 text-gray-500 dark:text-gray-400">
                                2.- Cual es el nombre del médico que necesita
                            </small>
                        </p>
                        <p>
                            <small class="leading-5 text-gray-500 dark:text-gray-400">
                                El paciente entonces escogería la fecha y hora que desea ser atendido y el médico le
                                confirma su solicitud.
                            </small>
                        </p>
                    </figcaption>
                </figure>
            </a>
        </div>

        <div
            class="my-8 rounded shadow-lg shadow-gray-200 dark:shadow-gray-900 bg-white dark:bg-gray-800 duration-300 hover:-translate-y-1">
            <!-- Clickable Area -->
            <a _href="link" class="cursor-pointer">
                <figure>
                    <!-- Image -->
                    <img src="{{ asset('assets/camino.jpg') }}" class="rounded-t h-72 w-full object-cover" />

                    <figcaption class="p-4">
                        <!-- Title -->
                        <p class="text-lg mb-4 font-bold leading-relaxed text-gray-800 dark:text-gray-300">
                            ESPECTATIVAS
                        </p>

                        <!-- Description -->
                        <small class="leading-5 text-gray-500 dark:text-gray-400">
                            Estamos comenzando pero ya tenemos instrumentada gran parte de las funcionalidades de la
                            aplicación.
                        </small>
                        <small class="leading-5 text-gray-500 dark:text-gray-400">


                            <h2 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">Funcionalidades:</h2>
                            <ul class="max-w-md space-y-1 text-gray-500 list-inside dark:text-gray-400">
                                <li class="flex items-center">
                                    <svg class="w-4 h-4 mr-1.5 text-green-500 dark:text-green-400 flex-shrink-0"
                                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    Agendado y confirmación de citas
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-4 h-4 mr-1.5 text-green-500 dark:text-green-400 flex-shrink-0"
                                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    Registro y control de historial médico
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-4 h-4 mr-1.5 text-green-500 dark:text-green-400 flex-shrink-0"
                                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    Registro y control de historial farmacológico
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-4 h-4 mr-1.5 text-gray-400 flex-shrink-0" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    Registro de exámenes médicos y necesidades futuras
                                </li>
                            </ul>

                        </small>
                    </figcaption>
                </figure>
            </a>
        </div>
    </div>
    <div class="flex justify-center gap-4 mx-12 my-6">
        <a href="#footer"
            class="text-white px-4 py-2 bg-blue-600 hover:bg-green-600 flex items-center justify-center border text-base font-medium rounded-md shadow-sm sm:px-8 focus:ring focus:ring-offset-1">{{ __('Para Médicos') }}</a>
        <a href="#inicio"
            class="text-white px-4 py-2 bg-blue-600 hover:bg-green-600 flex items-center justify-center border text-base font-medium rounded-md shadow-sm sm:px-8 focus:ring focus:ring-offset-1">{{ __('Inicio') }}</a>
    </div>
</section>

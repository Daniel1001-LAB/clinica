<section id="servicios">
    <h2 class="text-2xl font-medium text-gray-400 sm:text-3xl text-center">Nuestros Servicios</h2>
    <div class="grid gap-8 text-neutral-600 grid-cols-1 md:grid-cols-6 p-6 border rounded-md">
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
                            Secretariado
                        </p>

                        <!-- Description -->
                        <small class="leading-5 text-gray-500 dark:text-gray-400">
                            Secretaria Virtual con servicio ininterrupido las 24 horas del día.

                        </small>
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
                    <img src="{{ asset('assets/calendario.jpg') }}" class="rounded-t h-72 w-full object-cover" />

                    <figcaption class="p-4">
                        <!-- Title -->
                        <p class="text-lg mb-4 font-bold leading-relaxed text-gray-800 dark:text-gray-300">
                            Citas Médicas
                        </p>

                        <!-- Description -->
                        <small class="leading-5 text-gray-500 dark:text-gray-400">
                            Podrá manejar su agenda de citas médicas en multiples lugares
                        </small>
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
                    <img src="{{ asset('assets/online.png') }}" class="rounded-t h-72 w-full object-cover" />

                    <figcaption class="p-4">
                        <!-- Title -->
                        <p class="text-lg mb-4 font-bold leading-relaxed text-gray-800 dark:text-gray-300">
                            Historial Médico
                        </p>

                        <!-- Description -->
                        <small class="leading-5 text-gray-500 dark:text-gray-400">
                            Podrá manejar el historial médico de cada uno de sus pacientes sin restricciones de ninguna
                            clase.
                        </small>
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
                    <img src="{{ asset('assets/form-social.jpg') }}" class="rounded-t h-72 w-full object-cover" />

                    <figcaption class="p-4">
                        <!-- Title -->
                        <p class="text-lg mb-4 font-bold leading-relaxed text-gray-800 dark:text-gray-300">
                            Comunicación
                        </p>

                        <!-- Description -->
                        <small class="leading-5 text-gray-500 dark:text-gray-400">
                            Podrá mantener contacto con sus pacientes de manera rápida, directa y en tiempo real.
                        </small>
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
                    <img src="{{ asset('assets/promocion.jpg') }}" class="rounded-t h-72 w-full object-cover" />

                    <figcaption class="p-4">
                        <!-- Title -->
                        <p class="text-lg mb-4 font-bold leading-relaxed text-gray-800 dark:text-gray-300">
                            Promoción
                        </p>

                        <!-- Description -->
                        <small class="leading-5 text-gray-500 dark:text-gray-400">
                            Su prestigio y calidad profesional se verá incrementada al usar las nuevas tecnologias
                            desarrolladas para telemedicina.
                        </small>
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
                        Futuro
                    </p>

                    <!-- Description -->
                    <small class="leading-5 text-gray-500 dark:text-gray-400">
                        Estamos comenzando la gran aventura que nos depara un futuro lleno de excelentes oportunidades.
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

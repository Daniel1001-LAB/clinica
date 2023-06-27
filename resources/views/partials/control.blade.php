<section id="control" >
    <article>
        <div class="relative h-screen bg-red-500 mx-auto w-full scroll-mt-0" id="inicio">
            <img class="absolute h-full w-full object-cover opacity-30" src="{{ asset('assets/telemedicina.jpg') }}"
                alt="{{ __('appoinment') }}" />
            <div class="absolute inset-0 bg-gradient-to-tl from-blue-400 via-blue-900 to-transparent opacity-90">
            </div>
            <div class="relative max-w-2xl mx-auto text-center py-16 px-4 sm:py-20 sm:px-6 opacity-90">
                <h2 class="text-3xl font-extrabold text-white sm:text-4xl">
                    <span class="block">
                        {{ __('Control e Historial Médico') }}
                    </span>
                    <span class="block text-2xl">
                        {{ __('Los historiales médicos no solo sirven para mejorar la calidad de la atención al paciente, además son instrumentos de control para los profesionales médico y para usted') }}
                    </span>
                </h2>
                <p class="mt-1 md:mt-4 text-lg leading-6 text-gray-200">
                    {{ __('Con nuestro servicio en linea usted controlará su historial médico.
                                           ') }}
                </p>
                <p class="mt-1 md:mt-4 text-lg leading-6 text-gray-200">
                    {{ __('Su historial médico es el instrumento que permite obtener una visión clara y total de su salud.
                    Permítanos ayudar en ese sentido manteniendo y permitiendo que nuestro especialistas puedan tener una visión clara para prestarle el mejor servicio médico.
                                           ') }}
                </p>

                <div class="flex flex-col md:flex-row justify-between my-2 md:my-8 gap-4">

                    <a href="#listado-medicos"
                        class="text-white px-4 py-2 bg-red-600 hover:bg-green-600 flex items-center justify-center border text-base font-medium rounded-md shadow-sm sm:px-8 focus:ring focus:ring-offset-1">{{ __('Medicos') }}</a>
                    <a href="#seleccion"
                        class="text-white px-4 py-2 bg-red-600 hover:bg-green-600 flex items-center justify-center border text-base font-medium rounded-md shadow-sm sm:px-8 focus:ring focus:ring-offset-1">{{ __('Especialidades') }}</a>
                    <a href="#inicio"
                        class="text-white px-4 py-2 bg-blue-600 hover:bg-green-600 flex items-center justify-center border text-base font-medium rounded-md shadow-sm sm:px-8 focus:ring focus:ring-offset-1">{{ __('Inicio') }}</a>
                        <a href="#footer"
                        class="text-white px-4 py-2 bg-blue-600 hover:bg-green-600 flex items-center justify-center border text-base font-medium rounded-md shadow-sm sm:px-8 focus:ring focus:ring-offset-1">{{ __('Para Pacientes') }}</a>
                </div>
    </article>
</section>

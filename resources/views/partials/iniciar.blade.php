<section id="iniciar">
    <article class="grid grid-cols-1 md:grid-cols-3 gap-4 justify-between">
        <div class="hidden md:block">
        <div class="relative h-screen bg-transparent mx-auto w-full scroll-mt-0" id="inicio">
            <img class="absolute h-full w-full object-cover opacity-95" src="{{ asset('assets/curriculum.jpg') }}"
                alt="{{ __('appoinment') }}" />
            <div class="absolute inset-0 bg-gradient-to-t from-blue-400 via-blue-100 to-transparent opacity-5">
            </div>
        </div>
        </div>
        <div class="border rounded-md bg-slate-700 flex flex-col gap-4 text-center p-6">
           <h2 class="text-2xl font-extrabold text-white italic sm:text-3xl">Iniciar como médico</h2>
           <p class="text-white text-xl">
            Para ingresar a nuestro equipo sólo necesitas registrarte iniciar sessión y solicitar ser parte de nuestros equipo de médicos.
            Se te solicitará ingresar de nuevo y listo, puedes empezar a ingresar tus datos profesionales miestras te activamos luego de enviar los requisitos y acreditaciones que te solicitaremos.
           </p>
           <p  class="text-white text-xl">
            Es muy sencillo rápido y fácil.
            Una vez aprobado tu ingreso formarás parte de nuestro equipo y aparecerás tu perfil de médico
           </p>
           <div>
            <a href="#footer"
            class="text-white px-4 py-2 bg-blue-600 hover:bg-green-600 flex items-center justify-center border text-base font-medium rounded-md shadow-sm sm:px-8 focus:ring focus:ring-offset-1 my-1">{{ __('Para Médicos') }}</a>
            <a href="#inicio"
                        class="text-white px-4 py-2 bg-blue-600 hover:bg-green-600 flex items-center justify-center border text-base font-medium rounded-md shadow-sm sm:px-8 focus:ring focus:ring-offset-1">{{ __('Inicio') }}</a>
           </div>
        </div>
        <div class="hidden md:block">
        <div class="relative h-screen bg-transparent mx-auto w-full scroll-mt-0" id="inicio">
            <img class="absolute h-full w-full object-cover opacity-95" src="{{ asset('assets/medica.jpg') }}"
                alt="{{ __('appoinment') }}" />
            <div class="absolute inset-0 bg-gradient-to-tl from-blue-400 via-blue-500 to-transparent opacity-20">
            </div>
            <div class="relative max-w-2xl mx-auto text-center py-16 px-4 sm:py-20 sm:px-6 opacity-90">
            </div>
        </div>
        </div>
 </article>
</section>

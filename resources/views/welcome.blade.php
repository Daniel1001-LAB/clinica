<x-guest-layout>
    <style>
        .bg-header {
            /* background: url(https://picsum.photos/1920/1920/?random) center center no-repeat; */
            background-attachment: fixed;
        }
    </style>
    {{-- Header Section - Nav --}}
    <header>
        <x-menu-user-nav />
    </header>
    {{-- Header Section Exit --}}

    <!-- Home section -->
    <section id="home" class="mb-10 mx-auto bg-header"
        style="background-repeat: no-repeat;
        background-size: cover; background-image: url('{{ asset('assets/images/top-banner-img/Top-banner.jpg') }}');">
        <div class="wrap p-10">
            <div class="container mx-auto px-4 mt-2 p-5">
                <div class="flex flex-wrap items-center justify-between">
                    <div class="md:w-1/2 md:order-2  lg:order-first order-1">
                        <h3 class="text-3xl text-white font-medium">{{ __('you manage your health') }}</h3>
                        <h1 class="text-6xl text-white font-bold capitalize">{{ __('focused on your well-being') }}
                        </h1>
                        <p class="font-bold text-xl leading-7 text-slate-200 my-6">
                            {{ __('We are a quick and easy way to manage your medical appointments and control your consultations and interviews.') }}
                        </p>
                        <div class="lg flex flex-wrap">
                            <a href="#getstarted"
                                class="shadow-lg transform hover:-translate-y-1 hover:scale-110 transition duration-500 ease-in-out bg-gray-200 hover:bg-gray-300 text-blue-500 font-bold py-2 px-4 rounded inline-flex items-center capitalize ml-3 mb-2">
                                {{ __('get started') }}
                                <i class="ms-2 fas fa-play"></i>
                            </a>
                            @auth
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <a class="shadow-lg transform hover:-translate-y-1 hover:scale-110 transition duration-500 ease-in-out bg-pink-500 hover:bg-pink-700 text-white font-bold py-2 px-4 rounded inline-flex items-center capitalize ml-3 mb-2"
                                        href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </a>
                                </form>

                                <a href="#historial"
                                    class="shadow-lg transform hover:-translate-y-1 hover:scale-110 transition duration-500 ease-in-out bg-pink-500 hover:bg-pink-700 text-white font-bold py-2 px-4 rounded inline-flex items-center capitalize ml-3 mb-2">
                                    {{ __('medical history') }}
                                    <i class="ms-2 fas fa-address-card"></i>
                                </a>
                            @else
                                <a href="{{ route('login') }}"
                                    class="shadow-lg transform hover:-translate-y-1 hover:scale-110 transition duration-500 ease-in-out bg-pink-500 hover:bg-pink-700 text-white font-bold py-2 px-4 rounded inline-flex items-center capitalize ml-3 mb-2">
                                    {{ __('login') }}
                                    <i class="ms-2 fas fa-right-to-bracket"></i>
                                </a>

                                <a href="{{ route('register') }}"
                                    class="shadow-lg transform hover:-translate-y-1 hover:scale-110 transition duration-500 ease-in-out bg-pink-500 hover:bg-pink-700 text-white font-bold py-2 px-4 rounded inline-flex items-center capitalize ml-3 mb-2">
                                    {{ __('register') }}
                                    <i class="ms-2 fas fa-address-card"></i>
                                </a>


                            @endauth
                        </div>
                    </div>
                    <div class="md:w-1/2 md:order-1 order-2 mb-md-0 mb-5">
                        <div class="top-right-sec">
                            <div class="animate-img">
                                {{-- <img decoding="async" class="aimg1" src="{{asset('assets/images/top-banner-img/woman-brush.png')}}">
                        <img decoding="async" class="aimg2" src="{{asset('assets/images/top-banner-img/doctor.png')}}"> --}}
                                <img decoding="async"
                                    class="w-full h-auto transform hover:-translate-y-1 hover:scale-110 transition duration-500 ease-in-out img-fluid ms-xl-5"
                                    src="{{ asset('assets/images/top-banner-img/top-right-img-1.png') }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="relative">
            <div class="absolute inset-x-0 bottom-0">
                <svg viewBox="0 0 224 12" fill="currentColor" class="w-full -mb-1 text-white"
                    preserveAspectRatio="none">
                    <path
                        d="M0,0 C48.8902582,6.27314026 86.2235915,9.40971039 112,9.40971039 C137.776408,9.40971039 175.109742,6.27314026 224,0 L224,12.0441132 L0,12.0441132 L0,0 Z">
                    </path>
                </svg>
            </div>
            <div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-10">
                <div class="relative max-w-2xl sm:mx-auto sm:max-w-xl md:max-w-2xl sm:text-center">
                    <h2 class="mb-6 font-sans text-3xl font-bold tracking-tight text-white sm:text-4xl sm:leading-none">
                        Control e Historial <br class="hidden md:block" />

                        <span class="relative inline-block px-2">
                            <div class="absolute inset-0 transform -skew-x-12 "></div>
                            <span class="relative text-pink-500">Médico</span>
                        </span>
                    </h2>
                    <p class="mb-6 text-base text-indigo-100 md:text-lg">
                        Los historiales médicos no solo sirven para mejorar la calidad de la atención al paciente,
                        además son instrumentos de control para los profesionales médico y para usted
                    </p>

                    <p class="max-w-md mb-10 text-xs tracking-wide text-indigo-100 sm:text-sm sm:mx-auto md:mb-16">
                        Con nuestro servicio en linea usted controlará su historial médico.
                    </p>
                    <a href="#getstarted" aria-label="Scroll down"
                        class="flex items-center justify-center w-10 h-10 mx-auto text-white duration-300 transform border border-gray-400 rounded-full hover:text-teal-accent-400 hover:border-teal-accent-400 hover:shadow hover:scale-110">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12"
                            fill="currentColor">
                            <path
                                d="M10.293,3.293,6,7.586,1.707,3.293A1,1,0,0,0,.293,4.707l5,5a1,1,0,0,0,1.414,0l5-5a1,1,0,1,0-1.414-1.414Z">
                            </path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

    </section>
    <!-- Home section exit -->

    <!-- Get Started section -->
    <section id="getstarted" class="bg-white py-10 mb-10 mx-auto ">
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
                            class="shadow-lg m-3 transform hover:-translate-y-1 hover:scale-110 transition duration-500 ease-in-out bg-pink-500 hover:bg-pink-700 text-white font-bold py-2 px-4 rounded inline-flex items-center capitalize ml-3 mb-2">{{ __('doctor') }}
                            <i class="ms-3 fa-solid fa-user-doctor fa-beat"></i>
                        </a>
                        <a href="#specialties"
                            class="shadow-lg m-3 transform hover:-translate-y-1 hover:scale-110 transition duration-500 ease-in-out bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-flex items-center capitalize ml-3 mb-2">{{ __('specialties') }}
                            <i class="ms-3 fa-solid fa-bookmark fa-beat"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Get Started section exit -->

    <section>
        <div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
            <div class="max-w-xl mb-10 md:mx-auto sm:text-center lg:max-w-2xl md:mb-12">
                <div>
                    <p
                        class="inline-block px-3 py-px mb-4 text-xs font-semibold tracking-wider text-white uppercase rounded-full bg-blue-400">
                        UAPS - SAN LUIS PLANES
                    </p>
                </div>
                <h2
                    class="max-w-lg mb-6 font-sans text-3xl font-bold leading-none tracking-tight text-gray-900 sm:text-4xl md:mx-auto">
                    <span class="relative inline-block">
                        <svg viewBox="0 0 52 24" fill="currentColor"
                            class="absolute top-0 left-0 z-0 hidden w-32 -mt-8 -ml-20 text-blue-gray-100 lg:w-32 lg:-ml-28 lg:-mt-10 sm:block">
                            <defs>
                                <pattern id="84d09fa9-a544-44bd-88b2-08fdf4cddd38" x="0" y="0"
                                    width=".135" height=".30">
                                    <circle cx="1" cy="1" r=".7"></circle>
                                </pattern>
                            </defs>
                            <rect fill="url(#84d09fa9-a544-44bd-88b2-08fdf4cddd38)" width="52" height="24">
                            </rect>
                        </svg>
                        <span class="relative">Conoce al medico</span>
                    </span>
                    o la especialidad?
                </h2>
            </div>
            <div class="grid gap-8 row-gap-5 md:row-gap-8 lg:grid-cols-3">
                <div
                    class="p-5 duration-300 transform bg-white border-2 border-dashed rounded shadow-sm border-blue-100 hover:-translate-y-2">
                    <div class="flex items-center mb-2">
                        <p
                            class="flex items-center justify-center w-10 h-10 mr-2 text-lg font-bold text-white rounded-full bg-blue-400">
                            1
                        </p>
                        <p class="text-lg font-bold leading-5">Doctores</p>
                    </div>
                    <p class="text-sm text-gray-900">
                        Si conoces al doctor puedes buscarlo <a class="underline text-blue-700"
                            href="#doctors">aqui</a> y agendar tu cita en la fecha y hora de tu conveniencia.
                    </p>
                </div>
                <div
                    class="p-5 duration-300 transform bg-white border-2 border-dashed rounded shadow-sm border-blue-200 hover:-translate-y-2">
                    <div class="flex items-center mb-2">
                        <p
                            class="flex items-center justify-center w-10 h-10 mr-2 text-lg font-bold text-white rounded-full bg-blue-400">
                            2
                        </p>
                        <p class="text-lg font-bold leading-5">Especialidades</p>
                    </div>
                    <p class="text-sm text-gray-900">
                    <p class="text-sm text-gray-900">
                        Si conoces la especialidad puedes buscarla y agendar tu cita con el doctor de tu preferencia en
                        la fecha y
                        hora de tu conveniencia.
                        <a href="#specialties" aria-label="Scroll down"
                            class="flex items-center justify-center w-10 h-10 mx-auto text-blue-700 duration-300 transform border border-gray-400 rounded-full hover:text-teal-accent-400 hover:border-teal-accent-400 hover:shadow hover:scale-110">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                viewBox="0 0 12 12" fill="currentColor">
                                <path
                                    d="M10.293,3.293,6,7.586,1.707,3.293A1,1,0,0,0,.293,4.707l5,5a1,1,0,0,0,1.414,0l5-5a1,1,0,1,0-1.414-1.414Z">
                                </path>
                            </svg>
                        </a>
                    </p>
                    </p>
                </div>
                <div
                    class="relative p-5 duration-300 transform bg-white border-2 rounded shadow-sm border-blue-700 hover:-translate-y-2">
                    <div class="flex items-center mb-2">
                        <p
                            class="flex items-center justify-center w-10 h-10 mr-2 text-lg font-bold text-white rounded-full bg-blue-400">
                            3
                        </p>
                        <p class="text-lg font-bold leading-5">Haz tu cita!</p>
                    </div>
                    <p class="text-sm text-gray-900">
                        Una vez definida la especialidad o doctor de tu preferencia, la cita estara lista, solo tendras
                        que esperar la confirmacion del doctor por correo electronico o por tu telefono de contacto.
                    </p>
                    <p
                        class="absolute top-0 right-0 flex items-center justify-center w-8 h-8 -mt-4 -mr-4 font-bold rounded-full bg-blue-400 sm:-mt-5 sm:-mr-5 sm:w-10 sm:h-10">
                        <svg class="text-white w-7" stroke="currentColor" viewBox="0 0 24 24">
                            <polyline fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                stroke-miterlimit="10" points="6,12 10,16 18,8"></polyline>
                        </svg>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Specialties section -->
    <section id="specialties">
        <div class="container mx-auto ">
            @livewire('patient.patient-specialty')
        </div>
    </section>
    <!-- Specialties section exit -->

    <!-- Appoinment section -->
    <section id="appointment" class="py-10 mb-10">
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
                <img src="{{asset('assets/citasImg.jpg')}}"
                    class="object-cover object-top w-full h-64 max-w-xl  mb-16 rounded-xl shadow-2xl lg:ml-64 xl:ml-8 lg:-mb-24 xl:-mb-28 lg:h-auto lg:max-w-screen-md"
                    alt="" />
            </div>
        </div>
    </section>
    <!-- Appoinment section exit -->

    <!-- Doctors section -->
    <section id="doctors">
        <div class="container mx-auto ">
            @livewire('patient.patient-doctor')
        </div>
    </section>
    <!-- Doctors section exit -->

    <!-- Patients section -->
    @auth
        <section id="historial" class=" mb-4">
            <div class="container mx-auto ">
                @livewire('patient.patient-info')
            </div>
        </section>
    @endauth

    <!-- Patients section exit -->
    {{-- Modals Sections --}}
    <section>
        @livewire('patient.patient-date')
    </section>
    {{-- Modals Sections exit --}}


    {{-- <div id="chat-container">
        <div id="chat-messages"></div>
        <div id="chat-input-container">
            @csrf
            <input type="text" id="chat-input" placeholder="Type your message here">
            <button id="send-button">Send</button>
        </div>
    </div> --}}

    <button x-cloak x-data="{ scroll: false }"
        x-on:scroll.window="document.documentElement.scrollTop > 200 ? scroll = true : scroll = false" x-show="scroll"
        x-on:click="window.scrollTo({top: 0, behavior: 'smooth'})" x-transition.opacity.duration.300ms
        class="fixed inline-block w-16 h-16 p-1 text-xs font-medium leading-tight transition duration-150 ease-in-out hover:opacity-70 bottom-4 right-4"
        id="btn-back-to-top" type="button">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
            class="w-16 h-16 fill-white stroke-blue-800 stroke-[1.5px]" stroke-linecap="round"
            stroke-linejoin="round">
            <circle cx="12" cy="12" r="10" style="fill-opacity:0.6;"></circle>
            <polyline points="16 12 12 8 8 12"></polyline>
            <line x1="12" y1="16" x2="12" y2="8"></line>
        </svg>
    </button>


    <footer class="bg-white dark:bg-gray-900">
        <div id="contact" class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
            <div class="md:flex md:justify-between">
                <div class="mb-6 md:mb-0">
                    <a href="#home" class="flex items-center">
                        <img src="{{ asset('assets/onlyLogov1.svg') }}" class="h-8 mr-3" alt="FlowBite Logo" />
                        <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">San Luis
                            Planes</span>
                    </a>
                </div>
                <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
                    <div>
                        <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">
                            {{ __('For patients') }}</h2>
                        <ul class="text-gray-600 dark:text-gray-400 font-medium">
                            <li class="mb-4">
                                <a href="#" class="hover:underline">{{ __('Career advise') }}</a>
                            </li>
                            <li class="mb-4">
                                <a href="#" class="hover:underline">{{ __('Professional interviews') }}</a>
                            </li>
                            <li class="mb-4">
                                <a href="#" class="hover:underline">{{ __('Control interviews') }}</a>
                            </li>
                            <li class="mb-4">
                                <a href="#" class="hover:underline">{{ __('Medical record') }}</a>
                            </li>
                            <li class="mb-4">
                                <a href="#" class="hover:underline">{{ __('Unlimited access') }}</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">
                            {{ __('For Doctors') }}</h2>
                        <ul class="text-gray-600 dark:text-gray-400 font-medium">
                            <li class="mb-4">
                                <a href="{{ route('login') }}" class="hover:underline ">{{ __('Get started') }}</a>
                            </li>
                            <li class="mb-4">
                                <a href="#" class="hover:underline">{{ __('Our services') }}</a>
                            </li>
                            <li class="mb-4">
                                <a href="#" class="hover:underline">{{ __('About us') }}</a>
                            </li>
                            <li class="mb-4">
                                <a href="#" class="hover:underline">{{ __('Contact us') }}</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Legal</h2>
                        <ul class="text-gray-600 dark:text-gray-400 font-medium">
                            <li class="mb-4">
                                <a href="{{ route('policy.show') }}" class="hover:underline">Privacy Policy</a>
                            </li>
                            <li>
                                <a href="{{ route('terms.show') }}" class="hover:underline">Terms &amp;
                                    Conditions</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
            <div class="sm:flex sm:items-center sm:justify-between">
                <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023 <a
                        href="https://www.facebook.com/edwindaniel.merinopaz" class="hover:underline">EMERINO™</a>.
                    All Rights Reserved.
                </span>
                <div class="flex mt-4 space-x-6 sm:justify-center sm:mt-0">
                    <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="sr-only">Facebook page</span>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="sr-only">Instagram page</span>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path
                                d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                        </svg>
                        <span class="sr-only">Twitter page</span>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="sr-only">GitHub account</span>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c5.51 0 10-4.48 10-10S17.51 2 12 2zm6.605 4.61a8.502 8.502 0 011.93 5.314c-.281-.054-3.101-.629-5.943-.271-.065-.141-.12-.293-.184-.445a25.416 25.416 0 00-.564-1.236c3.145-1.28 4.577-3.124 4.761-3.362zM12 3.475c2.17 0 4.154.813 5.662 2.148-.152.216-1.443 1.941-4.48 3.08-1.399-2.57-2.95-4.675-3.189-5A8.687 8.687 0 0112 3.475zm-3.633.803a53.896 53.896 0 013.167 4.935c-3.992 1.063-7.517 1.04-7.896 1.04a8.581 8.581 0 014.729-5.975zM3.453 12.01v-.26c.37.01 4.512.065 8.775-1.215.25.477.477.965.694 1.453-.109.033-.228.065-.336.098-4.404 1.42-6.747 5.303-6.942 5.629a8.522 8.522 0 01-2.19-5.705zM12 20.547a8.482 8.482 0 01-5.239-1.8c.152-.315 1.888-3.656 6.703-5.337.022-.01.033-.01.054-.022a35.318 35.318 0 011.823 6.475 8.4 8.4 0 01-3.341.684zm4.761-1.465c-.086-.52-.542-3.015-1.659-6.084 2.679-.423 5.022.271 5.314.369a8.468 8.468 0 01-3.655 5.715z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="sr-only">Dribbble account</span>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    @push('script')
        <script>
            window.addEventListener('load', event => {
                interval = localStorage.getItem('interval')
                doctor_id = localStorage.getItem('doctor_id')
                specialty_id = localStorage.getItem('specialty_id')
                day = localStorage.getItem('day')
                date = localStorage.getItem('date')
                office_id = localStorage.getItem('office_id')
                price = localStorage.getItem('price')

                if (interval !== null) {
                    Swal.fire({
                        title: '@lang('messages.create_appointment_title')',
                        text: '@lang('messages.create_appointment_text')',
                        icon: 'info',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: '@lang('messages.yes_create_appointment')'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Swal.fire(
                                '@lang('messages.appointment_created_title')',
                                '@lang('messages.appointment_created_text')',
                                'success'
                            )
                            livewire.emitTo('patient.patient-date', 'addAppointment', interval, doctor_id,
                                specialty_id, day, date, office_id, price)

                        } else {
                            localStorage.removeItem('interval')
                            localStorage.removeItem('doctor_id')
                            localStorage.removeItem('specialty_id')
                            localStorage.removeItem('day')
                            localStorage.removeItem('date')
                            localStorage.removeItem('office_id')
                            localStorage.removeItem('price')
                        }
                    })
                }
            })
        </script>

        {{--
        <script>
            const chatMessages = document.getElementById('chat-messages');
            const chatInput = document.getElementById('chat-input');
            const sendButton = document.getElementById('send-button');
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            sendButton.addEventListener('click', sendMessage);

            function sendMessage() {
                const question = chatInput.value.trim();

                if (question === '') {
                    return;
                }

                addMessageToChat(question, 'user');
                chatInput.value = '';

                // Send the question to the server using AJAX (or any other method you prefer)
                const xhr = new XMLHttpRequest();
                xhr.open('POST', '/chat-openai', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        const response = JSON.parse(xhr.responseText);
                        const answer = response.response;
                        addMessageToChat(answer, 'bot');
                    }
                };
                xhr.send('question=' + encodeURIComponent(question));
            }

            function addMessageToChat(message, sender) {
                const messageElement = document.createElement('div');
                messageElement.classList.add('message', sender);
                messageElement.textContent = message;

                chatMessages.appendChild(messageElement);
                chatMessages.scrollTop = chatMessages.scrollHeight;
            }
        </script> --}}
    @endpush
</x-guest-layout>

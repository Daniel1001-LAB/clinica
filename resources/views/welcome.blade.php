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
                                    {{ __('Login') }}
                                    <i class="ms-2 fas fa-right-to-bracket"></i>
                                </a>

                                <a href="{{ route('register') }}"
                                    class="shadow-lg transform hover:-translate-y-1 hover:scale-110 transition duration-500 ease-in-out bg-pink-500 hover:bg-pink-700 text-white font-bold py-2 px-4 rounded inline-flex items-center capitalize ml-3 mb-2">
                                    {{ __('Register') }}
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
                        class="flex items-center justify-center w-10 h-10 mx-auto text-white duration-300 transform border border-gray-400 rounded-full hover:text-blue-400 hover:border-blue-400 hover:shadow hover:scale-110">
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
        @livewire('welcome.get-started-info')
    </section>
    <!-- Get Started section exit -->

    <section id="docspec">
        @livewire('welcome.doctors-specialties-info')
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
            @livewire('welcome.appoinments-info')
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

    <section id="beadoctor" class="mb-4 mt-4">
        @livewire('welcome.be-adoctor-info')
    </section>

    <section id="services">
        @livewire('welcome.services')
    </section>

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


    <footer class="bg-white dark:bg-gray-900 mt-10">
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
                                <a  class="hover:underline">{{ __('Career advise') }}</a>
                            </li>
                            <li class="mb-4">
                                <a  class="hover:underline">{{ __('Professional interviews') }}</a>
                            </li>
                            <li class="mb-4">
                                <a  class="hover:underline">{{ __('Control interviews') }}</a>
                            </li>
                            <li class="mb-4">
                                <a  class="hover:underline">{{ __('Medical record') }}</a>
                            </li>
                            <li class="mb-4">
                                <a href="#home" class="hover:underline">{{ __('Unlimited access') }}</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">
                            {{ __('For Doctors') }}</h2>
                        <ul class="text-gray-600 dark:text-gray-400 font-medium">
                            <li class="mb-4">
                                <a href="#beadoctor" class="hover:underline ">{{ __('Get started') }}</a>
                            </li>
                            <li class="mb-4">
                                <a href="#services" class="hover:underline">{{ __('Our services') }}</a>
                            </li>
                            <li class="mb-4">
                                <a href="#services" class="hover:underline">{{ __('About us') }}</a>
                            </li>
                            <li class="mb-4">
                                <a href="#contact" class="hover:underline">{{ __('Contact us') }}</a>
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
                <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023 <a target="_blank"
                        href="https://www.facebook.com/edwindaniel.merinopaz" class="hover:underline">EMERINO™</a>.
                    All Rights Reserved.
                </span>
                <div class="flex mt-4 space-x-6 sm:justify-center sm:mt-0">
                    <a target="_blank" href="https://www.facebook.com/edwindaniel.merinopaz"
                        class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="sr-only">Facebook page</span>
                    </a>
                    <a target="_blank" href="https://www.instagram.com/danieel_1001/?hl=es-la"
                        class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="sr-only">Instagram page</span>
                    </a>

                    <a target="_blank" href="https://github.com/Daniuwu504"
                        class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="sr-only">GitHub account</span>
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

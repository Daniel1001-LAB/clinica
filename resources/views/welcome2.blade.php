<x-guest-layout>
    <section id="sec1"
        style="background-image: url('{{ asset('assets/cool-background.svg') }}'); background-size: cover;  ">
        {{-- <img class="absolute inset-0 h-full object-cover" src="{{ asset('assets/cool-background.svg') }}" alt=""
            srcset=""> --}}
        <div class="relative h-screen w-full mx-auto scroll-mt-0" id="sec1">
            {{-- Fondo Typography --}}

            <div class="container pt-10">
                <div class="row">
                    <div class="col-md-12 ">
                        <h1 class="display-3 font-bold text-capitalize">{{ __('focused') }} <span
                                class="text-white">{{ __('on') }}</span> {{ __('your well-being') }}</h1>
                        <h3 class="display-4 font-bold text-capitalize">{{ __('you manage') }} <span
                                class="text-white">{{ __('your health') }}</span></h3>
                        <br>
                    </div>
                    <div class="col-md-3 mb-6">
                        <p class=" h4">
                            {{ __('We are a quick and easy way to manage your medical appointments and control your consultations and interviews.') }}
                        </p>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="d-flex gap-2 ">

                                <a href="#sec2"
                                    class="ov-btn-grow-skew rounded btn btn-primary capitalize shadow d-inline-flex align-items-center">{{ __('get started') }}
                                    <i class="ms-2 fa-solid fa-play"></i>
                                </a>
                                <a href="{{route('login')}}"
                                    class="ov-btn-slide-left rounded btn btn-primary capitalize shadow d-inline-flex align-items-center">{{ __('login') }}
                                    <i class="ms-2 fa-solid fa-right-to-bracket"></i>
                                </a>
                                <a href="{{route('register')}}"
                                    class="ov-btn-grow-skew-reverse btn btn-primary rounded capitalize shadow d-inline-flex align-items-center">{{ __('register') }}
                                    <i class="ms-2 fa-solid fa-address-card"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="sec2"
        style="background-image: url('{{ asset('assets/cool-background2.svg') }}'); background-size: cover; transform: scaleX(-1);  ">
        {{-- <img class="absolute inset-0 h-full object-cover" src="{{ asset('assets/cool-background.svg') }}" alt=""
            srcset=""> --}}
        <div class="relative h-screen w-full mx-auto scroll-mt-0" id="sec1">
            {{-- Fondo Typography --}}

            <div class="container pt-10">
                <div class="row">
                    <div class="col-md-12 ">
                        <h1 class="display-3 font-bold text-capitalize">{{ __('focused') }} <span
                                class="text-white">{{ __('on') }}</span> {{ __('your well-being') }}</h1>
                        <h3 class="display-4 font-bold text-capitalize">{{ __('you manage') }} <span
                                class="text-white">{{ __('your health') }}</span></h3>
                        <br>
                    </div>
                    <div class="col-md-3 mb-6">
                        <p class=" h4">
                            {{ __('We are a quick and easy way to manage your medical appointments and control your consultations and interviews.') }}
                        </p>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="d-flex gap-2 ">

                                <a href="{{route('register')}}"
                                    class="ov-btn-grow-skew rounded btn btn-primary capitalize shadow d-inline-flex align-items-center">{{ __('get started') }}
                                    <i class="ms-2 fa-solid fa-play"></i>
                                </a>
                                <a href="{{route('login')}}"
                                    class="ov-btn-slide-left rounded btn btn-primary capitalize shadow d-inline-flex align-items-center">{{ __('login') }}
                                    <i class="ms-2 fa-solid fa-right-to-bracket"></i>
                                </a>
                                <a href="{{route('register')}}"
                                    class="ov-btn-grow-skew-reverse btn btn-primary rounded capitalize shadow d-inline-flex align-items-center">{{ __('register') }}
                                    <i class="ms-2 fa-solid fa-address-card"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center text-lg-start text-white" style="background-color: #1c2331">
        <!-- Section: Social media -->
        <section class="d-flex justify-content-between p-4" style="background-color: #0f225d">
            <!-- Left -->
            <div class="me-5">
                <span>Get connected with us on social networks:</span>
            </div>
            <!-- Left -->

            <!-- Right -->
            <div>
                <a href="" class="text-white me-4">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="" class="text-white me-4">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="" class="text-white me-4">
                    <i class="fab fa-google"></i>
                </a>
                <a href="" class="text-white me-4">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="" class="text-white me-4">
                    <i class="fab fa-linkedin"></i>
                </a>
                <a href="" class="text-white me-4">
                    <i class="fab fa-github"></i>
                </a>
            </div>
            <!-- Right -->
        </section>
        <!-- Section: Social media -->

        <!-- Section: Links  -->
        <section class="">
            <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        {{-- <img class="w-20 mb-2" src="{{ asset('assets/onlyLogov1.svg') }}" alt=""> --}}
                        <h6 class="text-uppercase fw-bold">UAPS - San Luis Planes</h6>
                        <hr class="mb-4 mt-0 d-inline-block mx-auto"
                            style="width: 60px; background-color: #0f225d; height: 2px" />
                        <img class="img-fluid w-50 " src="{{ asset('assets/logov1.svg') }}" alt="">
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold">{{ __('for patients') }}</h6>
                        <hr class="mb-4 mt-0 d-inline-block mx-auto"
                            style="width: 60px; background-color: #0f225d; height: 2px" />
                        <p>
                            <a href="#!" class="text-white text-capitalize">{{ 'caeer advise' }}</a>
                        </p>
                        <p>
                            <a href="#!" class="text-white text-capitalize">{{ 'professional interviews' }}</a>
                        </p>
                        <p>
                            <a href="#!" class="text-white text-capitalize">{{ 'control interviews' }}</a>
                        </p>
                        <p>
                            <a href="#!" class="text-white text-capitalize">{{ 'medical record' }}</a>
                        </p>
                        <p>
                            <a href="#!" class="text-white text-capitalize">{{ 'unlimited access' }}</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold">{{ 'for doctors' }}</h6>
                        <hr class="mb-4 mt-0 d-inline-block mx-auto"
                            style="width: 60px; background-color: #0f225d; height: 2px" />
                        <p>
                            <a href="#!" class="text-white text-capitalize">{{ 'get started' }}</a>
                        </p>
                        <p>
                            <a href="#!" class="text-white text-capitalize">{{ 'our services' }}</a>
                        </p>
                        <p>
                            <a href="#!" class="text-white text-capitalize">{{ 'about us' }}</a>
                        </p>
                        <p>
                            <a href="#!" class="text-white text-capitalize">{{ 'contact us' }}</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold">{{ __('contact us') }} </h6>
                        <hr class="mb-4 mt-0 d-inline-block mx-auto"
                            style="width: 60px; background-color: #0f225d; height: 2px" />
                        <p><i class="fas fa-home mr-3"></i> New York, NY 10012, US</p>
                        <p><i class="fas fa-envelope mr-3"></i> info@example.com</p>
                        <p><i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>
                        <p><i class="fas fa-print mr-3"></i> + 01 234 567 89</p>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
            © 2020 Copyright:
            <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->

    <style>


        /*** ESTILOS BOTÓN GROW SKEW REVERSE ***/
        .ov-btn-grow-skew-reverse {
            background: #fff;
            /* color de fondo */
            color: #0f225d;
            /* color de fuente */
            border: 2px solid #0f225d;
            /* tamaño y color de borde */
            padding: 10px;
            border-radius: 3px;
            /* redondear bordes */
            position: relative;
            z-index: 1;
            overflow: hidden;
            display: inline-block;
        }

        .ov-btn-grow-skew-reverse:hover {
            color: #fff;
            /* color de fuente hover */
        }

        .ov-btn-grow-skew-reverse::after {
            content: "";
            background: #0f225d;
            /* color de fondo hover */
            position: absolute;
            z-index: -1;
            padding: 10px;
            display: block;
            left: -20%;
            right: -20%;
            top: 0;
            bottom: 0;
            transform: skewX(45deg) scale(0, 1);
            transition: all 0.3s ease;
        }

        .ov-btn-grow-skew-reverse:hover::after {
            transition: all 0.3s ease-out;
            transform: skewX(45deg) scale(1, 1);
        }

        /*** ESTILOS BOTÓN GROW SKEW ***/
        .ov-btn-grow-skew {
            background: #fff;
            /* color de fondo */
            color: #0f225d;
            /* color de fuente */
            border: 2px solid #0f225d;
            /* tamaño y color de borde */
            padding: 10px;
            border-radius: 3px;
            /* redondear bordes */
            position: relative;
            z-index: 1;
            overflow: hidden;
            display: inline-block;
        }

        .ov-btn-grow-skew:hover {
            color: #fff;
            /* color de fuente hover */
        }

        .ov-btn-grow-skew::after {
            content: "";
            background: #0f225d;
            /* color de fondo hover */
            position: absolute;
            z-index: -1;
            padding: 10px;
            display: block;
            left: -20%;
            right: -20%;
            top: 0;
            bottom: 0;
            transform: skewX(-45deg) scale(0, 1);
            transition: all 0.3s ease;
        }

        .ov-btn-grow-skew:hover::after {
            transition: all 0.3s ease-out;
            transform: skewX(-45deg) scale(1, 1);
        }


        /*** ESTILOS BOTÓN SLIDE LEFT ***/
        .ov-btn-slide-left {
            background: #fff;
            /* color de fondo */
            color: #0f225d;
            /* color de fuente */
            border: 2px solid #0f225d;
            /* tamaño y color de borde */
            padding: 10px;
            border-radius: 3px;
            /* redondear bordes */
            position: relative;
            z-index: 1;
            overflow: hidden;
            display: inline-block;
        }

        .ov-btn-slide-left:hover {
            color: #fff;
            /* color de fuente hover */
        }

        .ov-btn-slide-left::after {
            content: "";
            background: #0f225d;
            /* color de fondo hover */
            position: absolute;
            z-index: -1;
            padding: 10px;
            display: block;
            top: 0;
            bottom: 0;
            left: -100%;
            right: 100%;
            -webkit-transition: all 0.35s;
            transition: all 0.35s;
        }

        .ov-btn-slide-left:hover::after {
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            -webkit-transition: all 0.35s;
            transition: all 0.35s;
        }
    </style>
</x-guest-layout>

<x-guest-layout>
    <!-- Banner section -->
    <section id="home" class="home">
        <div class="banner_wrapper wrapper">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6 order-md-1 order-2">
                        <h3>{{ __('you manage your health') }}</h3>
                        <h1 class="text-capitalize">{{ __('focused on your well-being') }}</h1>
                        <p> {{ __('We are a quick and easy way to manage your medical appointments and control your consultations and interviews.') }}
                        </p>
                        <a href="{{ route('login') }}" class="main-btn mt-4 fill-btn text-capitalize">{{ __('login') }}
                            <i class="ms-2 fa-solid fa-right-to-bracket"></i>
                        </a>
                        <a href="#getstarted" class="main-btn mt-4 ms-3 text-capitalize">{{ __('get started') }}
                            <i class="ms-2 fa-solid fa-play"></i>
                        </a>
                        <a href="{{ route('register') }}"
                            class="main-btn fill-btn mt-4 ms-3 text-capitalize">{{ __('register') }}
                            <i class="ms-2 fa-solid fa-address-card"></i>
                        </a>
                    </div>
                    <div class="col-md-6 order-md-2 order-1 mb-md-0 mb-5">
                        <div class="top-right-sec">
                            <div class="animate-img">
                                {{-- <img decoding="async" class="aimg1" src="{{asset('assets/images/top-banner-img/woman-brush.png')}}">
                            <img decoding="async" class="aimg2" src="{{asset('assets/images/top-banner-img/doctor.png')}}"> --}}
                                <img decoding="async" class="aimg2 img-fluid ms-xl-5"
                                    src="{{ asset('assets/images/top-banner-img/top-right-img-1.png') }}">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="wrapper pb-0">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6 mb-4">
                        <div class="card text-center">
                            <div class="icon-box">
                                <img decoding="async"
                                    src="{{ asset('assets/images/top-banner-img/Appointment-icon.png') }}">
                            </div>
                            <div>
                            <h4>{{__('Easy Appointment')}}</h4>
                                <p>{{__('Easy appointments for anyone at our UAPS San Luis Planes clinic')}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 mb-4">
                        <div class="card text-center">
                            <div class="icon-box">
                                <img decoding="async"
                                    src="{{ asset('assets/images/top-banner-img/Emergency-icon.png') }}">
                            </div>
                            <div>
                                <h4>{{__('Emergency Service')}}</h4>
                                <p>Lorem Ipsum is simply is very dummy text of the printings and type setting</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 mb-4">
                        <div class="card text-center">
                            <div class="icon-box">
                                <img decoding="async"
                                    src="{{ asset('assets/images/top-banner-img/7-Service-icon.png') }}">
                            </div>
                            <div>
                                <h4>24/7 Service</h4>
                                <p>Lorem Ipsum is simply is very dummy text of the printings and type setting</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner section exit -->

    <!-- Get Started section -->
    <section id="getstarted" class="about_wrapper wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-mb-0 mb-5">
                    <div class="position-relative">
                        <img decoding="async" src="{{ asset('assets/special.jpg') }}" class="img-fluid about-animate">
                        {{-- <img decoding="async"  src="{{asset('assets/images/top-banner-img/woman-brush.png')}}" class="about-animate"> --}}
                    </div>
                </div>
                <div class="col-md-6 text-center text-md-start">
                    <h2 class="text-capitalize">{{ __('first step') }}:</h2>
                    <h4 class="text-capitalize">{{ __('select a medical specialty or a doctor.') }}</h4>
                    <p>{{ __('You can choose from several doctors if you search
                                                            for them according to their specialty.
                                                            If you already have a doctor you trust, then request your appointment') }}
                    </p>
                    <a href="#doctors_section"
                        class="main-btn shadow  fill-btn2 mt-4 ms-3 text-capitalize">{{ __('doctor') }}
                        <i class="ms-3 fa-solid fa-user-doctor fa-beat"></i>
                    </a><a href="#specialties"
                        class="main-btn shadow fill-btn2 mt-4 ms-3 text-capitalize">{{ __('specialties') }}
                        <i class="ms-3 fa-solid fa-bookmark fa-beat"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>


    <!-- About section exit -->

    <!-- Services section -->
    <section id="services" class="services_wrapper wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center mb-5">
                    <h3>Our Services</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="card">
                        <div class="icon-box">
                            <img decoding="async" src="{{ asset('assets/images/services/1.svg') }}">
                        </div>
                        <div>
                            <h4>Complete Dentistry</h4>
                            <p>Lorem Ipsum is simply is very dummy text of the printings and type setting Lorem Ipsum is
                                simply is very dummy text</p>
                            <a href="#" class="main-btn mt-4">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="card">
                        <div class="icon-box">
                            <img decoding="async" src="{{ asset('assets/images/services/2.svg') }}">
                        </div>
                        <div>
                            <h4>Dental Selants</h4>
                            <p>Lorem Ipsum is simply is very dummy text of the printings and type setting Lorem Ipsum is
                                simply is very dummy text</p>
                            <a href="#" class="main-btn mt-4">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="card">
                        <div class="icon-box">
                            <img decoding="async" src="{{ asset('assets/images/services/3.svg') }}">
                        </div>
                        <div>
                            <h4>Dental Dictionary</h4>
                            <p>Lorem Ipsum is simply is very dummy text of the printings and type setting Lorem Ipsum is
                                simply is very dummy text</p>
                            <a href="#" class="main-btn mt-4">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="card">
                        <div class="icon-box">
                            <img decoding="async" src="{{ asset('assets/images/services/4.svg') }}">
                        </div>
                        <div>
                            <h4>Dental Implants</h4>
                            <p>Lorem Ipsum is simply is very dummy text of the printings and type setting Lorem Ipsum is
                                simply is very dummy text</p>
                            <a href="#" class="main-btn mt-4">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="card">
                        <div class="icon-box">
                            <img decoding="async" src="{{ asset('assets/images/services/5.svg') }}">
                        </div>
                        <div>
                            <h4>Oral Surgery</h4>
                            <p>Lorem Ipsum is simply is very dummy text of the printings and type setting Lorem Ipsum is
                                simply is very dummy text</p>
                            <a href="#" class="main-btn mt-4">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="card">
                        <div class="icon-box">
                            <img decoding="async" src="{{ asset('assets/images/services/6.svg') }}">
                        </div>
                        <div>
                            <h4>General Dentistry</h4>
                            <p>Lorem Ipsum is simply is very dummy text of the printings and type setting Lorem Ipsum is
                                simply is very dummy text</p>
                            <a href="#" class="main-btn mt-4">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services section Exit -->
    <!-- specialties section -->
    <section id="specialties" class="specialties_wrapper wrapper">
        <div class="container" style="background-image: url('../assets/cool-background.svg') background-repeat: no-repeat;
        background-position: center center;
        background-size: cover;">
            @livewire('patient.patient-specialty')
        </div>
    </section>

    <!-- specialties Section Exit  -->

    <!-- Doctors section -->
    <section id="doctors" class="gallery_wrapper wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center mb-5">
                    <h3 class="text-capitalize">{{__('our doctors')}}</h3>
                </div>
            </div>
            <div class="row">
                @livewire('patient.patient-doctor')
            </div>
        </div>
    </section>


        @livewire('patient.patient-date')


    <!-- Doctors Section Exit -->

    <!-- Testimonial section -->
    {{-- <section id="testimonial" class="testimonial_wrapper wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center mb-4">
                    <h3 class="text-black">Testimonials</h3>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-xl-3 col-md-4 col-sm-6">
                    <div class="card text-center">
                        <img decoding="async" src="{{ asset('assets/images/testimonial/client1.png') }}"
                            class="img-fluid">
                        <h4 class="pt-4 mb-0">Aliceano Colby</h4>
                        <p>CEO of Prime IT</p>
                    </div>
                </div>
                <div class="col-xl-9 col-md-8 col-sm-6 ps-md-4 pt-sm-0 pt-4">
                    <h4>Awesome Work</h4>
                    <p>“They really took my individual case to heart. Their team is very helpful. They all work
                        together in an impressive way to make sure that my needs were met and I walked out pain
                        free.”</p>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- Testimonial Section Exit -->

    <!--Appointment section -->
    <section class="appointment_wrapper wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-8 col-10">
                    <h3 class="text-black">Request your appointment and start your smile makeover!</h3>
                    <a href="#" class="mt-5 main-btn btn btn-outline-danger fill-btn">Request Appointment</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Appointment section Exit -->

    {{-- <!-- Blog section -->
    <section id="blog" class="blog_wrapper wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center mb-5">
                    <h3 class="text-black">Latest Blog</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="card p-0 border-0 rounded-0">
                        <img decoding="async" src="{{ asset('assets/images/blog') }}/1.jpg">
                        <div class="blog-content">
                            <h5 class="text-white mb-4">Dental Insurance with Benefits</h5>
                            <h6 class="text-white">By Admin - February 18, 2018</h6>
                            <p class="mt-2 text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Itaque,
                                nostrum.
                            </p>
                            <a href="#" class="main-btn mt-2">Read More</a>

                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="card p-0 border-0 rounded-0">
                        <img decoding="async" src="{{ asset('assets/images/blog') }}/2.jpg">
                        <div class="blog-content">
                            <h5 class="text-white mb-4">Dental Insurance with Benefits</h5>
                            <h6 class="text-white">By Admin - February 18, 2018</h6>
                            <p class="mt-2 text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Itaque,
                                nostrum.
                            </p>
                            <a href="#" class="main-btn mt-2">Read More</a>

                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="card p-0 border-0 rounded-0">
                        <img decoding="async" src="{{ asset('assets/images/blog') }}/3.jpg">
                        <div class="blog-content">
                            <h5 class="text-white mb-4">Dental Insurance with Benefits</h5>
                            <h6 class="text-white">By Admin - February 18, 2018</h6>
                            <p class="mt-2 text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Itaque,
                                nostrum.
                            </p>
                            <a href="#" class="main-btn mt-2">Read More</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- Blog Section Exit  -->

    <!-- Footer section -->
    <footer>
        <section id="contact" class="footer_wrapper wrapper">
            <div class="container pb-3">
                <div class="row">
                    <div class="col-lg-3 col-md-6 mb-4">
                        <h5 class="text-left">UAPS - San Luis Planes</h5>
                        <p class="ps-0">
                            {{ __('We are a quick and easy way to manage your medical appointments and control your consultations and interviews.') }}
                        </p>
                        <div class="contact-info">
                            <ul class="list-unstyled p-0">
                                <li><a href="#"><i class="fa fa-home me-3"></i> No. 96, South City, London</a></li>
                                <li><a href="#"><i class="fa fa-phone me-3"></i>+1 222 3333</a></li>
                                <li><a href="#"><i class="fa fa-envelope me-3"></i>info@example.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <h5 class="text-capitalize">{{ __('for patients') }}</h5>
                        <ul class="link-widget p-0">
                            <li><a class="text-capitalize" href="#">{{ 'caeer advise' }}</a></li>
                            <li><a class="text-capitalize" href="#">{{ 'professional interviews' }}</a></li>
                            <li><a class="text-capitalize" href="#">{{ 'control interviews' }}</a></li>
                            <li><a class="text-capitalize" href="#">{{ 'medical record' }}</a></li>
                            <li><a class="text-capitalize" href="#">{{ 'unlimited access' }}</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <h5 class="text-capitalize">{{ __('for doctors') }}</h5>
                        <ul class="link-widget p-0">
                            <li><a class="text-capitalize" href="#">{{ 'get started' }}</a></li>
                            <li><a class="text-capitalize" href="#">{{ 'our services' }}</a></li>
                            <li><a class="text-capitalize" href="#">{{ 'about us' }}</a></li>
                            <li><a class="text-capitalize" href="#">{{ 'contact us' }}</a></li>

                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 mb-4 align-content-center">
                        {{-- <h5>Newsletter</h5>
                    <div class="form-group mb-4">
                        <input type="email" class="form-control bg-transparent" placeholder="Enter Your Email Here">
                        <button type="submit" class="main-btn rounded-2 mt-3 border-white text-white">Subscribe</button>
                    </div> --}}
                        <h5>Stay Connected</h5>
                        <ul class="social-network d-flex align-items-center p-0 ">
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                            <li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>
                        </ul>
                    </div>



                </div>
            </div>
            <div class="container-fluid copyright-section">
                <p class="p-0">Copyright <a href="#">© EMERINO</a> All Rights Reserved</p>
            </div>
        </section>
    </footer>

    <!-- Footer section exit -->
</x-guest-layout>

<x-guest-layout>
    <!-- component -->
    <style>
        /* @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap'); */

        html,
        body {
            font-family: 'Roboto', sans-serif;
        }

        .break-inside {
            -moz-column-break-inside: avoid;
            break-inside: avoid;
        }

        body {
            display: flex;
            justify-content: space-between;
            flex-direction: column;
            min-height: 100vh;
            line-height: 1.5;
        }
    </style>

    <body class="bg-white">

        <!-- Example -->
        <div class="flex min-h-screen">

            <!-- Container -->
            <div class="flex flex-row w-full">

                <!-- Sidebar -->
                <div
                    class='hidden lg:flex flex-col justify-between bg-gradient-to-tr from-blue-800 to-purple-700 lg:p-8 xl:p-12 lg:max-w-sm xl:max-w-lg'>
                    <div class="flex items-center justify-start space-x-3">
                        <img src="{{ asset('assets/onlyLogov1.svg') }}" class="rounded-sm shadow-xl img-fluid w-8 h-8"
                            alt="" srcset="">
                        <a href="{{ route('welcome') }} " class="font-medium text-xl text-white">UAPS - SAN LUIS</a>
                    </div>
                    <div class='space-y-5'>
                        <h1 class="lg:text-3xl xl:text-4xl xl:leading-snug font-extrabold text-white">
                            {{ __('Welcome Back to UAPS - San Luis Planes') }}</h1>
                        <p class="text-lg text-white">{{ __('You do not have an account?') }}</p>
                        <x-button icon="pencil" href="{{ route('register') }}" primary
                            label="{{ __('Create Account Here') }}" />
                    </div>
                    <p class="font-medium text-white">© 2023 EMERINO - UAPS SAN LUIS</p>
                </div>

                <!-- Login -->
                <div class="flex flex-1 flex-col items-center justify-center px-10 relative">
                    <div class="flex lg:hidden justify-between items-center w-full py-4">
                        <div class="flex items-center justify-start space-x-3">
                            <span class="bg-black rounded-full w-2 h-2"></span>
                            <a href="{{ route('welcome') }}" class="font-medium text-lg">UAPS</a>
                        </div>
                        <div class="flex items-center space-x-2">
                            <span>{{ __('Not registered?') }} </span>
                            <a href="{{ route('register') }}" class="underline font-medium text-[#070eff]">
                                {{ __('Sign up now') }}
                            </a>
                        </div>
                    </div>
                    <!-- Login box -->
                    <div class="flex flex-1 flex-col  justify-center space-y-5 max-w-md">
                        @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="flex flex-col space-y-2 text-center">
                            <h2 class="text-3xl md:text-4xl font-bold">{{ __('Sign in to account') }}</h2>
                            {{-- <p class="text-md md:text-xl">{{ __('Welcome Back') }}</p> --}}
                        </div>
                        <div class="flex flex-col max-w-md space-y-5">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <x-input id="email" label="{{ __('Email') }}" class="block mb-3 w-full"
                                    type="email" name="email" :value="old('email')" required autofocus
                                    autocomplete="username" />

                                <x-input id="password" label="{{ __('Password') }}" class="block  w-full"
                                    type="password" name="password" required autocomplete="current-password" />
                                <div class="flex justify-end">
                                    <label for="remember_me" class="flex items-center p-4">
                                        <x-checkbox id="remember_me" name="remember" />
                                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                    </label>
                                </div>
                                <x-validation-errors class="mb-4" />
                                <x-button lg indigo class=" font-bold py-2 px-4 w-full rounded hover:bg-gray-600"
                                    type="submit" spinner>
                                    {{ __('Log in') }}
                                </x-button>
                                <div class="flex justify-center items-center">
                                    <span class="w-full border border-black"></span>
                                    <span class="px-4">{{ __('Or') }}</span>
                                    <span class="w-full border border-black"></span>
                                </div>
                            </form>
                            <x-button href="/login-google" flat
                                class="flex items-center justify-center flex-none px-3 py-2 md:px-4 md:py-3 border-2 rounded-lg font-medium border-black relative">
                                <span class="absolute left-4">
                                    <svg width="24px" height="24px" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <path fill="#EA4335 "
                                            d="M5.26620003,9.76452941 C6.19878754,6.93863203 8.85444915,4.90909091 12,4.90909091 C13.6909091,4.90909091 15.2181818,5.50909091 16.4181818,6.49090909 L19.9090909,3 C17.7818182,1.14545455 15.0545455,0 12,0 C7.27006974,0 3.1977497,2.69829785 1.23999023,6.65002441 L5.26620003,9.76452941 Z" />
                                        <path fill="#34A853"
                                            d="M16.0407269,18.0125889 C14.9509167,18.7163016 13.5660892,19.0909091 12,19.0909091 C8.86648613,19.0909091 6.21911939,17.076871 5.27698177,14.2678769 L1.23746264,17.3349879 C3.19279051,21.2936293 7.26500293,24 12,24 C14.9328362,24 17.7353462,22.9573905 19.834192,20.9995801 L16.0407269,18.0125889 Z" />
                                        <path fill="#4A90E2"
                                            d="M19.834192,20.9995801 C22.0291676,18.9520994 23.4545455,15.903663 23.4545455,12 C23.4545455,11.2909091 23.3454545,10.5272727 23.1818182,9.81818182 L12,9.81818182 L12,14.4545455 L18.4363636,14.4545455 C18.1187732,16.013626 17.2662994,17.2212117 16.0407269,18.0125889 L19.834192,20.9995801 Z" />
                                        <path fill="#FBBC05"
                                            d="M5.27698177,14.2678769 C5.03832634,13.556323 4.90909091,12.7937589 4.90909091,12 C4.90909091,11.2182781 5.03443647,10.4668121 5.26620003,9.76452941 L1.23999023,6.65002441 C0.43658717,8.26043162 0,10.0753848 0,12 C0,13.9195484 0.444780743,15.7301709 1.23746264,17.3349879 L5.27698177,14.2678769 Z" />
                                    </svg>
                                </span>
                                <span>{{ __('Sign in with Google') }}</span>
                            </x-button>
                            {{-- <x-button href="/login-facebook"
                                class="flex items-center justify-center flex-none px-3 py-2 md:px-4 md:py-3 border-2 rounded-lg font-medium border-black relative">
                                <span class="absolute left-4">
                                    <svg style="color: blue" xmlns="http://www.w3.org/2000/svg" width="24px"
                                        height="24px" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                        <path
                                            d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"
                                            fill="blue"></path>
                                    </svg>
                                </span>
                                <span>{{__('Sign in with Facebook')}}</span>
                            </x-button> --}}
                        </div>
                    </div>

                    <!-- Footer -->
                    <div
                        class="flex justify-center flex-col m-auto mt-6 mb-16 text-center text-lg dark:text-slate-200 ">
                        @if (Route::has('password.request'))
                            <a class="underline text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                    </div>

                </div>
            </div>

        </div>
        <!-- Example -->
    </body>


    {{-- @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <section class="bg-no-repeat bg-cover  " style="background-image: url('{{ asset('assets/cita_3.jpeg') }}')">
            <div class="p-20 backdrop-blur-xl">
                <div class="flex bg-white rounded-lg shadow-lg overflow-hidden mx-auto max-w-sm lg:max-w-4xl">
                    <div class="hidden lg:block lg:w-1/2 bg-cover w-50"
                        style="background-image: url('{{ asset('assets/logo1.png') }}')">
                    </div>
                    <div class="w-full  p-5 lg:w-1/2">

                        <h2 class="text-2xl font-semibold text-gray-700 text-center">San Luis Planes</h2>
                        <p class="text-xl text-gray-600 text-center">{{ __('Welcome back!') }}</p>
                        <div class="flex w-full">
                            <a href="/login-google"
                                class="flex items-center justify-center mt-4 text-white rounded-lg shadow-md hover:bg-gray-100">
                                <div class="px-4 py-3">
                                    <svg class="h-6 w-6" viewBox="0 0 40 40">
                                        <path
                                            d="M36.3425 16.7358H35V16.6667H20V23.3333H29.4192C28.045 27.2142 24.3525 30 20 30C14.4775 30 10 25.5225 10 20C10 14.4775 14.4775 9.99999 20 9.99999C22.5492 9.99999 24.8683 10.9617 26.6342 12.5325L31.3483 7.81833C28.3717 5.04416 24.39 3.33333 20 3.33333C10.7958 3.33333 3.33335 10.7958 3.33335 20C3.33335 29.2042 10.7958 36.6667 20 36.6667C29.2042 36.6667 36.6667 29.2042 36.6667 20C36.6667 18.8825 36.5517 17.7917 36.3425 16.7358Z"
                                            fill="#FFC107" />
                                        <path
                                            d="M5.25497 12.2425L10.7308 16.2583C12.2125 12.59 15.8008 9.99999 20 9.99999C22.5491 9.99999 24.8683 10.9617 26.6341 12.5325L31.3483 7.81833C28.3716 5.04416 24.39 3.33333 20 3.33333C13.5983 3.33333 8.04663 6.94749 5.25497 12.2425Z"
                                            fill="#FF3D00" />
                                        <path
                                            d="M20 36.6667C24.305 36.6667 28.2167 35.0192 31.1742 32.34L26.0159 27.975C24.3425 29.2425 22.2625 30 20 30C15.665 30 11.9842 27.2359 10.5975 23.3784L5.16254 27.5659C7.92087 32.9634 13.5225 36.6667 20 36.6667Z"
                                            fill="#4CAF50" />
                                        <path
                                            d="M36.3425 16.7358H35V16.6667H20V23.3333H29.4192C28.7592 25.1975 27.56 26.805 26.0133 27.9758C26.0142 27.975 26.015 27.975 26.0158 27.9742L31.1742 32.3392C30.8092 32.6708 36.6667 28.3333 36.6667 20C36.6667 18.8825 36.5517 17.7917 36.3425 16.7358Z"
                                            fill="#1976D2" />
                                    </svg>
                                </div>
                                <h3 class="px-4 py-3 w-5/6 text-center text-gray-600 font-bold">Sign in with Google
                                </h3>
                            </a>
                            <a href="/login-facebook"
                                class="flex items-center justify-center mt-4 text-white rounded-lg shadow-md hover:bg-gray-100">
                                <div class="px-4 py-3">
                                    <svg style="color: blue" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                        <path
                                            d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"
                                            fill="blue"></path>
                                    </svg>
                                </div>
                                <h3 class="px-4 py-3 w-5/6 text-center text-gray-600 font-bold">Sign in with Google</h3>
                            </a>
                        </div>
                        <div class="mt-4 flex items-center justify-between">
                            <span class="border-b w-1/5 lg:w-1/4"></span>
                            <a href="#email" class="text-xs text-center text-gray-500 uppercase">or login with
                                email</a>
                            <span class="border-b w-1/5 lg:w-1/4"></span>
                        </div>
                        <div class="mt-4">
                            <x-label for="email" label="{{ __('Email') }}" />
                            <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                                :value="old('email')" required autofocus autocomplete="username" />
                        </div>
                        <div class="mt-4">
                            <div class="flex justify-between">
                                <x-label for="password" label="{{ __('Password') }}" />
                                @if (Route::has('password.request'))
                                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                        href="{{ route('password.request') }}">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                @endif
                            </div>
                            <x-input id="password" class="block mt-1 w-full" type="password" name="password"
                                required autocomplete="current-password" />
                        </div>
                        <div class="block mt-4">
                            <label for="remember_me" class="flex items-center">
                                <x-checkbox id="remember_me" name="remember" />
                                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                            </label>
                        </div>
                        <x-validation-errors class="mb-4" />
                        <div class="mt-8">
                            <x-button primary class=" font-bold py-2 px-4 w-full rounded hover:bg-gray-600"
                                type="submit" spinner>
                                {{ __('Log in') }}
                            </x-button>

                        </div>
                        <div class="mt-4 flex items-center justify-between">
                            <span class="border-b w-1/5 md:w-1/4"></span>
                            <a href="{{ route('register') }}"
                                class="text-xs text-gray-500 uppercase">{{ __('or sign up') }}</a>
                            <span class="border-b w-1/5 md:w-1/4"></span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form> --}}
</x-guest-layout>

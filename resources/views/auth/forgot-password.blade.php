<x-guest-layout>

    <body class="font-mono bg-gray-100 ">
        <!-- Container -->
        <div class="container mx-auto  ">
            <div class="flex justify-center px-6 my-12 ">
                <!-- Row -->
                <div class="w-full xl:w-3/4 lg:w-11/12 flex shadow-2xl">
                    <!-- Col -->
                    <div
                        class="p-10 rounded-l-xl relative overflow-hidden md:flex w-1/2 bg-gradient-to-tr from-blue-800 to-purple-700 i justify-around items-center hidden">
                        <div>
                            <img src="{{ asset('assets/logo1.png') }}" class="rounded-xl shadow-xl img-fluid"
                                alt="" srcset="">
                        </div>
                        <div
                            class="absolute -bottom-32 -left-40 w-80 h-80 border-4 rounded-full border-opacity-30 border-t-8">
                        </div>
                        <div
                            class="absolute -bottom-40 -left-20 w-80 h-80 border-4 rounded-full border-opacity-30 border-t-8">
                        </div>
                        <div
                            class="absolute -top-40 -right-0 w-80 h-80 border-4 rounded-full border-opacity-30 border-t-8">
                        </div>
                        <div
                            class="absolute -top-20 -right-20 w-80 h-80 border-4 rounded-full border-opacity-30 border-t-8">
                        </div>
                    </div>
                    <!-- Col -->
                    <div class="w-full lg:w-1/2 bg-white p-5 rounded-lg lg:rounded-l-none">
                        <div class="px-8 mb-4 text-center">
                            <h3 class="pt-4 mb-2 text-2xl">{{ __('Forgot your password') }}?</h3>
                            <p class="mb-4 text-sm text-gray-700">
                                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                            </p>
                        </div>
                        @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ session('status') }}
                            </div>
                        @endif

                        <x-validation-errors class="mb-4" />

                        <form class="px-8 pt-6 pb-8 mb-4 bg-white rounded" method="POST"
                            action="{{ route('password.email') }}">
                            @csrf
                            <div class="mb-4">
                                <x-input id="email" type="email" name="email" :value="old('email')" required
                                    autofocus autocomplete="username" class="pr-28" label="Email"
                                    placeholder="tu correo..." suffix="@mail.com" />
                            </div>
                            <div class="mb-6 text-center">
                                <x-button negative type="submit" spinner>
                                    {{ __('Email Password Reset Link') }}
                                </x-button>
                            </div>
                            <hr class="mb-6 border-t" />
                            <div class="text-center">
                                <a class="inline-block text-sm text-blue-500 align-baseline hover:text-blue-800"
                                    href="{{ route('register') }}">
                                    {{ __('Create Account') }}
                                </a>
                            </div>
                            <div class="text-center">
                                <a class="inline-block text-sm text-blue-500 align-baseline hover:text-blue-800"
                                    href="{{ route('login') }}">
                                    {{ __('Already have an account? Login!') }}
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>



    {{-- <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-label for="email" label="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autofocus autocomplete="username" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button type="submit" spinner>
                    {{ __('Email Password Reset Link') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card> --}}
</x-guest-layout>

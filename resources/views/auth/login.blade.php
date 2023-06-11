<x-guest-layout>

    @if (session('status'))
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
                                <h3 class="px-4 py-3 w-5/6 text-center text-gray-600 font-bold">Sign in with Google</h3>
                            </a>
                            {{-- <a href="/login-facebook"
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
                            </a> --}}
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
                            <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                                autocomplete="current-password" />
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
    </form>
</x-guest-layout>

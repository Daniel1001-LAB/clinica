<x-guest-layout>
    <div class="h-screen md:flex">
        <div
            class="relative overflow-hidden md:flex w-1/2 bg-gradient-to-tr from-blue-800 to-purple-700 i justify-around items-center hidden">
            <div>
                <img src="{{ asset('assets/logo1.png') }}" class="rounded-xl shadow-xl img-fluid" alt=""
                    srcset="">
            </div>
            <div class="absolute -bottom-32 -left-40 w-80 h-80 border-4 rounded-full border-opacity-30 border-t-8"></div>
            <div class="absolute -bottom-40 -left-20 w-80 h-80 border-4 rounded-full border-opacity-30 border-t-8"></div>
            <div class="absolute -top-40 -right-0 w-80 h-80 border-4 rounded-full border-opacity-30 border-t-8"></div>
            <div class="absolute -top-20 -right-20 w-80 h-80 border-4 rounded-full border-opacity-30 border-t-8"></div>
        </div>
        <div class="flex md:w-1/2 justify-center p-10 items-center bg-white">
            <div class="bg-white">
                <div class="flex flex-wrap justify-center ">
                    <img class="rounded-xl img-fluid w-72" src="{{ asset('assets/Mar-Business_18.jpg') }}"
                        alt="">
                    <div class="mb-4 text-sm text-gray-600">
                        {{ __('Before continuing, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                    </div>
                    @if (session('status') == 'verification-link-sent')
                        <div class="mb-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to the email address you provided in your profile settings.') }}
                        </div>
                    @endif
                    <div class="mt-2 flex items-center justify-between gap-4">
                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf

                            <div>
                                <x-button sm type="submit" primary icon="arrow-path"
                                    label="{{ __('Resend Verification Email') }}" />
                                {{-- <x-button type="submit">
                                    {{ __('Resend Verification Email') }}
                                </x-button> --}}
                            </div>
                        </form>
                        <div>
                            <form method="POST" action="{{ route('logout') }}" class="inline">
                                @csrf

                                <x-button sm type="submit" red icon="home" flat label="{{ __('Log Out') }}" />
                                {{-- <button type="submit"
                                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 ml-2">
                                    {{ __('Log Out') }}
                                </button> --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Before continuing, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('A new verification link has been sent to the email address you provided in your profile settings.') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-button type="submit">
                        {{ __('Resend Verification Email') }}
                    </x-button>
                </div>
            </form>

            <div>


                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf

                    <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 ml-2">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </div>
    </x-authentication-card> --}}
</x-guest-layout>

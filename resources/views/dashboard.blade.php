<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
            <x-nav-link href="{{ url('/') }}" :active="request()->routeIs('dashboard')">
                {{ __('Home') }}
            </x-nav-link>
        </div>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-2xl border-t sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <h1 class="mt-8 text-2xl font-medium text-gray-900">
                        Historial Médico
                    </h1>

                    <p class="mt-6 text-gray-500 leading-relaxed">
                        <span class="font-bold text-gray-600">{{ auth()->user()->name }}, </span>
                        paciente de
                        <span class="font-medium text-gray-600 underline italic">sexo:
                            {{ auth()->user()->gender }}</span> de

                        @if (\Carbon\Carbon::parse(auth()->user()->birthdate)->age > 0)
                            <span class="font-medium text-gray-600 underline italic">
                                {{ \Carbon\Carbon::parse(auth()->user()->birthdate)->age }} año(s) de edad
                            </span>
                        @else
                            <span class="font-medium text-gray-600 underline italic">
                                {{ \Carbon\Carbon::parse(auth()->user()->birthdate)->week() }} semana(s) de edad
                            </span>
                        @endif

                    </p>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>

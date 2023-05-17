<x-doctor-layout>
    <div class="container mx-auto p-6">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 ">
            {{-- Especialidades del doctor --}}
            <div class="bg-white rounded-2xl shadow-2xl ">
                <img class="w-full h-80 shadow-sm rounded-t-lg object-contain"
                    src="{{ asset('assets/undraw_doctor_kw-5-l.svg') }}" alt="Medical specialty">
                <div class="p-6">
                    <div class="flex justify-between">
                        <h2 class="text-2xl font-semibold mb-2">{{ __('Specialties') }}</h2>
                        <x-badge.circle primary icon="home" lg />

                    </div>

                    @livewire('specialty.specialty-create')
                    <div class="mt-4" style="max-height: 200px; overflow-y: scroll;">
                        <p class="text-gray-800 font-bold text-center">{{ __('List of specialties:') }}</p>
                        @livewire('specialty.specialty-list')
                    </div>
                </div>
            </div>

            <div
                class="bg-white rounded-2xl shadow-2xl">
                <img class="w-full h-80 shadow-sm rounded-t-lg object-contain" src="{{ asset('assets/undraw_social_thinking_re_y8cc.svg') }}"
                    alt="Social networks">
                <div class="p-6">
                    <div class="flex justify-between">
                        <h2 class="text-2xl font-semibold mb-2">{{ __('Social networks') }}</h2>
                        <x-badge.circle primary icon="globe-alt" lg />
                    </div>

                    @livewire('social.social-create')
                    <div class="mt-4" style="max-height: 200px; overflow-y: scroll;">
                        <p class="text-gray-800 font-bold text-center">{{ __('List of social networks:') }}</p>
                        @livewire('social.social-delete')
                    </div>
                </div>
            </div>

            <div
                class="bg-white rounded-lg shadow-2xl">
                <img class="w-full h-80 shadow-sm rounded-t-lg object-contain" src="{{ asset('assets/undraw_medicine_b-1-ol.svg') }}"
                    alt="Medical skill">
                <div class="p-6">
                    <div class="flex justify-between">
                        <h2 class="text-2xl font-semibold mb-2">{{ __('Skills') }}</h2>
                        <x-badge.circle primary icon="newspaper" lg />
                    </div>

                    @livewire('skill.skill-create')
                    <div class="mt-4" style="max-height: 200px; overflow-y: scroll;">
                        <p class="text-gray-800 font-bold text-center mb-3">{{ __('List of skills:') }}</p>
                        @livewire('skill.skill-list')
                    </div>
                </div>
            </div>

        </div>

    </div>
</x-doctor-layout>

<x-doctor-layout>
    <div class="container mx-auto max-w-5xl p-6">

        <div class="grid grid-col-1 md:grid-cols-3 gap-3">
            <div class="max-w-sm rounded overflow-hidden shadow-lg">
                <img class="w-full" src="{{ asset('assets/medica.jpg') }}" alt="Sunset in the mountains">
                @livewire('specialty.specialty-create')
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2 capitalize">{{ __('specialties') }}</div>
                    <p class="text-gray-700 text-base">
                        @livewire('specialty.specialty-list')
                    </p>
                </div>


            </div>

            <div class="max-w-sm rounded overflow-hidden shadow-lg">
                <img class="w-full" src="{{ asset('assets/socials.jpg') }}" alt="Sunset in the mountains">
                @livewire('social.social-create')
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2 capitalize">{{ __('socials') }}</div>
                    <p class="text-gray-700 text-base">
                        @livewire('social.social-delete')
                    </p>
                </div>

            </div>

            <div class="max-w-sm rounded overflow-hidden shadow-lg">
                <img class="w-full" src="{{ asset('assets/medical-skill.jpeg') }}" alt="Sunset in the mountains">
                @livewire('skill.skill-create')
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2 capitalize">{{ __('skills') }}</div>
                    <p class="text-gray-700 text-base">
                        @livewire('skill.skill-list')
                    </p>
                </div>

            </div>
        </div>
    </div>
</x-doctor-layout>

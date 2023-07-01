<div>
    <!-- 1 card -->
    <div class="relative bg-white py-6 px-6 rounded-3xl w-full h-full my-4 shadow-xl border-t-4 border-blue-400">
        <div class=" text-white flex items-center absolute rounded-full py-1 px-1 shadow-xl bg-blue-500 left-4 -top-6">
            <!-- svg  -->
            <x-avatar xl src="{{ $patient->profile_photo_url }}" />
        </div>
        <div class="mt-8">
            <div class="flex justify-between">
                <p class="text-xl font-semibold my-2 capitalize">{{ __('interview resume') }}: {{ $patient->name }}</p>
                <div class="">
                    <x-button target="_blank" href="{{ route('interviews.pdf', ['interview' => $interview->id]) }}" sm
                        icon="clipboard-list" primary label="Imprimir PDF" />
                </div>
            </div>

            <div class="flex space-x-2 text-gray-400 text-sm">
                <!-- svg  -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <p class="">{{ \Carbon\Carbon::parse($interview->date)->diffForHumans() }}</p>
            </div>
            @if ($patient->symptoms)
                <div class="flex space-x-2 text-gray-400 text-sm my-3">
                    @foreach ($patient_symptoms as $ps)
                        <!-- svg  -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9.75 3.104v5.714a2.25 2.25 0 01-.659 1.591L5 14.5M9.75 3.104c-.251.023-.501.05-.75.082m.75-.082a24.301 24.301 0 014.5 0m0 0v5.714c0 .597.237 1.17.659 1.591L19.8 15.3M14.25 3.104c.251.023.501.05.75.082M19.8 15.3l-1.57.393A9.065 9.065 0 0112 15a9.065 9.065 0 00-6.23-.693L5 14.5m14.8.8l1.402 1.402c1.232 1.232.65 3.318-1.067 3.611A48.309 48.309 0 0112 21c-2.773 0-5.491-.235-8.135-.687-1.718-.293-2.3-2.379-1.067-3.61L5 14.5" />
                        </svg>

                        <p class="">{{ $ps->name }}</p>
                    @endforeach
                </div>
            @endif
            <div class="border-t-2"></div>

            <div class="grid grid-cols-2 gap-2">
                <div class="my-2">
                    <p class="font-semibold text-base mb-2">{{ __('suspicion') }}</p>
                    <p class="">{{ $interview->suspicion }}</p>
                </div>
                <div class="my-2">
                    <p class="font-semibold text-base mb-2">{{ __('diagnosis') }}</p>
                    <p class="">{{ $interview->diagnosis }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

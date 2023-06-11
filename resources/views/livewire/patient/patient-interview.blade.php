<div class="shadow-xl rounded-xl p-4 border">
    <h1 class="text-xl font-semibold capitalize my-2 mb-3 text-center">{{__('patient interview')}}</h1>
    @livewire('patient.patient-symptom',['user_symptoms_id'=>$this->symptoms_id])
    <form action="" wire:submit.prevent="save">
        <x-datetime-picker without-time class="mb-3" label="{{ __('Appointment Date') }}" placeholder="{{ __('date of interview') }}"
            wire:model="date" />
        {{-- <x-button class="mb-3" right-icon="information-circle" info label="{{ __('symptoms') }}" /> --}}

        @if (count($symptoms_text) > 0)
            <div class="flex flex-wrap mb-3">
                @forelse ($symptoms_text as $st)
                    <x-badge class="me-2 mb-2 " flat primary label="{{$st}}" />
                @empty
                    <x-badge class="me-2 mb-2 " flat negative label="{{__('this patient has no recorded symptoms ')}}" />
                @endforelse
            </div>
        @endif
        <x-textarea class="mb-3" label="{{ __('Suspicion') }}" placeholder="{{ __('patient suspicions') }}"
            wire:model="suspicion" />
        <x-textarea class="mb-3" label="{{ __('Diagnosis') }}" placeholder="{{ __('patient diagnosis') }}"
            wire:model="diagnosis" />

        @if(empty($date) || empty($suspicion) || empty($diagnosis) || count($symptoms_text) == 0)
            <div class="bg-yellow-200 text-yellow-800 p-2 rounded-md mb-3">
               {{__('Please fill in all the fields and add at least one symptom.')}}
            </div>
        @endif

        <div class="flex justify-between items-end gap-x-4">
            {{-- <x-button flat label="Cancel" /> --}}
            @if (!empty($date) && !empty($suspicion) && !empty($diagnosis) && count($symptoms_text) > 0)
                <x-button wire:click="save" primary label="Save" />
            @endif
        </div>
    </form>
</div>

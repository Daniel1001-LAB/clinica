<x-doctor-layout>
    <x-slot name="header">
        <h1>Layout de Doctor</h1>
    </x-slot>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 p-10">
        <div class="h-full w-full ">
            @livewire('patient.patient-list')
        </div>

        <div class="h-full w-full">
            @livewire('appointment.appointment-list')
        </div>

        <div class="h-full w-full">
            @livewire('schedulle.schedulle')
        </div>
    </div>
</x-doctor-layout>

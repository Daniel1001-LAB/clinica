<article  style="background-image: url({{ asset('assets/medica.jpg') }})" class="bg-cover">
    <div class="grid grid-cols-1 sm:grid-cols-2 justify-between items-center p-24 gap-20">
        <div id="listado-medicos" class="col-span-1 sm:col-span-2 bg-gray-900 px-20 text-center bg-opacity-40">
            <h1 class="text-white text-4xl p-4">Paso 2</h1>
            <h1 class="text-white text-2xl p-4">Busque y seleccione a un Médico y agende su cita</h1>
            <h2 class="text-white text-3xl">Listado de Médicos</h2>
            @livewire('patient.patient-date')
            @livewire('patient.patient-doctor')
        </div>

    </div>
    {{-- Aquí Listado de Médicos --}}
</article>

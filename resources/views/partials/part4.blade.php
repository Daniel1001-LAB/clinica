<article id="listado-especialidad" style="background-image: url({{ asset('assets/especialidades.jpg') }})" class="bg-cover">
    <div class="grid grid-cols-1 lg:grid-cols-2 justify-between items-center px-24 gap-20">
        <div class="col-span-1 sm:col-span-2 bg-gray-900 py-0 text-center bg-opacity-40">
            <h1 class="text-white text-4xl p-4">Paso 3</h1>
            <h1 class="text-white text-2xl p-4">Si conoce la especialidad, búsquela, seleccione un Médico y agende su cita</h1>
            <h2 class="text-white text-3xl">Listado de Especialidades</h2>
            <div class="col-span-1 sm:col-span-2 bg-gray-900 py-20 text-center bg-opacity-40">
                @livewire('patient.patient-specialty')
            </div>
        </div>
    </div>
    {{-- Aquí Listado de Especialidadess --}}
</article>

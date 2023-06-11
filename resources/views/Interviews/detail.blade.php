<x-doctor-layout>
    <!-- component -->
    <style>
        :root {
            --main-color: #4a76a8;
        }

        .bg-main-color {
            background-color: var(--main-color);
        }

        .text-main-color {
            color: var(--main-color);
        }

        .border-main-color {
            border-color: var(--main-color);
        }
    </style>

    <div class="bg-gray-100 bg-contain">
        <div class="container mx-auto p-5">
            <div class="md:flex no-wrap md:-mx-2  ">
                <!-- Left Side -->
                <div class="w-full md:w-3/12 md:mx-2 ">
                    <!-- Profile Card -->
                    <div class="bg-white  border-t-4 border-blue-400 rounded-lg shadow-sm">
                        @livewire('medicine.medicine-controller')
                    </div>
                    <!-- End of profile card -->
                    <div class="my-4"></div>
                    <!-- Friends card -->
                    <div class="bg-white  border-t-4 border-blue-400 rounded-lg shadow-sm">
                        @livewire('patient.patient-file', compact('interview'))
                    </div>
                    <!-- End of friends card -->
                </div>
                <!-- Right Side -->
                <div class="w-full md:w-9/12 mx-2 h-full">
                    <!-- Profile tab -->
                    <!-- patient Section -->
                    <div class="relative bg-white  rounded-3xl w-full my-4 shadow-xl">
                        @livewire('patient.patient-medicine', compact('interview'))
                    </div>
                    <!-- End of patient section -->
                    <div class="my-8"></div>
                    <!-- Experience and education -->
                    <div class="relative bg-white  rounded-3xl w-full h-full my-4 shadow-xl">
                        @livewire('patient.patient-interview-resume', compact('interview'))
                    </div>
                    <!-- End of Experience and education grid -->
                    <!-- End of profile tab -->
                </div>
            </div>
        </div>
    </div>

    {{-- <section>
        <div class="container mx-auto p-5 grid grid-cols-1 md:grid-cols-12 gap-4">
            <div class="md:col-span-3">
                <!-- Componente medicine-controller -->
                @livewire('medicine.medicine-controller')
            </div>
            <div class="md:col-span-6">
                <div class="flex flex-col w-full h-full">
                    <!-- Componente A -->
                    <div class="flex-grow flex-auto">
                        @livewire('patient.patient-medicine', compact('interview'))
                    </div>

                    <!-- Componente B -->
                    <div class="flex-grow mt-4">
                        @livewire('patient.patient-medicine', compact('interview'))
                    </div>
                </div>
            </div>
            <div class="md:col-span-3">
                <!-- Componente patient-file -->
                @livewire('patient.patient-file', compact('interview'))
            </div>
        </div>
    </section> --}}
</x-doctor-layout>

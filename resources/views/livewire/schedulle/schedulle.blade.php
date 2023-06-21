<div>
    <div class="bg-white shadow-lg p-6 rounded-lg">
        <div class="flex justify-start items-center mb-4">
            <h1
                class="me-4 capitalize text-center text-2xl font-extrabold leading-none tracking-tight text-gray-900 md:text-2xl lg:text-2xl dark:text-white">
                {{ __('schedulle') }} </h1>

        </div>

        <div class=" grid grid-cols-1 grid-rows-2 sm:grid-cols-1 md:grid-cols-4 md:grid-rows-2 gap-3">
            {{-- <x-datetime-picker without-time label="Appointment Date" placeholder="Appointment Date"/> --}}
            @foreach ($workdays as $workday)
                <div class="mt-6">
                    <div
                        class="flex flex-wrap h-full sm:flex-col w-full sm:w-full p-5 border-l-2 border-blue-300 bg-white rounded-md shadow-xl py-3">
                        <h1 class="text-start font-bold text-2xl capitalize text-gray-700">{{ DIA[$workday->day] }}</h1>
                        <div class="flex justify-center items-center">
                            <p class="me-4 text-sm capitalize">
                                {{ __('morning')}}
                                {{ $workday->HourMs }} {{ $workday->HourMe }}
                            </p>
                            <p class="me-4 text-sm capitalize">
                                {{ __('afternoon')}}
                                {{ $workday->HourAs }} {{ $workday->HourAe }}
                            </p>
                            <p class="me-4 text-sm capitalize">
                                {{ __('evening')}}
                                {{ $workday->HourEs }} {{ $workday->HourEe }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
            <div
                class="mt-6 flex justify-center items-center border-l-2 border-blue-300 bg-white rounded-md shadow-xl py-3">
                <x-button href="{{ route('workdays.index') }}" icon="pencil" primary label="Editar días de trabajo" />
            </div>
        </div>
        <div>
        </div>
    </div>
</div>

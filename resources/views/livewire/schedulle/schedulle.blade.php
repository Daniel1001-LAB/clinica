<div>
    <div class="bg-white shadow-lg p-6 rounded-lg">
        <div class="flex justify-start items-center mb-4">
            <h1
                class="me-4 capitalize text-2xl font-extrabold leading-none tracking-tight text-gray-900 md:text-2xl lg:text-2xl dark:text-white">
                {{ __('schedulle') }} </h1>

        </div>

        <div class="mb-2">
            {{-- <x-datetime-picker without-time label="Appointment Date" placeholder="Appointment Date"/> --}}
            @foreach ($workdays as $workday)
                <div class="mt-6">
                    <div
                        class="flex flex-wrap sm:flex-col w-full sm:w-full p-5 border-l-2 border-blue-300 bg-white rounded-md shadow-xl py-3">
                        <h1 class="text-start font-bold text-2xl capitalize text-gray-700">{{ DIA[$workday->day] }}</h1>
                        <div class="flex justify-center items-center">
                            <p class="me-6">
                                {{ $workday->HourMs }} {{ $workday->HourMe }}
                            </p>
                            <p class="me-6">
                                {{ $workday->HourAs }} {{ $workday->HourAe }}
                            </p>
                            <p class="me-6">
                                {{ $workday->HourEs }} {{ $workday->HourEe }}
                            </p>
                        </div>
                        </div>

                    </div>
            @endforeach


        </div>
        <div>
        </div>
    </div>
</div>

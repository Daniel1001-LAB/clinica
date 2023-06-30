<div>
    <x-modal.card title="{{ __('select date and time') }}" blur wire:model="openModal">
        <div class="bg-blue-100 border-t border-b mb-4 border-blue-500 text-blue-700 px-4 py-3" role="alert">
            <p class="font-bold">{{ __('Informational message') }}</p>
            <p class="text-sm">{{ __('select a date to see the appointments list available') }}</p>
        </div>

        <div class="col-span-1 sm:col-span-2 capitalize mb-3">
            <x-datetime-picker min="{{ now()->toIso8601String() }}" display-format="DD/MM/YYYY" without-time
                label="{{ __('appointment date') }}" class="capitalize" placeholder="{{ __('appointment date') }}"
                wire:model="date" />
        </div>
        @if (session()->has('message'))
            <div id="alert" class="alert alert-success text-center">
                {{ session('message') }}
            </div>
        @endif
        <div class="grid grid-cols-3 gap-2 p-2 ">

            <ul>
                <li class="capitalize text-gray-500 text-center mb-2">{{ __('morning') }}</li>

                @foreach ($morning as $m)
                    <x-button wire:click="seleccionar('{{ $m }}')" icon="calendar"
                        class="mb-2 cursor-pointer text-sm px-4  w-full" primary label="{{ $m }} ">
                    </x-button>

                @endforeach
            </ul>

            <ul>
                <li class="capitalize text-gray-500 text-center mb-2">{{ __('afternoon') }}</li>

                @foreach ($afternoon as $a)
                    <x-button wire:click="seleccionar('{{ $a }}')" icon="calendar"
                        class="mb-2 cursor-pointer text-sm px-4  w-full" primary label="{{ $a }}">
                    </x-button>

                @endforeach
            </ul>

            <ul>
                <li class="capitalize text-gray-500 text-center mb-2">{{ __('evening') }}</li>
                @foreach ($evening as $e)
                    <x-button wire:click="seleccionar('{{ $e }}')" icon="calendar"
                        class="mb-2 cursor-pointer text-sm px-4  w-full" primary label="{{ $e }}">
                    </x-button>

                @endforeach
            </ul>
            <x-errors />
        </div>

        <x-slot name="footer">
            <div class="flex justify-between gap-x-4">
                <div class="flex">
                    <x-button icon="x" negative flat label="Cancel" x-on:click="close" />
                    {{-- <x-button primary label="Save" wire:click="save" /> --}}
                </div>
            </div>
        </x-slot>
    </x-modal.card>
</div>

@push('script')
    <script type="text/javascript">
        window.addEventListener('store-data', event => {
            localStorage.setItem('interval', event.detail.interval)
            localStorage.setItem('doctor_id', event.detail.doctor_id)
            localStorage.setItem('specialty_id', event.detail.specialty_id)
            localStorage.setItem('day', event.detail.day)
            localStorage.setItem('date', event.detail.date)
            localStorage.setItem('office_id', event.detail.office_id)
            localStorage.setItem('price', event.detail.price)
        })

        window.addEventListener('delete-data', event => {
            localStorage.removeItem('interval')
            localStorage.removeItem('doctor_id')
            localStorage.removeItem('specialty_id')
            localStorage.removeItem('day')
            localStorage.removeItem('date')
            localStorage.removeItem('office_id')
            localStorage.removeItem('price')
        })
    </script>
@endpush

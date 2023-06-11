<div>
    <x-modal.card title="{{ __('select date and time') }}" blur wire:model="openModal">
        <div class="col-span-1 sm:col-span-2">
            <x-datetime-picker min="{{ now()->toIso8601String() }}" display-format="DD/MM/YYYY" without-time
                label="Appointment Date" class="capitalize" placeholder="{{ __('appointment date') }}" wire:model="date" />
        </div>

        <div class="grid grid-cols-3 gap-2 p-2 ">
            <ul>
                @foreach ($morning as $m)
                    <x-button wire:click="seleccionar('{{ $m }}')" icon="calendar"
                        class="mb-2 cursor-pointer text-sm px-4  w-full" primary label="{{ $m }}"></x-button>
                @endforeach
            </ul>

            <ul>
                @foreach ($afternoon as $a)
                    <x-button wire:click="seleccionar('{{ $a }}')" icon="calendar"
                        class="mb-2 cursor-pointer text-sm px-4  w-full" primary label="{{ $a }}"></x-button>
                @endforeach
            </ul>

            <ul>
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
                    <x-button flat label="Cancel" x-on:click="close" />
                    <x-button primary label="Save" wire:click="save" />
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
            localStorage.setItem('office', event.detail.office)
            localStorage.setItem('price', event.detail.price)
        })

        window.addEventListener('delete-data', event => {
            localStorage.removeItem('interval')
            localStorage.removeItem('doctor_id')
            localStorage.removeItem('specialty_id')
            localStorage.removeItem('day')
            localStorage.removeItem('date')
            localStorage.removeItem('office')
            localStorage.removeItem('price')
        })
    </script>
@endpush

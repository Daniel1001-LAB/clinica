<div class="">
    <x-button wire:click="$set('modal', true)" icon="exclamation" pink label="Gestando?" />
    <x-modal.card wire:model="modal" title="{{ __('Historial de Gestación') }}" blur>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div class="col-span-1 sm:col-span-2">
                <x-input label="{{ __('Name') }}" wire:model="name" readonly placeholder="Your full name" />
            </div>

            <x-datetime-picker without-time label="{{ __('Última Mestruación') }} (FUM)" placeholder="Appointment Date"
            wire:model="last" />

            <x-input label="{{ __('Ciclo Menstrual promedio') }}" wire:model="cycle"
                placeholder="{{ __('Ciclo de Mestruación') }}" type="number" />

            <x-input label="{{ __('Flujo Menstrual Promedio') }}" wire:model="flow"
                placeholder="{{ __('Días de Mestruación') }}" type="number" />

            <div
                class="border-t-4 border-blue-400 col-span-1 sm:col-span-2 p-3 bg-gray-100 rounded-xl shadow-md h-full flex items-center justify-center">
                <div class="flex flex-col items-center justify-center">
                    <div class="text-lg text-black font-bold text-center mb-2 uppercase">
                        {{ __('Datos de última menstruación') }}
                        @if ($pinar)
                            <div class=" p-6 text-center  mx-24 rounded-2xl shadow-lg">
                                <h1 class="mb-6">PROBABLE FECHA DE PARTO</h1>
                                <h1 class="text-xs me-4 mb-4 font-medium">Método PINARD:
                                    <x-badge flat negative label="{{ $pinar }}" />
                                </h1>
                                <h1 class="text-xs me-4 mb-4 font-medium">Método WAHL:
                                    <x-badge flat negative label="{{ $wahl }}" />
                                </h1>
                                <h1 class="text-xs me-4 mb-4 font-medium">Método NAEGELE:
                                    <x-badge flat negative label="{{ $naeguele }}" />
                                </h1>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <x-slot name="footer">
            <div class="flex justify-between gap-x-4">
                <x-button flat negative disabled label="Delete" wire:click="delete" />

                <div class="flex">
                    <x-button flat label="Cancel" x-on:click="close" />
                    <x-button primary label="Save" wire:click="addGesta" />
                </div>
            </div>
        </x-slot>
    </x-modal.card>
</div>

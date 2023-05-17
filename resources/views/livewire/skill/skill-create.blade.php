<div class="section">
    <div>
        <x-button secondary icon="plus" wire:click="$set('openModal', true)" class="w-full capitalize"
            label="{{ __('add skill') }}">
        </x-button>
    </div>

    <x-modal.card title="{{ __('add skill') }}" blur wire:model="openModal">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div class="col-span-1 sm:col-span-2">
                <x-badge flat lg primary label="Doc: {{ auth()->user()->name }}" />
            </div>
            <x-native-select label="{{ __('Select specialty') }}" wire:model="specialty">
                <option class="capitalize" value=""> {{ __('select specialty') }}</option>
                @foreach ($specialties as $s)
                    <option class="capitalize" value="{{ __($s->name) }}">{{ __($s->name) }}</option>
                @endforeach
            </x-native-select>

            <x-input wire:model="title" label="{{ __('Title') }}"
                placeholder="{{ __('title of your specialty..') }}" />

            <div class="col-span-1 sm:col-span-2">
                <x-textarea wire:model="description" label="{{ __('Description') }}"
                    placeholder="{{ __('Describe your skills of your specialties...') }}" />

            </div>
        </div>

        <x-slot name="footer">
            <div class="flex justify-end gap-x-4">
                <div class="flex">
                    <x-button flat label="Cancel" x-on:click="close" />
                    <x-button primary label="{{ __('create') }}" wire:click="addSkill" />
                </div>
            </div>
        </x-slot>
    </x-modal.card>
</div>

<div class="section">
    <div>
        <x-button icon="plus" secondary wire:click="$set('openModal', true)" wire:submit="addSocial" type="button"
            class="w-full capitalize" label="{{ __('add social') }}">
        </x-button>
    </div>

    <x-modal.card title="{{ __('add socials media') }}" blur wire:model="openModal" wire:submit.prevent="addSocial">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <x-native-select  label="{{ __('socials media') }}" wire:model="social_id">
                <option class="capitalize" value=""> {{ __('select social media') }}</option>
                @foreach ($socials as $s)
                    <option class="capitalize" value="{{ __($s->id) }}">{{ __($s->name) }}</option>
                @endforeach
            </x-native-select>
            <x-badge flat lg primary label="Doc: {{ auth()->user()->name }}" />

            <div class="col-span-1 sm:col-span-2">
                <x-input wire:model="url" id="url" label="{{ __('socials urls for') }} {{ auth()->user()->name }}" placeholder="https://mifacebook.com/" />
                <x-input-error for="url"/>
            </div>

        </div>

        <x-slot name="footer">
            <div class="flex justify-end gap-x-4">

                <div class="flex">
                    <x-button flat label="Cancel" x-on:click="close" />
                    <x-button primary label="Save" wire:click="addSocial" />
                </div>
            </div>
        </x-slot>
    </x-modal.card>
</div>

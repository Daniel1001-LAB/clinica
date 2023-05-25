@props(['title' => __('Confirm Password'), 'content' => __('For your security, please confirm your password to continue.'), 'button' => __('Confirm')])

@php
    $confirmableId = md5($attributes->wire('then'));
@endphp

<span
    {{ $attributes->wire('then') }}
    x-data
    x-ref="span"
    x-on:click="$wire.startConfirmingPassword('{{ $confirmableId }}')"
    x-on:password-confirmed.window="setTimeout(() => $event.detail.id === '{{ $confirmableId }}' && $refs.span.dispatchEvent(new CustomEvent('then', { bubbles: false })), 250);"
>
    {{ $slot }}
</span>

@once

<x-modal.card title="{{ $title }}" blur wire:model="confirmingPassword">
    <div class="grid grid-cols-1 sm:grid-cols-1 gap-4">
        {{ $content }}


        <div class="col-span-1 sm:col-span-2">
            <div class="mt-4" x-data="{}" x-on:confirming-password.window="setTimeout(() => $refs.confirmable_password.focus(), 250)">
                <x-input type="password" class="mt-1 block w-3/4" placeholder="{{ __('Password') }}" autocomplete="current-password"
                            x-ref="confirmable_password"
                            wire:model.defer="confirmablePassword"
                            wire:keydown.enter="confirmPassword" />

                {{-- <x-input-error for="confirmable_password" class="mt-2" /> --}}
            </div>
        </div>


    </div>

    <x-slot name="footer">
        <div class="flex justify-between gap-x-4">

            <div class="flex">
                <x-button icon="x" flat label="{{__('Cancel')}}" wire:click="stopConfirmingPassword" wire:loading.attr="disabled" x-on:click="close" />
                <x-button icon="check" primary label="{{ $button }}" dusk="confirm-password-button" wire:click="confirmPassword" wire:loading.attr="disabled"/>
            </div>
        </div>
    </x-slot>
</x-modal.card>
{{-- Modal viejo  --}}
<x-dialog-modal >
    <x-slot name="title">
        {{ $title }}
    </x-slot>

    <x-slot name="content">
        {{ $content }}

        <div class="mt-4" x-data="{}" x-on:confirming-password.window="setTimeout(() => $refs.confirmable_password.focus(), 250)">
            <x-input type="password" class="mt-1 block w-3/4" placeholder="{{ __('Password') }}" autocomplete="current-password"
                        x-ref="confirmable_password"
                        wire:model.defer="confirmablePassword"
                        wire:keydown.enter="confirmPassword" />

            <x-input-error for="confirmable_password" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="footer">
        <x-secondary-button wire:click="stopConfirmingPassword" wire:loading.attr="disabled">
            {{ __('Cancel') }}
        </x-secondary-button>

        <x-button class="ml-3" dusk="confirm-password-button" wire:click="confirmPassword" wire:loading.attr="disabled">
            {{ $button }}
        </x-button>
    </x-slot>
</x-dialog-modal>
@endonce

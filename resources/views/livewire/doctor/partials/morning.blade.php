<div>
    <div class="grid grid-cols-3 sm:grid-cols-3 gap-2 text-sm items-center mb-3">
        <x-native-select class="capitalize" label="{{ __('start') }}" wire:model="ms">

            @foreach ($morning as $m)
                <option value="{{ $m['id'] }}">{{ __($m['str_hour_12']) }}</option>
            @endforeach
        </x-native-select>
        <x-input-error for="ms" />

        <x-native-select class="capitalize" label="{{ __('end') }}" wire:model="me">
            @foreach ($morning as $m)
                <option value="{{ $m['id'] }}">{{ __($m['str_hour_12']) }}</option>
            @endforeach
        </x-native-select>
        <x-input-error for="me" />

        <x-input icon="currency-dollar" label="{{ __('price') }}" placeholder="{{ __('price') }}" wire:model="mp"/>
        <x-input-error for="mp" />

    </div>

    <div class="col-span-1 sm:col-span-1">
        <x-native-select class="capitalize mb-4" label="{{ __('offices/address') }}" wire:model="mo">
            <option>Selecciona el consultorio</option>
            @foreach ($offices as $o)
                <option value="{{ $o->id }}">{{ __($o->local . ', ' . $o->address) }}</option>
            @endforeach
        </x-native-select>
        <x-input-error for="mo" />
    </div>
</div>



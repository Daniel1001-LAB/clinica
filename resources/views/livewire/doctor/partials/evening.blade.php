<div class="row">

    <div class="col-md-4 mb-3">
        <label class="text-capitalize" for="start">{{__('start')}}</label>
        <select wire:model="es" id="start" class="form-select" aria-label="Evening">
            @foreach ($evening as $m)
                <option value="{{ $m['id'] }}">{{ __($m['str_hour_12']) }}</option>
            @endforeach
        </select>
        <x-input-error for="es" />
    </div>
    <div class="col-md-4 mb-3">
        <label class="text-capitalize" for="end">{{__('end')}}</label>
        <select wire:model="ee" class="form-select" aria-label="Evening">
            @foreach ($evening as $m)
                <option value="{{ $m['id'] }}">{{ __($m['str_hour_12']) }}</option>
            @endforeach
        </select>
        <x-input-error for="ee" />
    </div>

    <div class="col-md-4 mb-3">
        <label class="text-capitalize" for="ep">{{__('price')}}</label>
        <div class="input-group flex-nowrap">
            <span for="ep" class="input-group-text" id="ep"><i
                    class="fa-solid fa-money-check-dollar "></i></span>
            <input type="text" class="form-control" placeholder="{{ __('0.00') }}"
                aria-label="{{ __('price') }}" aria-describedby="ep" wire:model="ep">
        </div>
        <x-input-error for="ep" />
    </div>

    <div class="col-md-12 mb-3">
        <label class="text-capitalize" for="offices/address">{{__('offices/address')}}</label>
        <select wire:model="eo" class="form-select" aria-label="Offices">
            @foreach ($offices as $o)
                <option value="{{ $o->id }}">{{ __($o->local . ', ' . $o->address) }}</option>
            @endforeach
        </select>
        <x-input-error for="eo" />
    </div>

</div>

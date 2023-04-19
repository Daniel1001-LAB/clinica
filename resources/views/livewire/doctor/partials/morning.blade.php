<div class="row">

    <div class="col-md-4 mb-3">
        <label class="text-capitalize" for="start">{{__('start')}}</label>
        <select wire:model="ms" id="start" class="form-select" aria-label="Morning">
            @foreach ($morning as $m)
                <option value="{{ $m['id'] }}">{{ __($m['str_hour_12']) }}</option>
            @endforeach
        </select>
        <x-input-error for="ms" />
    </div>
    <div class="col-md-4 mb-3">
        <label class="text-capitalize" for="end">{{__('end')}}</label>
        <select wire:model="me" class="form-select" aria-label="Morning">
            @foreach ($morning as $m)
                <option value="{{ $m['id'] }}">{{ __($m['str_hour_12']) }}</option>
            @endforeach
        </select>
        <x-input-error for="me" />
    </div>

    <div class="col-md-4 mb-3">
        <label class="text-capitalize" for="mp">{{__('price')}}</label>
        <div class="input-group flex-nowrap">
            <span for="mp" class="input-group-text" id="addon-wrapping"><i
                    class="fa-solid fa-money-check-dollar "></i></span>
            <input type="text" class="form-control" placeholder="{{ __('0.00') }}"
                aria-label="{{ __('price') }}" aria-describedby="addon-wrapping" wire:model="mp">
        </div>
        <x-input-error for="mp" />
    </div>

    <div class="col-md-12 mb-3">
        <label class="text-capitalize" for="offices/address">{{__('offices/address')}}</label>
        <select wire:model="mo" class="form-select" aria-label="Offices">
            @foreach ($offices as $o)
                <option value="{{ $o->id }}">{{ __($o->local . ', ' . $o->address) }}</option>
            @endforeach
        </select>
        <x-input-error for="mo" />
    </div>

</div>

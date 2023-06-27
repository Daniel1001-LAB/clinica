<div>
    <h6 class="mb-3 text-xl font-bold leading-5 text-white">{{ __('appoinments') }}</h6>
    @forelse($appoinments  as $a)
        <div class="text-sm text-white">
            <span>Condición:{{ $a->status }}</span>
            <br>
            <span>{{ $a->doctor->name }},</span>
            <span>{{ $a->specialty->name }},</span>
            <br>
            <span>{{ $a->oficina->address }},</span>
            <span>{{ $a->oficina->local }},</span>
            <span>{{ $a->oficina->email }},</span>
            <span>{{ $a->oficina->phone }},</span>
            <br>
            <span>{{ date('d-m-Y', strtotime($a->date))}},</span>
            <span>{{date('g:i A', strtotime($a->hour)) }},</span>
            <hr>
            <br>
        </div>
    @empty
        <span class="p-2 text-white">{{ __('no register appoinment') }}</span>
    @endforelse
</div>

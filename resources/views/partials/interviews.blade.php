
<div>
    <h6 class="mb-3 text-xl font-bold leading-5 text-white">{{ __('interviews') }}</h6>
    @forelse($interviews  as $a)
        <div class="text-sm text-white">
            <span>Doctor: {{ $a->doctor }}</span>
            <br>
            <span>Motivos: {{ $a->suspicion }},</span>
            <br>

            <span>Diagnóstico: {{ $a->diagnosis }},</span>
            <br>
            <span>{{ date('d-m-Y', strtotime($a->date))}},</span>
            <span>{{date('g:i A', strtotime($a->hour)) }},</span>
            <hr>
            <br>
        </div>
    @empty
        <span class="p-2 text-white">{{ __('no register interviews') }}</span>
    @endforelse
</div>

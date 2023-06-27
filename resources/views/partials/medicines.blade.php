<div class="">
    <h6 class="mb-3 text-xl font-bold leading-5 text-white">{{ __('medicines') }}</h6>
    @forelse($medicines  as $items)
    <div class="text-sm text-white">
        <span>Medicamento: {{ $items->name }}</span>
        <div class="border p-4">
        <span>Prescripción: Tomar {{ $items->dose.'   '.$items->dose_unit  }} </span>
        <br>
        <span>Frecuencia: Cada {{ $items->num_frecuency.'   '.$items->frecuency  }} </span>
        <br>
        <span>Duración: Por {{ $items->num_duration.'   '.$items->duration  }} </span>
        <br>
        <span>Instrucciones: Por {{ $items->instruction  }} </span>
        <br>
        <span>{{ date('d-m-Y', strtotime($items->created_at))}},</span>
        <span>{{date('g:i A', strtotime($items->created_at)) }},</span>
        <br>
    </div>

    @empty
        <span class="text-white">{{ __('no register medicines') }}</span>
    @endforelse
</div>

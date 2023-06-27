<div>
    <h6 class="mb-3 text-xl font-bold leading-5 text-white">{{ __('files') }}</h6>
    <ul class=" w-full flex flex-col">
        @forelse($files  as $m)
            <li class="w-full border shadow px-4 py-2">
                <a class="cursor-pointer px-4 py-2 text-gray-500">
                    <figure class="flex justify-between items-center">
                        @if ($m->extension !== 'pdf')
                            <img src="{{ asset($m->url) }}" alt="{{ $m->name }}"
                                class="h-20 w-20 object-cover mx-auto my-3">
                        @else
                            <a href="{{ asset($m->url) }}" target="blak">
                                <img src="{{ asset('assets/pdf.png') }}" alt="{{ $m->name }}"
                                    class="h-20 w-20 object-cover mx-auto my-3 rounded-lg shadow-sm">
                                {{ __('see more...') }}
                            </a>
                        @endif
                        <div class="mx-2">
                            <h1 class="text-gray-800 font-bold text-sm">{{ $m->name }}</h1>
                            <p>{{ Str::limit($m->observation, 50) }}</p>
                        </div>

                    </figure>
                </a>
            </li>
        @empty
            <span class="text-white">{{ __('no register files') }}</span>
        @endforelse
    </ul>
    <div class="bg-transparent p-2 text-sm my-1">
        {{ $files->links() }}
    </div>
</div>

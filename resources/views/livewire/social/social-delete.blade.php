<div>
    <div
        class="w-full text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
        @foreach (auth()->user()->socials as $social)
            <a
                class=" relative inline-flex justify-between w-full px-4 py-2 text-sm font-medium border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">
                <span><i class="{{ $social->type }}" style="color: {{ $social->color }}"></i></span>
                {{ $social->name }}<i wire:click="delete({{ $social->id }})"
                    class="fa-solid fa-eraser cursor-pointer"></i>
            </a>
        @endforeach
    </div>
</div>

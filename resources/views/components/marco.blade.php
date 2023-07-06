<div {{ $attributes->merge(['class'=>'mx-auto sm:px-6 lg:px-8'])}}>
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <h1 class="mt-8 text-2xl font-medium text-gray-900 text-center">
            {{ $titulo }}
        </h1>
        <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
            {{ $slot }}
        </div>
    </div>
</div>

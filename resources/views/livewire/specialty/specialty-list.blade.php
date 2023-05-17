<div class="">
    <div
        class="w-full text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
        @foreach ($specialties as $specialty)
            <button type="button"
                class="relative inline-flex items-center w-full px-4 py-2 text-sm font-medium border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">
                <i class="fa-solid fa-user-doctor float-left text-gray-500 mr-3"></i>
                {{$specialty->name}}
            </button>
        @endforeach
    </div>
</div>

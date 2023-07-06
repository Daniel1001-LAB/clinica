<x-doctor-layout>
    <div class="border p-2 mx-auto max-w-7xl p-8 my-6">
        <h1 class="p-2 bg-indigo-800 items-center text-indigo-100 leading-none mb-2 rounded">Total Patologías :{{ $total }}</h1>
        <div class="grid grid-cols-2 justify-start mx-auto max-w-5xl gap-6">
    @foreach ($data as $d )
    <div class="bg-indigo-900 text-justify py-4 lg:px-4  rounded-md mb-2">
        <div class="p-2 bg-indigo-800 items-center text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
          <span class="flex rounded-full bg-indigo-500 uppercase px-2 py-1 text-xs font-bold mr-3">{{ $d['promedio'] }} %</span>
          <span class="font-semibold mr-2 text-left flex-auto">{{ $d['patologia'] }}</span>
          <svg class="fill-current opacity-75 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.95 10.707l.707-.707L8 4.343 6.586 5.757 10.828 10l-4.242 4.243L8 15.657l4.95-4.95z"/></svg>
        </div>
        <div>
            <ul class="text-sm text-white">

                @foreach ($d['pacientes'] as $p )
                   <li>{{ $p->name }}</li>
                @endforeach
            </ul>
        </div>
      </div>
      @endforeach
    </div>
</div>
</x-doctor-layout>

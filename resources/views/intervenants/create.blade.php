<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Insertion') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{route('intervenants.store')}}" enctype="multipart/form-data" >
                        @csrf
                        <label for="phase" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type</label>
                        <select id="phase" name="phase" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @foreach ($phases as $phase)
                                <option value="{{ $phase->id }}">{{$phase->nom}}</option>
                                @endforeach
                        </select>
                        <h3 style="padding-top: 20px">IMPORTATION</h3>
                        <p>Sélectionnez un fichier Csv (.csv)</p>
                        <input  type="file" name="fichier" >
                        <button type="submit" class="text-yellow-400 hover:text-white border border-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-yellow-300 dark:text-yellow-300 dark:hover:text-white dark:hover:bg-yellow-400 dark:focus:ring-yellow-900">Importer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

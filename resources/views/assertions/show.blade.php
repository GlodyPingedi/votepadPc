<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">

        
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight ">
            {{ __('Assertion') }}
        </h2>
        <a href="{{route('assertions.index')}}" class="text-yellow-400 hover:text-white border border-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-yellow-300 dark:text-yellow-300 dark:hover:text-white dark:hover:bg-yellow-400 dark:focus:ring-yellow-900">
            Retour
        </a>
        </div>
    </x-slot>
    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <div class="p-4">
                        
                        <h2 class="text-4xl font-extrabold dark:text-white">{{$assertionShow->assertion}}</h2>
                        <p class="text-lg font-medium text-gray-900 dark:text-white">Details</span></p>
                        <p class="text-lg font-medium text-gray-900 dark:text-white">Ponderation {{$assertionShow->ponderation}}<span class="italic"></span></p>
                        <p class="text-lg font-medium text-gray-900 dark:text-white">Statut <span class="italic">{{$assertionShow->statut}}</span></p>
                        <p class="text-lg font-medium text-gray-900 dark:text-white">Question associee
                            <span class="italic">
                              {{$assertionShow->question->question}}
                            </span>
                        </p>
                        <a href="{{route('assertions.edit',$assertionShow->id)}}" class="inline-flex items-center text-lg text-blue-600 dark:text-blue-500 hover:underline">
                             Editer
                            <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                            </svg>
                         </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

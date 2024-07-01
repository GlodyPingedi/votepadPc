<x-app-layout>
    <x-slot name="header">
       
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight ">
                {{ __('Reponses') }}
            </h2>
        </div>
        
    </x-slot>
    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                @if (session('success'))
                    <div id="alert-3" class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert" >
                        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                        </svg>
                        <span class="sr-only">Info</span>
                        <div class="ms-3 text-sm font-medium">
                            {{ session('success') }}
                        </div>
                        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-3" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                        </button>
                    </div>
                @endif    
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg gap-2 p-4 grid grid-cols-1 lg:grid-cols-3">
                    <div class="p-6 w-full my-5 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 grid grid-cols-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="justify-self-center items-center md:w-24 lg:w-28 lg:h-28 w-12"  viewBox="0 -960 960 960" fill="#5f6368"><path d="M107-67v-306h120v-160h200v-54H307v-306h346v306H533v54h200v160h120v306H507v-306h120v-54H333v54h120v306H107Zm306-626h134v-94H413v94ZM213-173h134v-94H213v94Zm400 0h134v-94H613v94ZM480-693ZM347-267Zm266 0Z"/></svg>
                        @if (!session('debut'))
                            
                            <div class="justify-self-center items-center">
                                <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Evaluation</h5>
                                <form action="{{route('phasequestion')}}" method="get">
                                    @csrf
                                    @method('get')
                                    <input type="text" name="phase_id" id="" class="hidden" value="3">
                                    <input type="text" name="intervenant_id" id="" class="hidden" value="1">
                                    <input type="text" name="" id="" class="hidden" value="3">
                                    <button type="submit" class="px-3 py-2 w-full text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Demarrer</button>
                                </form>
                            </div>
                        @else
                        <div class="justify-self-center items-center">
                            <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">{{session('phase')->nom}}</h5>
                            <form action="" method="">
                                 @csrf
                                @method('')
                                <input type="text" name="phase_id" id="" class="hidden" value="3">
                                <input type="text" name="intervenant_id" id="" class="hidden" value="3">
                                <input type="text" name="" id="" class="hidden" value="3">
                                
                                <button type="button" class="px-3 py-2 w-full text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Terminer</button>
                            </form>
                        </div>
                       
                        <div >
                            <div id="dropdownTimepicker" class="z-10 my-5  bg-white rounded-lg shadow w-auto dark:bg-gray-700 p-3">
                                <div class="max-w-[16rem] mx-auto grid grid-cols-2 gap-4 mb-2">
                                    <div>
                                        <label for="start-time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Debut</label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none">
                                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z" clip-rule="evenodd"/>
                                                </svg>
                                            </div>
                                            <label id="heure_actuel"  class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            </label>
                                        </div>
                                    </div>
                                    <div>
                                        <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fin dans {{session('phase')->duree}}</label>
                                        <input type="hidden" name="" id="dureeEvaluation" value="{{session('phase')->duree}}">
                                        <div class="relative">
                                            <div class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none">
                                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z" clip-rule="evenodd"/>
                                                </svg>
                                            </div>
                                            <label id="end-time"  class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"/>
                                            <label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
           
                </div>
                    @foreach (session('questionAssetionTab') as $key=> $value )
                    <div class="p-6 my-5 mx-5 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <label>
                        <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#e8eaed"><path d="M186.67-120q-27 0-46.84-19.83Q120-159.67 120-186.67v-168h66.67v168h168V-120h-168Zm586.66 0h-168v-66.67h168v-168H840v168q0 27-19.83 46.84Q800.33-120 773.33-120ZM120-773.33q0-27 19.83-46.84Q159.67-840 186.67-840h168v66.67h-168v168H120v-168Zm720 0v168h-66.67v-168h-168V-840h168q27 0 46.84 19.83Q840-800.33 840-773.33Zm-361.98 530q17.65 0 29.81-12.19Q520-267.7 520-285.35t-12.19-29.82q-12.18-12.16-29.83-12.16t-29.81 12.18Q436-302.96 436-285.31q0 17.64 12.19 29.81 12.18 12.17 29.83 12.17ZM444-393h62.33q0-30.67 9-50t35.34-45.67q33-33 45.83-57.16 12.83-24.17 12.83-53.22 0-52.28-36.74-84.95t-93.26-32.67q-50 0-86.66 24.34Q356-668 339.33-622l57.34 23.67q11.66-26 33.5-41.84Q452-656 479.35-656q30.5 0 48.91 16.5 18.41 16.5 18.41 42.5 0 20-10.5 38.17-10.5 18.16-35.5 41.16-33 31-44.84 56.34Q444-436 444-393Z"/></svg>
                            <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">{{$value['question']['question']}}?</h5>
                        </label>
                        @foreach ($value['assertion'] as $key1=>$assertions )
                        @foreach ( $assertions as $i=>$var)
                        <div class="flex items-center ps-4 my-1 border border-gray-200 rounded dark:border-gray-700">
                            <input id="{{$var->id}}" type="radio" value="{{$var->ponderation}}" name="{{$value['question']['question']}}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="{{$var->id}}" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{$var->assertion}}</label>
                        </div>
                         @endforeach
                        @endforeach
                    </div>   
                          
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </div>
    <script>
        function paddedFormat(num) {
            return num < 10 ? '0' + num : num;
        }

        function startCountDown(duration, element) {
            let secondsRemaining = duration;
            let min = 0;
            let sec = 0;

            let countInterval = setInterval(function() {
                min = parseInt(secondsRemaining / 60);
                sec = parseInt(secondsRemaining % 60);

                element.textContent = `${paddedFormat(min)}:${paddedFormat(sec)}`;
               
                secondsRemaining = secondsRemaining - 1;
                if (secondsRemaining < 0) {
                    clearInterval(countInterval)
                };
            }, 1000);
        }

        window.onload = function() {

            const duree=document.querySelector('#dureeEvaluation');
            var tabHeure= duree.value.split(":");
            const dureeHeure=tabHeure[0];
            const dureeMinute=tabHeure[1];
            const dureeSeconde=tabHeure[2];

            const date= new Date();
            const heure=date.getHours();
            const min=date.getMinutes();
            heure_actu = document.querySelector('#heure_actuel');
            heure_actu.textContent=heure+'h : '+min;

            let time_heure = dureeHeure;   // Value in hours
            let time_minutes = parseInt(dureeMinute) +parseInt(dureeHeure*60);// Value in minutes
            let time_seconds = parseInt(dureeSeconde);  // Value in seconds
            let duration = time_minutes * 60 + time_seconds;

            element = document.querySelector('#end-time');
            element.textContent =`${paddedFormat(time_minutes)}:${paddedFormat(time_seconds)}`;
            startCountDown(--duration, element);

        };
    </script>
</x-app-layout>

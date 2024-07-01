<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight ">
                {{ __('Phase') }}
            </h2>
            <a href="{{route('phases.index')}}" class="text-yellow-400 hover:text-white border border-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-yellow-300 dark:text-yellow-300 dark:hover:text-white dark:hover:bg-yellow-400 dark:focus:ring-yellow-900">
                Retour
            </a>
        </div>
    </x-slot>
    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
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
                    @if (session('echec'))
                        <div id="alert-2" class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                            </svg>
                            <span class="sr-only">Info</span>
                            <div class="ms-3 text-sm font-medium">
                                {{session('echec')}}
                            </div>
                            <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-2" aria-label="Close">
                                <span class="sr-only">Close</span>
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                            </button>
                        </div>
                    @endif
                    <div class="p-4">
                        <div id="accordion-open" data-accordion="open">
                            <h2 id="accordion-open-heading-1">
                                <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-open-body-1" aria-expanded="true" aria-controls="accordion-open-body-1">
                                <span class="flex items-center"><svg class="w-5 h-5 me-2 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg>Afficher details de la phase</span>
                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                                </svg>
                                </button>
                            </h2>
                            <div id="accordion-open-body-1" class="hidden" aria-labelledby="accordion-open-heading-1">
                                <div class="p-5 border border-b border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                                @foreach ($phaseShow as $key=>$item)   
                                    <h2 class="text-4xl font-extrabold dark:text-white">{{$item->nom_phase}}</h2>
                                    <p class="text-lg font-medium text-gray-900 dark:text-white">Description</span></p>
                                    <p class="my-4 text-justify text-gray-500 dark:text-gray-400">{{$item->decrip_phase}}</p>
                                    <p class="text-lg font-medium text-gray-900 dark:text-white">Debut <span class="italic">{{$item->debut_phase}}</span></p>
                                    <p class="text-lg font-medium text-gray-900 dark:text-white">Fin <span class="italic">{{$item->fin_phase}}</span></p>
                                    <p class="text-lg font-medium text-gray-900 dark:text-white">Statut <span class="italic">{{$item->stat_phase}}</span></p>
                                    <p class="text-lg font-medium text-gray-900 dark:text-white">Evenement associé <span class="italic">{{$item->nom_event}} du type {{$item->type_envent}}</span></p>
                                    <a href="{{route('phases.edit',$item->id)}}" class="inline-flex items-center text-lg text-blue-600 dark:text-blue-500 hover:underline">
                                        Editer
                                        <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                        </svg>
                                    </a>
                                @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 p-4">
                        <div class="md:grid grid-cols-1 sm:grid-cols-1 lg:grid-cols-2">
                            <ul id="sortable" class="flex-column space-y space-y-4 text-sm font-medium text-gray-500 dark:text-gray-400 md:me-4 mb-4 md:mb-0">
                                @foreach ($questionAssert as $key=> $item )
                                    <li>
                                        <span class="ui-state-defa inline-flex items-center px-4 py-3 rounded-lg hover:text-gray-900 bg-gray-50 hover:bg-gray-100 w-full dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white">
                                            <svg svg class="w-4 h-4 me-2 text-gray-500 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M480-40q-112 0-206-51T120-227v107H40v-240h240v80h-99q48 72 126.5 116T480-120q75 0 140.5-28.5t114-77q48.5-48.5 77-114T840-480h80q0 91-34.5 171T791-169q-60 60-140 94.5T480-40ZM40-480q0-91 34.5-171T169-791q60-60 140-94.5T480-920q112 0 206 51t154 136v-107h80v240H680v-80h99q-48-72-126.5-116T480-840q-75 0-140.5 28.5t-114 77q-48.5 48.5-77 114T120-480H40Zm440 240q21 0 35.5-14.5T530-290q0-21-14.5-36T480-341q-21 0-35.5 14.5T430-291q0 21 14.5 36t35.5 15Zm-36-152h73q0-36 8.5-54t34.5-44q35-35 46.5-56.5T618-598q0-56-40-89t-98-33q-50 0-86 26t-52 74l66 28q7-26 26.5-43t45.5-17q27 0 45.5 15.5T544-595q0 17-8 34t-34 40q-33 29-45.5 56.5T444-392Z"/></svg>
                                            {{$item['question']}}
                                        </span>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="p-6 bg-gray-50 text-medium text-gray-500 dark:text-gray-400 dark:bg-gray-800 rounded-lg w-full grid gap-6 grid-cols-1 lg:grid-cols-2">
                                <form id="globalform" class="max-w-sm mx-auto col-span-2" action="{{route('questions.store')}}" method="post">
                                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Ajouter une nouvelle question</h3>
                                    <p class="mb-2">Une question a au minimum 2 asserions et chaque assertion doit avoir une ponderation</p>
                                    @csrf
                                    @method('post')
                                    @foreach ($phaseShow as $key=>$item) 
                                        <input type="text" value="{{$item->id}}" name="phase_id" class="hidden">
                                    @endforeach
                                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Enregistrer</button>
                                    <div class="mb-5">
                                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Question</label>
                                        <input type="text" id="email" name="question" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  required />
                                    </div>
                                    <div class="relative mb-5">
                                        <label for="account-id" class="text-sm font-medium text-gray-900 dark:text-white mb-2 block">Ponderation pour cette phase</label>
                                        <input id="account-id" type="number" min="1" max="100" name="ponderation" class="col-span-6 bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    </div>
                                    <div class="mb-5">
                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre d'assertion:</label>
                                        <input type="number" id="N" min="2" max="10" step="1" style="width:4em" 
                                            class="col-span-6 bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            onchange="Chbx();return false;"
                                            required>
                                        <div id="InputFields" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"></div>
                                    </div>
                                </form>
                                <form id="globalform" class="max-w-sm mx-auto hidden" action="{{route('questionPhases.store')}}" method="post">
                                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Ajouter une question déjà existante</h3>
                                    <p class="mb-2 text-red-600">Taper le debut de la question et selectionner la dans la liste de proposition</p>
                                    <p class="mb-2 text-red-600"> Vous devez actualiser sa ponderation pour cette phase</p>
                                        @csrf
                                        @method('post')
                                        @foreach ($phaseShow as $key=>$item) 
                                            <input type="text" value="{{$item->id}}" name="phase_id" class="hidden">
                                        @endforeach
                                    <div class="max-w-sm mx-auto">
                                            <!-- auto complete question -->
                                        <div class="container mt-3">
                                            <!-- For defining autocomplete -->
                                            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selectioner une question</label>
                                            <input type="text" id='employee_search' class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  required />
                                            <!-- For displaying selected option value from autocomplete suggestion -->
                                            <input type="text" id='employeeid' readonly class="hidden" name="question_id">
                                        </div>
                                    </div>
                                    <div class="max-w-sm mx-auto">
                                        <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Attribuer une pondération</label>
                                        <input type="number" name="ponderation" min="1" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    </div>
                                    <button type="submit" class=" w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 my-4 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Enregistrer</button>    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>
    <script>
        //script pour modifier l'ordre de question
        $( function() {
            $( "#sortable" ).sortable();
        } );
    </script>
    <script>
        //script pour ajouter le champ de saisie dynamiquement
        function Chbx() {
            Fields=document.getElementById("InputFields");
            N=document.getElementById("N").value;
            while (Fields.hasChildNodes()) {Fields.removeChild(Fields.lastChild);}
            for (i=0;i<N;i++) {
                Fields.appendChild(document.createTextNode("Assertion " + (i+1)+" "));
                var inputAssertion = document.createElement("input");
                inputAssertion.type = "text";
                inputAssertion.name = `assertions[${i}][name]`;
                inputAssertion.required = true;
                inputAssertion.placeholder="Assertion"
                inputAssertion.className="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500";
                inputAssertion.id = "k" + i;

                var inputPonderation = document.createElement("input");
                inputPonderation.type = "number";
                inputPonderation.name = `assertions[${i}][ponderation]`;
                inputPonderation.required = true;
                inputPonderation.placeholder="Ponderation de l'assertion";
                inputPonderation.min=1;inputPonderation.max=100;inputPonderation.step=1;
                inputPonderation.className="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500";
                inputPonderation.id = "k" + i;

                Fields.appendChild(inputAssertion);
                Fields.appendChild(inputPonderation);
                document.getElementById("k"+i).value="";
                Fields.appendChild(document.createElement("br"));
            }
        }
        Chbx();
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script type="text/javascript">
        //script autocomplete de question
        // CSRF Token
        CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(document).ready(function(){

            $( "#employee_search" ).autocomplete({
                source: function( request, response ) {
                    // Fetch data
                    $.ajax({
                        url:"{{route('auto-question-get')}}",
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: CSRF_TOKEN,
                            search: request.term
                        },
                        success: function( data ) {
                            response( data );
                        }
                    });
                },
                select: function (event, ui) {
                    // Set selection
                    $('#employee_search')
                        .val(ui.item.label)
                        .addClass('bg-gray-200 text-gray-800 font-bold'); // display the selected text
                    $('#employeeid').val(ui.item.value); // save selected id to input
                    return false;
                }
            });

        });
    </script>
</x-app-layout>

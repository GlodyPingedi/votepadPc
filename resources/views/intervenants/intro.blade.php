@extends('layouts.template')

@section('content')
<div class="flex flex-col items-center justify-center min-h-screen px-6 py-8 mx-auto lg:py-0">
    <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
        <h3 class="text-4xl font-extrabold dark:text-white">Bienvenue à cette phase</h3>
        <h2 class="text-4xl font-extrabold dark:text-white">{{$phase->nom}}</h2>
        <p class="mb-4 text-lg font-normal text-gray-500 dark:text-gray-400">{{$phase->description}}</p>
    </div>
</div>
</a>

@endsection
@extends('layouts.app')

@section('slot')
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 flex flex-col justify-center items-center">
                    <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-200 mb-2 text-center">{{ $memory->date }}</h1>
                    <p class="text-gray-700 dark:text-gray-300 mb-6 text-center">{{ $memory->description }}</p>
                    @if ($memory->photo)
                        <div class="mb-6">
                            <img src="{{ asset('storage/' . $memory->photo) }}" alt="Foto da memória" class="w-1/2 h-auto rounded mx-auto">
                        </div>
                    @else
                        <p class="text-gray-500 text-center">Sem imagem</p>
                    @endif
                </div>
                <div class="p-6 bg-white dark:bg-gray-800 text-right">
                    <a href="{{ route('memories.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Voltar</a>
                </div>
            </div>
        </div>
    </div>
@endsection

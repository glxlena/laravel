@extends('layouts.app')

@section('slot')
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800">
                    <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-200 mb-2">{{ $diary->title }}</h1>
                    <p class="text-gray-500 dark:text-gray-400 mb-6">{{ $diary->date }}</p>
                    <div class="text-gray-700 dark:text-gray-300 mb-8">{{ $diary->description }}</div>
                    <div class="text-right">
                        <a href="{{ route('diaries.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

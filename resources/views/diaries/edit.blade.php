@extends('layouts.app')

@section('slot')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800">
                    <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-6 text-center">Editar Registro</h1>

                    <form action="{{ route('diaries.update', $diary->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Título:</label>
                            <input type="text" name="title" id="title" class="form-input mt-1 block w-full" value="{{ $diary->title }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Gostaria de alterar ou adicionar algo ao seu registro?</label>
                            <textarea name="description" id="description" rows="5" class="form-input mt-1 block w-full" required>{{ $diary->description }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label for="date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Data:</label>
                            <input type="date" name="date" id="date" class="form-input mt-1 block w-32 py-1" value="{{ $diary->date }}" required>
                        </div>
                        <a href="{{ route('diaries.index') }}" class="text-blue-500 hover:text-blue-700 mb-4 inline-block">
                            <i class="fas fa-arrow-left"></i> Voltar
                        </a>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Atualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

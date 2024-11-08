@extends('layouts.app')

@section('slot')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800">
                    <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-6 text-center">Adicionar Nova Memória</h1>

                    <form action="{{ route('memories.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Descrição:</label>
                            <textarea name="description" id="description" class="form-input mt-1 block w-full" rows="4" required></textarea>
                        </div>
                        
                        <div class="mb-4">
                            <label for="date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Data:</label>
                            <input type="date" name="date" id="date" class="form-input mt-1 block w-32 py-1">
                        </div>

                        <div class="mb-4">
                            <label for="photo" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Selecionar Imagem:</label>
                            <input type="file" name="photo" id="photo" class="form-input mt-1 block w-full">
                        </div>
                        <a href="{{ route('memories.index') }}" class="text-blue-500 hover:text-blue-700 mb-4 inline-block">
                            <i class="fas fa-arrow-left"></i> Voltar
                        </a>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
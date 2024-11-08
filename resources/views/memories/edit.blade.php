@extends('layouts.app')

@section('slot')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800">
                    <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-6">Editar Memória</h1>

                    <form action="{{ route('memories.update', $memory->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-4">
                            <label for="date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Data:</label>
                            <input type="date" name="date" id="date" class="form-input mt-1 block w-full" value="{{ $memory->date}}" required>
                        </div>
                        
                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Descrição:</label>
                            <textarea name="description" id="description" class="form-input mt-1 block w-full" required>{{ $memory->description }}</textarea>
                        </div>
                        
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Foto Atual:</label>
                            @if ($memory->photo)
                                <img src="{{ asset('storage/' . $memory->photo) }}" alt="Foto da memória" class="w-32 h-32 rounded mt-2">
                                <div class="mt-2">
                                    <input type="checkbox" name="remove_photo" id="remove_photo">
                                    <label for="remove_photo" class="text-sm text-gray-700 dark:text-gray-300">Remover imagem atual</label>
                                </div>
                            @else
                                <p class="text-gray-500 mt-2">Sem imagem.</p>
                            @endif
                        </div>
                        <div class="mb-4">
                            <label for="photo" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Selecionar Nova Imagem:</label>
                            <input type="file" name="photo" id="photo" class="form-input mt-1 block w-full">
                        </div>
                        
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Atualizar</button>
                    </form>                    
                </div>
            </div>
        </div>
    </div>
@endsection

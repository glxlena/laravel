@extends('layouts.app')

@section('slot')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800">
                    <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-6 text-center">Editar Objetivo</h1>

                    <form action="{{ route('goals.update', $goal->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Descrição do Objetivo:</label>
                            <input type="text" name="description" id="description" class="form-input mt-1 block w-full" value="{{ $goal->description }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="priority" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Prioridade:</label>
                            <select name="priority" id="priority" class="form-input mt-1 block w-full" required>
                                <option value="baixa" @if($goal->priority == 'baixa') selected @endif>Baixa</option>
                                <option value="media" @if($goal->priority == 'media') selected @endif>Média</option>
                                <option value="alta" @if($goal->priority == 'alta') selected @endif>Alta</option>
                            </select>
                        </div>
                        <a href="{{ route('goals.index') }}" class="text-blue-500 hover:text-blue-700 mb-4 inline-block">
                            <i class="fas fa-arrow-left"></i> Voltar
                        </a>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Atualizar Objetivo</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

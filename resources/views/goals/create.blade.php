@extends('layouts.app')

@section('slot')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800">
                    <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-6">Adicionar Objetivo</h1>

                    <form action="{{ route('goals.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Descrição:</label>
                            <input type="text" name="description" id="description" class="form-input mt-1 block w-full" required>
                        </div>

                        <div class="mb-4">
                            <label for="priority" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Prioridade:</label>
                            <select name="priority" id="priority" class="form-select mt-1 block w-full" required>
                                <option value="baixa">Baixa</option>
                                <option value="media">Média</option>
                                <option value="alta">Alta</option>
                            </select>
                        </div>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Registrar Objetivo</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

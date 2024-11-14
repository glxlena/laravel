@extends('layouts.app')

@section('slot')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800">
                    <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-6 text-center">Lista de Objetivos</h1>
                    <br>
                    <h3 class="text-1xl font-semibold text-gray-800 dark:text-gray-200 mb-4 text-center">Quais seus objetivos esse mês?</h3>

                    <a href="{{ route('goals.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4">Novo Objetivo</a>

                    <div class="overflow-x-auto">
                        <table class="w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Status</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Descrição</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Prioridade</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Ações</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($goals as $goal)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <form action="{{ route('goals.toggleComplete', $goal->id) }}" method="POST" class="inline-block">
                                                @csrf
                                                <input type="checkbox" name="is_completed" value="1" 
                                                    {{ $goal->is_completed ? 'checked' : '' }} 
                                                    onchange="this.form.submit()" class="cursor-pointer">
                                            </form>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap {{ $goal->is_completed ? 'line-through text-red-500' : '' }}">
                                            {{ $goal->description }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full" 
                                                style="background-color: 
                                                    @if($goal->priority == 'alta') #f87171;
                                                    @elseif($goal->priority == 'media') #fbbf24; 
                                                    @elseif($goal->priority == 'baixa') #4ade80; 
                                                color: white;">
                                                {{ ucfirst($goal->priority) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <a href="{{ route('goals.edit', $goal->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">Editar</a>
                                            <form action="{{ route('goals.destroy', $goal->id) }}" method="POST" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900">Excluir</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

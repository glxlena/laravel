@extends('layouts.app')

@section('slot')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800">
                    <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-6 text-center">Minhas Memórias</h1>
                    <br>
                    <h3 class="text-1xl font-semibold text-gray-800 dark:text-gray-200 mb-4 text-center">O que você gostaria de registrar para ficar de recordação?
                        Conte sobre o que quiser, escolha uma data (importante ou não) e salve uma foto!
                    </h3>

                    <a href="{{ route('memories.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4">Registrar Memória</a>

                    <div class="overflow-x-auto">
                        <table class="w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Descrição</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Data</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Foto</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Ações</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($memories as $memory)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $memory->description }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $memory->date}}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if ($memory->photo)
                                                <img src="{{ asset('storage/' . $memory->photo) }}" alt="Foto da memória" class="w-16 h-16 rounded">
                                            @else
                                                <span class="text-gray-500">Sem imagem</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <a href="{{ route('memories.show', $memory->id) }}" class="text-blue-600 hover:text-blue-900 mr-3">Ver mais</a>
                                            <br>
                                            <a href="{{ route('memories.edit', $memory->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">Editar</a>
                                            <br>
                                            <form action="{{ route('memories.destroy', $memory->id) }}" method="POST" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900">Excluir</button>
                                            </form>
                                        </td>
                                        
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-6 py-4 whitespace-nowrap text-center text-gray-500 dark:text-gray-300">Nenhuma memória encontrada.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

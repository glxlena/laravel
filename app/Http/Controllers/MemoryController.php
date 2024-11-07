<?php

namespace App\Http\Controllers;

use App\Models\Memory;
use Illuminate\Http\Request;

class MemoryController extends Controller
{
    public function index()
    {
        $memories = Memory::all();
        return view('memories.index', compact('memories'));
    }

    public function create()
    {
        return view('memories.create');
    }

    public function store(Request $request)
    {
        Memory::create($request->all());
        return redirect()->route('memories.index')->with('success', 'Memória salva com sucesso!');
    }

    public function edit(Memory $memory)
    {
        return view('memories.edit', compact('memory'));
    }

    public function update(Request $request, Memory $memory)
    {
        $memory->update($request->all());
        return redirect()->route('memories.index')->with('success', 'Memória alterada com sucesso!');
    }

    public function destroy(Memory $memory)
    {
        $memory->delete();
        return redirect()->route('memories.index')->with('success', 'Memória excluída.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Memory;
use Illuminate\Support\Facades\Storage;
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
        $request->validate([
            'photo' => 'nullable|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
            'description' => 'required|string',
            'date' => 'required|date',
        ]);

        $memory = new Memory();
        $memory->description = $request->input('description');
        $memory->date = $request->input('date');

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos', 'public');
            $memory->photo = $path;
        }

        $memory->save();

        return redirect()->route('memories.index')->with('success', 'Memória salva com sucesso!');
    }   


    public function edit(Memory $memory)
    {
        return view('memories.edit', compact('memory'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'photo' => 'nullable|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
            'description' => 'required|string',
            'date' => 'required|date',
        ]);
        $memory = Memory::findOrFail($id);
        $memory->date = $request->input('date');
        $memory->description = $request->input('description');
        
        if ($request->has('remove_photo') && $memory->photo) {
            Storage::disk('public')->delete($memory->photo);
            $memory->photo = null;
        }
        
        if ($request->hasFile('photo')) {
            if ($memory->photo && Storage::disk('public')->exists($memory->photo)) {
                Storage::disk('public')->delete($memory->photo);
            }
            $path = $request->file('photo')->store('photos', 'public');
            if ($path) {
                $memory->photo = $path;
            } else {
                return redirect()->back()->withErrors(['photo' => 'Falha ao fazer upload da nova imagem.']);
            }
        }
        
        $memory->save();

        return redirect()->route('memories.index')->with('success', 'Memória atualizada com sucesso!');
    }


    public function destroy(Memory $memory)
    {
        $memory->delete();
        return redirect()->route('memories.index')->with('success', 'Memória excluída.');
    }
}

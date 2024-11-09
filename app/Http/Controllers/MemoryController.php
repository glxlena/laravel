<?php

namespace App\Http\Controllers;

use App\Models\Memory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemoryController extends Controller
{
    public function index()
    {
        $memories = Memory::where('user_id', Auth::id())->get();
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
        $memory->user_id = Auth::id();
        $memory->description = $request->input('description');
        $memory->date = $request->input('date');

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos', 'public');
            $memory->photo = $path;
        }

        $memory->save();

        return redirect()->route('memories.index')->with('success', 'Memória salva com sucesso!');
    }

    public function show($id)
    {
        $memory = Memory::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        return view('memories.details', compact('memory'));
    }

    public function edit(Memory $memory)
    {
        if ($memory->user_id !== Auth::id()) {
            abort(403);
        }

        return view('memories.edit', compact('memory'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'photo' => 'nullable|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
            'description' => 'required|string',
            'date' => 'required|date',
        ]);

        $memory = Memory::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $memory->description = $request->input('description');
        $memory->date = $request->input('date');

        if ($request->has('remove_photo') && $memory->photo) {
            Storage::disk('public')->delete($memory->photo);
            $memory->photo = null;
        }

        if ($request->hasFile('photo')) {
            if ($memory->photo && Storage::disk('public')->exists($memory->photo)) {
                Storage::disk('public')->delete($memory->photo);
            }
            $path = $request->file('photo')->store('photos', 'public');
            $memory->photo = $path;
        }

        $memory->save();

        return redirect()->route('memories.index')->with('success', 'Memória atualizada com sucesso!');
    }

    public function destroy(Memory $memory)
    {
        if ($memory->user_id !== Auth::id()) {
            abort(403);
        }

        $memory->delete();
        return redirect()->route('memories.index')->with('success', 'Memória excluída.');
    }
}

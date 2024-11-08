<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use Illuminate\Http\Request;

class GoalController extends Controller
{

    public function index()
    {
        $goals = Goal::all();
        return view('goals.index', compact('goals'));
    }

    public function create()
    {
        return view('goals.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string|max:255',
            'priority' => 'required|in:baixa,media,alta',
            'is_completed' => 'nullable|boolean',
        ]);

        Goal::create($request->all());

        return redirect()->route('goals.index')->with('success', 'Objetivo salvo com sucesso!');
    }

    public function edit(Goal $goal)
    {
        return view('goals.edit', compact('goal'));
    }

    public function update(Request $request, Goal $goal)
    {
        $request->validate([
            'description' => 'required|string|max:255',
            'priority' => 'required|in:baixa,media,alta',
            'is_completed' => 'nullable|boolean',
        ]);

        $goal->update($request->all());

        return redirect()->route('goals.index')->with('success', 'Objetivo alterado com sucesso!');
    }

    public function toggleComplete(Goal $goal)
    {
        $goal->is_completed = !$goal->is_completed;
        $goal->save();

        return redirect()->route('goals.index')->with('success', 'Objetivo concluído! Parabéns!');
    }

    public function destroy(Goal $goal)
    {
        $goal->delete();
        return redirect()->route('goals.index')->with('success', 'Objetivo excluído.');
    }
}
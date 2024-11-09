<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GoalController extends Controller
{
    public function index()
    {
        $goals = Goal::where('user_id', Auth::id())->get();
        return view('goals.index', compact('goals'));
    }

    public function create()
    {
        return view('goals.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::id();
        Goal::create($data);

        return redirect()->route('goals.index')->with('success', 'Objetivo salvo com sucesso!');
    }

    public function edit(Goal $goal)
    {
        if ($goal->user_id !== Auth::id()) {
            abort(403);
        }

        return view('goals.edit', compact('goal'));
    }

    public function update(Request $request, Goal $goal)
    {
        if ($goal->user_id !== Auth::id()) {
            abort(403);
        }

        $goal->update($request->all());

        return redirect()->route('goals.index')->with('success', 'Objetivo alterado com sucesso!');
    }

    public function toggleComplete(Goal $goal)
    {
        if ($goal->user_id !== Auth::id()) {
            abort(403);
        }

        $goal->is_completed = !$goal->is_completed;
        $goal->save();

        return redirect()->route('goals.index')->with('success', 'Objetivo concluído! Parabéns!');
    }

    public function destroy(Goal $goal)
    {
        if ($goal->user_id !== Auth::id()) {
            abort(403);
        }

        $goal->delete();
        return redirect()->route('goals.index')->with('success', 'Objetivo excluído.');
    }
}

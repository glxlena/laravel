<?php

namespace App\Http\Controllers;

use App\Models\Diary;
use Illuminate\Http\Request;

class DiaryController extends Controller
{
    public function index()
    {
        $diaries = Diary::paginate(10);
        return view('diaries.index', compact('diaries'));
    }

    public function create()
    {
        return view('diaries.create');
    }

    public function store(Request $request)
    {
        Diary::create($request->all());
        return redirect()->route('diaries.index');
    }

    public function show($id)
    {
        $diary = Diary::findOrFail($id);
        return view('diaries.details', compact('diary'));
    }

    public function edit(Diary $diary)
    {
        return view('diaries.edit', compact('diary'));
    }

    public function update(Request $request, Diary $diary)
    {
        $diary->update($request->all());
        return redirect()->route('diaries.index');
    }

    public function destroy(Diary $diary)
    {
        $diary->delete();
        return redirect()->route('diaries.index');
    }
}

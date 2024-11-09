<?php

namespace App\Http\Controllers;

use App\Models\Diary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiaryController extends Controller
{
    public function index()
    {
        $diaries = Diary::where('user_id', Auth::id())->paginate(10);
        return view('diaries.index', compact('diaries'));
    }

    public function create()
    {
        return view('diaries.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::id();
        Diary::create($data);

        return redirect()->route('diaries.index');
    }

    public function show($id)
    {
        $diary = Diary::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        return view('diaries.details', compact('diary'));
    }

    public function edit(Diary $diary)
    {
        if ($diary->user_id !== Auth::id()) {
            abort(403);
        }

        return view('diaries.edit', compact('diary'));
    }

    public function update(Request $request, Diary $diary)
    {
        if ($diary->user_id !== Auth::id()) {
            abort(403);
        }

        $diary->update($request->all());
        return redirect()->route('diaries.index');
    }

    public function destroy(Diary $diary)
    {
        if ($diary->user_id !== Auth::id()) {
            abort(403);
        }

        $diary->delete();
        return redirect()->route('diaries.index');
    }
}

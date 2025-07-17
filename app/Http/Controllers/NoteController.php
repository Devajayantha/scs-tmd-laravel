<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class NoteController extends Controller
{
    /**
     * Display a listing of the notes.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $notes = Note::with('user')
            ->where('user_id', FacadesAuth::id())
            ->when($request->filled('q'), function ($query) use ($request) {
                $query->where('title', 'like', '%' . $request->q . '%');
            })
            ->latest()
            ->paginate(10);

        return view('layouts.pages.notes.index', compact('notes'));
    }

    /**
     * Show the form for creating a new note.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('layouts.pages.notes.create');
    }

    /**
     * Store a newly created note in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Note::create([
            'user_id' => FacadesAuth::id(),
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('notes.index')->with('success', 'Note created successfully.');
    }

    /**
     * Show the form for creating a new note.
     *
     * @return \Illuminate\View\View
     */
    public function show(Note $note)
    {
        return view('layouts.pages.notes.show', compact('note'));
    }

    /**
     * Show the form for editing the specified note.
     *
     * @param \App\Models\Note $note
     * @return \Illuminate\View\View
     */
    public function edit(Note $note)
    {
        return view('layouts.pages.notes.edit', compact('note'));
    }

    /**
     * Update the specified note in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Note $note
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Note $note)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $note->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('notes.index')->with('success', 'Note updated successfully.');
    }

    /**
     * Remove the specified note from storage.
     *
     * @param \App\Models\Note $note
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Note $note)
    {
        $note->delete();

        return redirect()->route('notes.index')->with('success', 'Note deleted successfully.');
    }
}

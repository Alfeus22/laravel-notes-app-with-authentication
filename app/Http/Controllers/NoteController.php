<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index(){
        $notes = auth()->user()->notes;
        return view ('notes.index',compact('notes'));
    }

    public function create(){
        return view ('notes.create');
    }
    public function store(Request $request){
        $request->validate([
            'title'=>'required',
            'content'=>'required'
        ]);
        auth()->user()->notes()->create($request->all());

        return redirect()
        ->route('notes.index')
        ->with('success','berhasil menambahkan data');
        
    }

    public function edit(Note $note){
        $this->authorize('update',$note); 
        return view('notes.edit',compact('note'));
    }

    public function update(Request $request, Note $note){
        $this->authorize('update',$note);
        $request->validate([
            'title'=>'required',
            'content'=>'required'
        ]);

        $note->update($request->all());
        return redirect()->route('notes.index');
    }

    public function destroy(Note $note){
        $this->authorize('delete',$Note);
        
        $note->delete();
        return redirect()->route('notes.index');

    }
}

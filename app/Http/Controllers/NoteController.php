<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index(Request $request){
        $query = auth()->user()->notes();

        if($request->search){
            $query->where('title','like','%'.$request->search.'%')
            ->orWhere('content','like','%'.$request->search.'%');
        }


        $notes = $query->latest()->get();
        return view ('notes.index',compact('notes'));
    }

    public function create(){
        return view ('notes.create');
    }
    public function store(Request $request){
        
        $validated= $request->validate([
            'title'=>'required|min:3',
            'content'=>'required|min:5'
        ]);
        auth()->user()->notes()->create($validated);

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
        $validated  = $request->validate([
            'title'=>'required',
            'content'=>'required'
        ]);

        $note->update($validated);
        return redirect()
        ->route('notes.index')
        ->with('success','berhasil mengubah data');
    }

    public function destroy(Note $note){
        $this->authorize('delete',$note);
        
        $note->delete();
        return redirect()->route('notes.index');

    }
}

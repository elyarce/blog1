<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entry;

class EntryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        return view('entries.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|min:7|max:60|unique:entries',
            'content' => 'required|min:25|max:3000'
        ]);
        //dd($request->all());
        $entry = new Entry();
        $entry->title = $validatedData['title'];
        $entry->content = $validatedData['content'];
        $entry->user_id = auth()->id();
        $entry->save(); //insert
    
        $status = 'su entrada ha sido publicada correctamente';
        return back()->with(compact('status'));
    }    

    public function edit(Entry $entry)
    {
        //return view('entries.edit', compact('entry'));
        return view('entries.edit', ['entry' => $entry]);
    }    

    public function update(Request $request, Entry $entry)
    {
        $validatedData = $request->validate([
            'title' => 'required|min:7|max:60',
            'content' => 'required|min:25|max:3000'
        ]);
         //,id,'.$entry->id,
        //dd($request->all());

        //Tarea pendiente: permitir editar solamente al autor
        $entry->title = $validatedData['title'];
        $entry->content = $validatedData['content'];
        $entry->save(); //update
    
        $status = 'su entrada ha sido actualizada correctamente';
        return back()->with(compact('status'));
    }    

}

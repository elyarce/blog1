<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entry;

class GuestController extends Controller
{
    public function index()
    {
        $entries = Entry::with('user')
            ->orderByDesc('created_at')
            ->orderByDesc('id')
            ->paginate(10);
        //return view('welcome', compact('entries'));
        return view('welcome', ['entries' => $entries]);
    }

    public function show(Entry $entry)
    {
/*         $entry = Entry::where('id', )
            ->orderByDesc('created_at')
            ->orderByDesc('id')
            ->paginate(10); */
            //->get();
        //return view('entries.show', compact('entry'));
        return view('entries.show', ['entry' => $entry]);
    }    
}

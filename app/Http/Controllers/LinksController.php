<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;

class LinksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view('home');
    }

    public function viewCriar()
    {
        return view('criar');
    }

    public function criar(Request $request)
    {
        $request->validate([
            'url' => 'required|url',
            'slug' => 'nullable|string|unique:links'
        ]);

        $link = new Link();
        $link->url = $request->input('url');
        $link->slug = $request->input('slug');
        $link->save();

        return redirect('/criar')->with('success', 'Link criado com sucesso!');
    }
}

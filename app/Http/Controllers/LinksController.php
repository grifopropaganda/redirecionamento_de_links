<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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

        $slug = Str::slug($request->slug);

        $existingLink = Link::where('slug', $slug)->first();

        if ($existingLink) {
            return redirect('/criar')->with('error', 'Slug já existe. Por favor, escolha outro.');
        }

        $link = new Link();
        $link->url = $request->input('url');
        $link->slug = $slug;
        $link->save();

        return redirect('/criar')->with('success', 'Link criado com sucesso!');
    }
}

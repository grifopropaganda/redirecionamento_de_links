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
        $links = Link::latest()->get();

        return view('home', [
            'links' => $links
        ]);
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
            return redirect('/')->with('error', 'Slug já existe. Por favor, escolha outro.');
        }

        $link = new Link();
        $link->url = $request->input('url');
        $link->slug = $slug;
        $link->save();

        return redirect('/')->with('success', 'Link criado com sucesso! Copie-o: ' . ENV('APP_URL') . '/link/' . $slug);
    }

    public function editarView($id)
    {
        $link = Link::find($id);
        return view('editar', [
            'link' => $link
        ]);
    }

    public function editar(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'url' => 'required|url',
            'slug' => 'string'
        ]);

        $id = $request->id;
        $url = $request->url;
        $link = Link::find($id);
        $slug = Str::slug($request->slug);

        if($url != $link->url) {
            $link->update([
                'url' => $request->url
            ]);
        }

        if($slug != $link->slug) {
            $existingLink = Link::where('slug', $slug)->first();

            if ($existingLink) {
                return back()->with('error', 'Slug já existe. Por favor, escolha outro.');
            } else {
                $link->update([
                    'slug' => $slug
                ]);
            }
        }

        return redirect('/editar/'. $id)->with('success', 'Link atualizado com sucesso!');
    }

    public function excluir($id)
    {
        $link = Link::find($id);

        if (!$link) {
            return redirect('/')->with('error', 'Link não encontrado.');
        }

        $link->delete();

        return redirect('/')->with('success', 'Link excluído com sucesso.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function redirect($slug)
    {
        $link = Link::where('slug', $slug)->first();

        if ($link) {
            return redirect($link->url);
        } else {
            return redirect('/')->with('error', 'Link não encontrado.');
        }
    }
}

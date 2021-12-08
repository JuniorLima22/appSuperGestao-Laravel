<?php

namespace App\Http\Controllers;

use App\SiteContato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function index()
    {
        return view('site.contato');
    }

    public function store(Request $request)
    {
        $contato = new SiteContato();
        $contato->fill($request->all());
        $contato->save();

        return view('site.contato');
    }
}

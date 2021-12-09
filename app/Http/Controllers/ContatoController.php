<?php

namespace App\Http\Controllers;

use App\MotivoContato;
use App\SiteContato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function index()
    {
        $motivo_contatos = MotivoContato::all();
        return view('site.contato', compact('motivo_contatos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|min:3|max:40',
            'telefone' => 'required',
            'email' => 'required|email',
            'motivo_contato' => 'required',
            'mensagem' => 'required|max:200',
        ]);
        
        $contato = new SiteContato();
        $contato->fill($request->all());
        $contato->save();

        return view('site.contato');
    }
}

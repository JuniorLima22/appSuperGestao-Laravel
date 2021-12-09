<?php

namespace App\Http\Controllers;

use App\MotivoContato;
use App\SiteContato;
use Session;
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
        $request->validate(
            [
                'nome' => 'required|min:3|max:40',
                'telefone' => 'required',
                'email' => 'email',
                'motivo_contatos_id' => 'required',
                'mensagem' => 'required|max:2000',
            ],
            [
                'nome.min' => 'O nome deve ter pelo menos 3 caracteres.',
                'nome.max' => 'O nome não pode ter mais de 40 caracteres.',
                'email' => 'O email deve ser um endereço de email válido.',
                'motivo_contatos_id.required' => 'Campo motivo precisa ser preenchido',
                'mensagem.max' => 'A mensagem não pode ter mais de 2000 caracteres.',
                'required' => 'Campo :attribute precisa ser preenchido',
            ]
        );
        
        $contato = new SiteContato();
        $contato->fill($request->all());
        
        if ($contato->save()) {
            Session::flash('mensagem', 'Mensagem enviada com sucesso!');
            Session::flash('tipo', 'success');
        }else{
            Session::flash('mensagem', 'Erro ao enviar mensagem!');
        }
        return back();
    }
}

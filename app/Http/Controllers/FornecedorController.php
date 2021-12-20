<?php

namespace App\Http\Controllers;

use App\Fornecedor;
use Illuminate\Http\Request;
use Session;

class FornecedorController extends Controller
{
    public function index()
    {
        $fornecedores = Fornecedor::get()->toArray();
        return view('app.fornecedor.index');
    }

    public function listar()
    {
        return view('app.fornecedor.listar');
    }

    public function adicionar()
    {
        return view('app.fornecedor.adicionar');
    }

    public function gravar(Request $request)
    {
        $request->validate(
            [
                'nome' => 'required|min:3|max:40',
                'site' => 'required',
                'uf' => 'required|size:2',
                'email' => 'email',
            ],
            [
                'nome.min' => 'O nome deve ter pelo menos 3 caracteres.',
                'nome.max' => 'O nome não pode ter mais de 40 caracteres.',
                'uf.size' => 'A campo uf deve ter 2 caracteres.',
                'email' => 'O email deve ser um endereço de email válido.',
                'required' => 'Campo :attribute deve ser preenchido',
            ]
        );

        $fornecedor = new Fornecedor();
        $fornecedor->create($request->all());
        Session::flash('mensagem', 'Fornecedor cadastrado com sucesso.');
        Session::flash('tipo', 'success');
        return redirect()->route('app.fornecedor.adicionar');
    }
}

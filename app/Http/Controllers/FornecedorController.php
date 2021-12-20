<?php

namespace App\Http\Controllers;

use App\Fornecedor;
use Illuminate\Http\Request;
use Session;

class FornecedorController extends Controller
{
    protected $fornecedor;

    function __construct(Fornecedor $fornecedor)
    {
        $this->fornecedor = $fornecedor;
    }
    
    public function index()
    {
        return view('app.fornecedor.index');
    }

    public function listar(Request $request)
    {
        $fornecedores = $this->fornecedor::where('nome', 'like', "%{$request->nome}%")
        ->where('site', 'like', "%{$request->site}%")
        ->where('uf', 'like', "%{$request->uf}%")
        ->where('email', 'like', "%{$request->email}%")
        ->get();
        return view('app.fornecedor.listar', compact('fornecedores'));
    }

    public function adicionar()
    {
        return view('app.fornecedor.adicionar');
    }

    public function gravar(Request $request)
    {
        $this->validarFormulario($request);

        $fornecedor = $this->fornecedor;
        $fornecedor->create($request->all());
        Session::flash('mensagem', 'Fornecedor cadastrado com sucesso.');
        Session::flash('tipo', 'success');
        return redirect()->route('app.fornecedor.adicionar');
    }

    public function editar($id)
    {
        $fornecedor = $this->fornecedor::findOrFail($id);
        return view('app.fornecedor.editar', compact('fornecedor'));
    }

    public function atualizar(Request $request, $id)
    {
        $this->validarFormulario($request);
        $fornecedor = $this->fornecedor::findOrFail($id)->update($request->all());

        if ($fornecedor) {
            Session::flash('mensagem', 'Fornecedor atualizado com sucesso.');
            Session::flash('tipo', 'success');
            return redirect()->back();
        }

        Session::flash('mensagem', 'Erro ao atualizar fornecedor.');
        return redirect()->back();
    }

    private function validarFormulario($request)
    {
        $id = $request->id;
        
        return $request->validate(
            [
                'nome' => "required|min:3|max:40|unique:fornecedores,nome,{$id},id",
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
                'unique' => 'Campo :attribute já foi obtido.'
            ]
        );
    }
}

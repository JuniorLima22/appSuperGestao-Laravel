<?php

namespace App\Http\Controllers;

use App\Item;
use App\Produto;
use App\Unidade;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dataForm = $request->except('_token');
        
        $produtos = Item::with('itemDetalhe')->paginate(5);

        return view('app.produto.index', compact('produtos', 'dataForm'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidades = Unidade::all();
        return view('app.produto.create', compact('unidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validarFormulario($request);

        $produto = Produto::create($request->all());

        if ($produto) {
            session()->flash('mensagem', 'Produto cadastrado com sucesso.');
            session()->flash('tipo', 'success');
            return redirect()->back();
        }

        session()->flash('mensagem', 'Erro ao cadastrar produto.');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        return view('app.produto.show', compact('produto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        $unidades = Unidade::all();
        return view('app.produto.edit', compact('produto', 'unidades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto)
    {
        $this->validarFormulario($request);
        
        $produto = $produto->update($request->all());

        if ($produto) {
            session()->flash('mensagem', 'Produto atualizado com sucesso.');
            session()->flash('tipo', 'success');
            return redirect()->back();
        }
        
        session()->flash('mensagem', 'Erro ao atualizar produto.');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        $produto = $produto->delete();

        if ($produto) {
            session()->flash('mensagem', 'Produto exluido com sucesso.');
            session()->flash('tipo', 'success');
            return redirect()->back();
        }

        session()->flash('mensagem', 'Erro ao exluir produto.');
        return redirect()->back();
    }

    private function validarFormulario($request)
    {
        return $request->validate(
            [
                'nome' => "required|min:3|max:40",
                'descricao' => 'required|min:3|max:200',
                'peso' => 'required|integer',
                'unidade_id' => 'required|exists:unidades,id',
            ],
            [
                'required' => 'Campo :attribute deve ser preenchido',
                'nome.min' => 'O nome deve ter pelo menos 3 caracteres.',
                'nome.max' => 'O nome não pode ter mais de 40 caracteres.',
                'descricao.min' => 'A descrição deve ter pelo menos 3 caracteres.',
                'descricao.max' => 'A descrição não pode ter mais de 200 caracteres.',
                'peso.integer' => 'O campo peso deve ser um número inteiro.',
                'unidade_id.required' => 'Campo unidade deve ser selecionado',
                'unidade_id.exists' => 'A unidade de medida informada não existe.',
            ]
        );
    }
}

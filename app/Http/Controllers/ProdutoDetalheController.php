<?php

namespace App\Http\Controllers;

use App\ItemDetalhe;
use App\ProdutoDetalhe;
use App\Unidade;
use Illuminate\Http\Request;

class ProdutoDetalheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidades = Unidade::all();
        return view('app.produto_detalhe.create', compact('unidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $produtoDetalhe = ProdutoDetalhe::create($request->all());

        if ($produtoDetalhe) {
            session()->flash('mensagem', 'Detalhes do produto cadastrado com sucesso.');
            session()->flash('tipo', 'success');
            return redirect()->back();
        }

        session()->flash('mensagem', 'Erro ao cadastrar destalhes do produto.');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  integer $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produto_detalhe = ItemDetalhe::find($id);
        $unidades = Unidade::all();
        return view('app.produto_detalhe.edit', compact('produto_detalhe', 'unidades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProdutoDetalhe $produto_detalhe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProdutoDetalhe $produto_detalhe)
    {
        $produtoDetalhe = $produto_detalhe->update($request->all());

        if ($produtoDetalhe) {
            session()->flash('mensagem', 'Detalhes do produto atualizado com sucesso.');
            session()->flash('tipo', 'success');
            return redirect()->back();
        }
        
        session()->flash('mensagem', 'Erro ao atualizar detalhes do produto.');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

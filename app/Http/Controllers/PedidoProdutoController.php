<?php

namespace App\Http\Controllers;

use App\Pedido;
use App\PedidoProduto;
use App\Produto;
use Illuminate\Http\Request;

class PedidoProdutoController extends Controller
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
    public function create($id)
    {
        $pedido = Pedido::with('produtos')->findOrFail($id);
        $produtos = Produto::all();
        return view('app.pedido_produto.create', compact('pedido', 'produtos'));
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

        /** Inserindo registros por meio do relacionamento */
        
        // $pedido = Pedido::find($request->get('pedido_id'));
        // $pedidoProduto = $pedido->produtos()->attach(
        //     $request->get('produto_id'),
        //     ['quantidade' => $request->get('quantidade')]
        // );
        
        $pedidoProduto = new PedidoProduto();
        $pedidoProduto->pedido_id = $request->get('pedido_id');
        $pedidoProduto->produto_id = $request->get('produto_id');
        $pedidoProduto->quantidade = $request->get('quantidade');

        if ($pedidoProduto->save()) {
            session()->flash('mensagem', 'Produto adicionado ao pedido com sucesso.');
            session()->flash('tipo', 'success');
            return redirect()->back();
        }

        session()->flash('mensagem', 'Erro ao adicionar produto ao pedido.');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

    private function validarFormulario($request)
    {
        return $request->validate(
            [
                'pedido_id' => 'required|exists:pedidos,id',
                'produto_id' => 'required|exists:produtos,id',
                'quantidade' => 'required|integer',
            ],
            [
                'pedido_id.required' => 'Campo pedido deve ser selecionado.',
                'pedido_id.exists' => 'O pedido informado não existe.',
                'produto_id.required' => 'Campo produto deve ser preenchido.',
                'produto_id.exists' => 'O produto informado não existe.',
                'quantidade.required' => 'Campo quantidade deve ser preenchido.',
                'quantidade.integer' => 'Campo quantidade deve ser um número inteiro.'
            ]
        );
    }
}

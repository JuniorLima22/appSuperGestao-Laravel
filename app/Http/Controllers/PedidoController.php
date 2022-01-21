<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dataForm = $request->except('_token');
        
        $pedidos = Pedido::paginate(10);
        return view('app.pedido.index', compact('pedidos', 'dataForm'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Cliente::all();
        return view('app.pedido.create', compact('clientes'));
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
        
        $pedido = Pedido::create($request->all());

        if ($pedido) {
            session()->flash('mensagem', 'Pedido cadastrado com sucesso.');
            session()->flash('tipo', 'success');
            return redirect()->back();
        }

        session()->flash('mensagem', 'Erro ao cadastrar pedido.');
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
                'cliente_id' => 'required|exists:clientes,id',
            ],
            [
                'required' => 'Campo cliente deve ser preenchido',
                'cliente_id.exists' => 'O cliente informado não existe.',
            ]
        );
    }
}

<?php

namespace App\Http\Controllers;

use App\Fornecedor;
use Illuminate\Http\Request;

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
}

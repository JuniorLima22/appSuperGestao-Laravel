<?php

namespace App\Http\Controllers;

use App\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index()
    {
        $fornecedores = Fornecedor::get()->toArray();
        dump($fornecedores);
        return 'Route Fornecedores';
    }
}

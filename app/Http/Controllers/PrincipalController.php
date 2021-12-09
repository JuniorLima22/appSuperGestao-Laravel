<?php

namespace App\Http\Controllers;

use App\MotivoContato;
use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function index()
    {
        $motivo_contatos = MotivoContato::all();
        return view('site.principal', compact('motivo_contatos'));
    }

    public function sobreNos()
    {
        return view('site.sobre-nos');
    }
}

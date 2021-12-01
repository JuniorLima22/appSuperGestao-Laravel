<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function index()
    {
        return view('site.principal');
    }

    public function sobreNos()
    {
        return view('site.sobre-nos');
    }

    public function contato()
    {
        return view('site.contato');
    }
}

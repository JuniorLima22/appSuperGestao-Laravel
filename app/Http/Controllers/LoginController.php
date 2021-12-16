<?php

namespace App\Http\Controllers;

use App\User;
use Session;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('site.login');
    }

    public function autenticar(Request $request)
    {
        $request->validate(
            [
                'usuario' => 'email',
                'senha' => 'required',
            ],
            [
                'email' => 'O email deve ser um endereço de email válido.',
                'senha.required' => 'O campo senha é obrigatório',
            ]
        );

        $email = $request->get('usuario');
        $password = $request->get('senha');

        $user = new User();
        $usuario = $user->where('email', $email)->where('password', $password)->first();

        if (isset($usuario->name)) {
            Session(['nome' => $usuario->name, 'email'=> $usuario->email]);
            return redirect()->route('app.home');
        }else{
            Session::flash('mensagem', 'Usuário e ou senha não existe.');
            return back();
        }
    }

    public function sair()
    {
        return 'sair';
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use PhpParser\Node\Stmt\Echo_;
use Session;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $metodo_autenticacao, $perfil)
    {
        // Verifica se o usuário possui acesso a rota
        if (Session::has('email')) {
            return $next($request);
        }else{
            Session::flash('mensagem', 'Necessário realizar login para ter acesso a página');
            return redirect()->route('site.login');
        }
    }
}

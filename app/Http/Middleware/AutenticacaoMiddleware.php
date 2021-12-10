<?php

namespace App\Http\Middleware;

use Closure;
use PhpParser\Node\Stmt\Echo_;

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
        if ($metodo_autenticacao == 'padrao') {
            echo 'Verificar usuário e senha no banco de dados. <br>';
        }

        if ($metodo_autenticacao == 'ldap') {
            echo 'Verificar o usuário e senha no AD. <br>';
        }

        if ($perfil == 'visitante') {
            echo 'Exibir apenas alguns recursos. <br>';
        }else{
            echo 'Carrega o perfil do banco de dados. <br>';
        }
        
        // Verifica se o usuário possui acesso a rota
        if (true) {
            return $next($request);
        }else{
            return Response('Acesso negado! Rota exige autenticação!!!');
        }
    }
}

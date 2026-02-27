<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
 /*    public function handle(Request $request, Closure $next): Response
    {
        return $next($request);

        
    } */
    public function handle(Request $request, Closure $next, $role)
    {
        // Verificar se o usuário possui o papel necessário
        if ($request->user() && $request->user()->hasRole($role)) {
            return $next($request);
        }

        // Redirecionar ou retornar uma resposta de erro, dependendo da sua necessidade
        return redirect('/')->with('error', 'Você não tem permissão para acessar esta rota.');
    }

    
}

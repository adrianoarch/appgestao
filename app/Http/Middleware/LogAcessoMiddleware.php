<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\LogAcesso;

class LogAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $ip = $request->ip();
        $uri = $request->getRequestUri();
        // dd($ip, $uri);
        $log = "O IP $ip requisitou a rota $uri";
        LogAcesso::create(['log' => $log]);
        
        // return $next($request);

        $resposta = $next($request);

        // dd($resposta);

        $resposta->headers->set('X-Developer', 'Adriano de Oliveira');
        return $resposta;
    }
}
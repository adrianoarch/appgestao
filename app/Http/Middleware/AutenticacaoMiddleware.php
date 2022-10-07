<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $metodo_autenticacao)
    {
       session_start();
    //    dd($_SESSION);

         if(isset($_SESSION['nome']) && $_SESSION['nome'] != ''){
             return $next($request);
         }
         else{
             return redirect()->route('site.login', ['erro' => 2]);
         }
    }
}
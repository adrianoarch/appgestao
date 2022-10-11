<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function index(Request $request){
        $erro = '';
        
        if($request->get('erro') == 1){
            echo 'Usuário não existe';
        }
        if($request->get('erro') == 2){
            $erro = 'Você precisa estar logado no sistema para acessar esta página';
        }
        return view('site.login', ['titulo' => 'Login', 'erro' => $erro]);
    }

    public function autenticar(Request $request){
        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];
        
        $feedback = [
            'usuario.email' => 'O campo usuário precisa ser um e-mail válido',
            'senha.required' => 'O campo senha é obrigatório'
        ];
        
        $request->validate($regras, $feedback);
        
        $usuario = $request->input('usuario');
        $senha = $request->input('senha');

        $user = new User();
        $verificaUsuario = $user
            ->where('email', $usuario)
            ->where('password', $senha)
            ->get()
            ->first();

        if(isset($verificaUsuario->name)){
            session_start();
            $_SESSION['nome'] = $verificaUsuario->name;
            $_SESSION['email'] = $verificaUsuario->email;
            return redirect()->route('app.home');
        }
        else{
            return redirect()->route('site.login')->with('erro', 'Usuário ou senha inválidos');
        }

        // return redirect()->route('site.login');

    }

    public function sair(){
        session_destroy();
        return redirect()->route('site.index');
    }
}
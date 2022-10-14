<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedor;

class FornecedorController extends Controller
{
    public function index() {
        
        return view('app.fornecedor.index');
    }

    public function listar(Request $request) {

        $fornecedores = Fornecedor::where('nome', 'like', '%'.$request->input('nome') .'%')
            ->where('site', 'like', '%'.$request->input('site').'%')
            ->where('uf', 'like', '%'.$request->input('uf').'%')
            ->where('email', 'like', '%'.$request->input('email').'%')
            ->get();

        return view('app.fornecedor.listar', compact('fornecedores'));
    }

    public function adicionar(Request $request) {

        $msg = '';

        if($request->input('_token') != '' && $request->method() == 'POST' && $request->input('id') == '') {
            $regras = [
                'nome' => 'required|min:3|max:40',
                'site' => 'required|url',
                'uf' => 'required|size:2',
                'email' => 'required|email',
            ];

            $feedback = [
                'required' => 'O campo :attribute deve ser preenchido',
                'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres',
                'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
                'uf.size' => 'O campo UF deve ter 2 caracteres',
                'email.email' => 'O campo email deve ter um email válido',
                'site.url' => 'O campo site deve ter uma url válida',
            ];

            $request->validate($regras, $feedback);

            $fornecedor = $request->all();
            Fornecedor::create($fornecedor);

            $msg = 'Fornecedor cadastrado com sucesso!';
        }

        if($request->input('_token') != '' && $request->method() == 'POST' && $request->input('id') != ''){
            $fornecedor = Fornecedor::find($request->input('id'));
            $fornecedor->update($request->all());

            $msg = 'Fornecedor atualizado com sucesso!';
        }
        return view('app.fornecedor.adicionar', ['msg' => $msg]);
    }

    public function editar($id, Request $request) {
        $fornecedor = Fornecedor::find($id);

        return view('app.fornecedor.adicionar', compact('fornecedor'));
    }
}
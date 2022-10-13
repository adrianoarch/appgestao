<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index() {
        
        return view('app.fornecedor.index');
    }

    public function listar(Request $request) {
        // $fornecedores = [
        //     0 => ['nome' => 'Fornecedor 1', 'status' => 'N'],
        //     1 => ['nome' => 'Fornecedor 2', 'status' => 'S'],
        //     2 => ['nome' => 'Fornecedor 3', 'status' => 'N'],
        //     3 => ['nome' => 'Fornecedor 4', 'status' => 'S'],
        //     4 => ['nome' => 'Fornecedor 5', 'status' => 'N'],
        //     5 => ['nome' => 'Fornecedor 6', 'status' => 'S'],
        //     6 => ['nome' => 'Fornecedor 7', 'status' => 'N'],
        //     7 => ['nome' => 'Fornecedor 8', 'status' => 'S'],
        //     8 => ['nome' => 'Fornecedor 9', 'status' => 'N'],
        //     9 => ['nome' => 'Fornecedor 10', 'status' => 'S'],
        // ];

        // $fornecedores = $this->arrayPaginator($fornecedores, $request->por_pagina);

        return view('app.fornecedor.listar');
    }

    public function adicionar() {
        return view('app.fornecedor.adicionar');
    }
}
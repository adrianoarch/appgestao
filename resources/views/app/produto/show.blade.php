@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
   
   <div class="conteudo-pagina">

      <div class="titulo-pagina-2">
         <p>Visualizar Produto</p>
      </div>

      <div class="menu">
         <ul>
            
            <li><a href="{{ route("produto.index") }}">Voltar</a></li>
            <li><a href="#">Consulta</a></li>

         </ul>
      </div>

      <div class="informacao-pagina">
         <div style="width: 30%; margin-left: auto; margin-right: auto;">
            <table border="1" width="80%" style="text-align: left">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Peso</th>
                        <th>Unidade ID</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $produto->nome }}</td>
                        <td>{{ $produto->descricao }}</td>
                        <td>{{ $produto->peso }} kg</td>
                        <td>{{ $produto->unidade_id }}</td>
                    </tr>
                </tbody>
            </table>
         </div>
      </div>

   </div>
@endsection
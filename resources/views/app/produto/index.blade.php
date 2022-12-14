@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
   
   <div class="conteudo-pagina">

      <div class="titulo-pagina-2">
         <p>Listagem de produtos</p>
      </div>

      <div class="menu">
         <ul>            
            <li><a href="{{ route('produto.create') }}">Novo</a></li>
            <li><a href="#">Consulta</a></li>
         </ul>
      </div>

      @if(Session::has('mensagem'))
         <div class="alert alert-success">{{ Session::get('mensagem') }}</div>
      @endif

      <div class="informacao-pagina">
         <div style="width: 80%; margin-left: auto; margin-right: auto;">
            {{-- {{ $produtos->toJson() }} --}}
            <table border="1" width="100%">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Fornecedor</th>
                        <th>Peso</th>
                        <th>Unidade ID</th>
                        <th>Comprimento</th>
                        <th>Largura</th>
                        <th>Altura</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produtos as $produto)
                        <tr>
                            <td>{{ $produto->nome }}</td>
                            <td>{{ $produto->descricao }}</td>
                            <td>{{ $produto->fornecedor->nome }}</td>
                            <td>{{ $produto->peso }}</td>
                            <td>{{ $produto->unidade_id }}</td>
                            <td>{{ $produto->itemDetalhe->comprimento ?? '' }}</td>
                            <td>{{ $produto->itemDetalhe->largura ?? '' }}</td>
                            <td>{{ $produto->itemDetalhe->altura ?? '' }}</td>
                            <td><a href="{{ route('produto.show', $produto->id) }}">Visualizar</a></td>
                            <td><a href="{{ route('produto.edit', $produto->id) }}">Editar</a></td>
                            <td>
                              <form id="form_{{ $produto->id }}" action="{{ route('produto.destroy', $produto->id) }}" method="POST">
                                 @csrf
                                 @method('DELETE')
                                    <a href="#" onclick="document.getElementById('form_{{ $produto->id }}').submit()">Excluir</a>
                              </form>
                           </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $produtos->appends($request)->links() }}
            {{-- {{ $produtos->count() }} - {{ $produtos->total() }} - {{ $produtos->firstItem() }} - {{ $produtos->lastItem() }} --}}
         </div>
      </div>

   </div>
@endsection
@extends('app.layouts.basico')

@section('titulo', 'Cliente')

@section('conteudo')
   
   <div class="conteudo-pagina">

      <div class="titulo-pagina-2">
         <p>Fornecedor - Listagem</p>
      </div>

      <div class="menu">
         <ul>
            
            <li><a href="{{ route("app.fornecedor.adicionar") }}">Novo</a></li>
            <li><a href="{{ route("app.fornecedor") }}">Consulta</a></li>


         </ul>
      </div>

      <div class="informacao-pagina">
         <div style="width: 80%; margin-left: auto; margin-right: auto;">
            <table border="1" width="100%">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Site</th>
                        <th>UF</th>
                        <th>E-mail</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($fornecedores as $fornecedor)
                        <tr>
                            <td>{{ $fornecedor->nome }}</td>
                            <td>{{ $fornecedor->site }}</td>
                            <td>{{ $fornecedor->uf }}</td>
                            <td>{{ $fornecedor->email }}</td>
                            <td><a href="{{ route('app.fornecedor.editar', $fornecedor) }}">Editar</a></td>
                            <td><a href="{{ route('app.fornecedor.excluir', $fornecedor) }}">Excluir</a></td>
                        </tr>
                        <tr>
                              <td colspan="6">
                                 <p>Lista de produtos</p>
                                 <ul>
                                       @foreach ($fornecedor->produtos as $key => $produto)
                                          <li>{{ $produto->nome }}</li>
                                       @endforeach
                                 </ul>
                              </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $fornecedores->appends($request)->links() }}
         </div>
      </div>

   </div>
@endsection
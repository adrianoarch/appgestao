@extends('app.layouts.basico')

@section('titulo', 'Cliente')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Listagem de Clientes</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('app.cliente.adicionar') }}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Site</th>
                            <th>UF</th>
                            <th>E-mail</th>
                            <th>Telefone</th>
                            <th>Acões</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clientes as $cliente)
                            <tr>
                                <td>{{ $cliente->nome }}</td>
                                <td>{{ $cliente->site }}</td>
                                <td>{{ $cliente->uf }}</td>
                                <td>{{ $cliente->email }}</td>
                                <td>{{ $cliente->telefone }}</td>
                                <td>
                                    <a href="{{ route('app.cliente.editar', $cliente->id) }}">Editar</a>
                                    <a href="{{ route('app.cliente.excluir', $cliente->id) }}">Excluir</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $clientes->appends($request)->links() }}
            </div>
        </div>
    </div>
@endsection
@extends('app.layouts.basico')

@section('titulo', 'Cliente')

@section('conteudo')
   
   <div class="conteudo-pagina">

      <div class="titulo-pagina-2">
         <p>Fornecedor - Adicionar</p>
      </div>

      <div class="menu">
         <ul>
            
            <li><a href="{{ route("app.fornecedor.adicionar") }}">Novo</a></li>
            <li><a href="{{ route("app.fornecedor") }}">Consulta</a></li>

         </ul>
      </div>

      <div class="informacao-pagina">
         <div style="width: 30%; margin-left: auto; margin-right: auto;">
            <form action="" method="post">
               <input type="text" name="nome" id="nome" placeholder="Nome" class="borda-preta">
               <input type="text" name="site" id="site" placeholder="Site" class="borda-preta">
               <input type="text" name="uf" id="uf" placeholder="UF" class="borda-preta">
               <input type="email" name="email" id="email" placeholder="E-mail" class="borda-preta">
               <button type="submit" class="borda-preta">Cadastrar</button>
                             
            </form>

         </div>
      </div>

   </div>
@endsection
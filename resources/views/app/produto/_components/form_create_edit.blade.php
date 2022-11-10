@if (isset($produto))
               <form action="{{ route('produto.update', $produto->id) }}" method="POST">
                  @csrf
                  @method('PUT')
                  <input type="hidden" name="id" value="">
            @else
               <form action="{{ route('produto.store') }}" method="POST">
                  @csrf
            @endif

                  <select name="fornecedor_id" id="fornecedor_id">
                     <option value="">Selecione um fornecedor</option>
                     @foreach ($fornecedores as $fornecedor)
                        <option value="{{ $fornecedor->id }}" {{ $produto->fornecedor_id ?? old('fornecedor_id') == $fornecedor->id ? 'selected' : ''}} >{{ $fornecedor->nome }}</option>
                     @endforeach
                  </select>
                  {{ $errors->has('fornecedor_id') ? $errors->first('fornecedor_id') : '' }}
                  
                  <input type="hidden" name="id" value="">
                  <input type="text" name="nome" value="{{ $produto->nome ?? old('nome') }}" id="nome" placeholder="Nome" class="borda-preta">
                  {{ $errors->has('nome') ? $errors->first('nome') : '' }}
                  <input type="text" name="descricao" value="{{ $produto->descricao ?? old('descricao') }}" id="descricao" placeholder="Descrição" class="borda-preta">
                  {{ $errors->has('descricao') ? $errors->first('descricao') : '' }}
                  <input type="text" name="peso" value="{{ $produto->peso ?? old('peso') }}" id="peso" placeholder="Peso" class="borda-preta">
                  {{ $errors->has('peso') ? $errors->first('peso') : '' }}
                  <select name="unidade_id" id="unidade_id">
                     <option value="">-- Selecione uma unidade de medida --</option>
                     {{-- <option value="1">Unidade</option> --}}
                     @foreach ($unidades as $unidade)
                           <option value="{{ $unidade->id }}" {{ ($produto->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : ''}}>{{ $unidade->descricao }}</option>
                     @endforeach
                  </select>
                  {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}

                  @if (isset($produto))
                     <button type="submit" class="borda-preta">Editar</button>
                  @else
                  <button type="submit" class="borda-preta">Cadastrar</button>                            
                  @endif
                  
               </form>
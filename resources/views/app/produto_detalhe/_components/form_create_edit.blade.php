@if (isset($produto_detalhe))
               <form action="{{ route('produto.update', $produto_detalhe->id) }}" method="POST">
                  @csrf
                  @method('PUT')
                  <input type="hidden" name="id" value="">
            @else
               <form action="{{ route('produto-detalhe.store') }}" method="POST">
                  @csrf
            @endif
                  <input type="hidden" name="id" value="">
                  <input type="text" name="produto_id" value="{{ $produto_detalhe->produto_id ?? old('produto_id') }}" id="produto_id" placeholder="ID do Produto" class="borda-preta">
                  {{ $errors->has('produto_id') ? $errors->first('produto_id') : '' }}
                  <input type="text" name="comprimento" value="{{ $produto_detalhe->comprimento ?? old('comprimento') }}" id="comprimento" placeholder="Comprimento" class="borda-preta">
                  {{ $errors->has('comprimento') ? $errors->first('comprimento') : '' }}
                  <input type="text" name="largura" value="{{ $produto_detalhe->largura ?? old('largura') }}" id="largura" placeholder="Largura" class="borda-preta">
                  {{ $errors->has('largura') ? $errors->first('largura') : '' }}
                  <input type="text" name="altura" value="{{ $produto_detalhe->altura ?? old('altura') }}" id="altura" placeholder="Altura" class="borda-preta">
                  {{ $errors->has('altura') ? $errors->first('altura') : '' }}
                  <select name="unidade_id" id="unidade_id">
                     <option value="">-- Selecione uma unidade de medida --</option>
                     {{-- <option value="1">Unidade</option> --}}
                     @foreach ($unidades as $unidade)
                           <option value="{{ $unidade->id }}" {{ ($produto_detalhe->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : ''}}>{{ $unidade->descricao }}</option>
                     @endforeach
                  </select>
                  {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}

                  @if (isset($produto_detalhe))
                     <button type="submit" class="borda-preta">Editar</button>
                  @else
                  <button type="submit" class="borda-preta">Cadastrar</button>                            
                  @endif
                  
               </form>
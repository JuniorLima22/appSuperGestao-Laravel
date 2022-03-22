@extends('app.layouts.basico')

@section('titulo', 'Pedido Produto')

@section('conteudo')
<div class="conteudo-pagina">
    <div class="titulo-pagina-2"><p>Adicionar Produtos ao Pedido</p></div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('pedido.index') }}">Voltar</a></li>
            <li><a href="">Consulta</a></li>
        </ul>
    </div>

    <div class="informacao-pagina">
        <div style="width: 30%; margin-left: auto; margin-right: auto;">
            @if (Session::has('mensagem'))
                <div class="alert {{ Session::has('tipo') ? Session::get('tipo') : '' }}">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                    {{ Session::get('mensagem') }}
                </div>
            @endif
            
            <h4>Detalhes do Pedido</h4>
            <p>ID do pedido: {{ $pedido->id }}</p>
            <p>Cliente: {{ $pedido->cliente_id }}</p>

            @if ($pedido->produtos->isNotEmpty())
                <table>
                    <caption>⮮ ITENS DO PEDIDO ⮯</caption>
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Nome</td>
                            <td>Quantidade</td>
                            <td>Data Inclusão</td>
                            <td>Ação</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pedido->produtos as $produto)
                        <tr>
                            <td>{{ $produto->id }}</td>
                            <td>{{ $produto->nome }}</td>
                            <td>{{ $produto->pivot->quantidade }}</td>
                            <td>{{ $produto->pivot->created_at->format('d/m/Y H:i:s') }}</td>
                            <td>
                                <form id="form_{{$produto->pivot->id}}" action="{{ route('pedido-produto.destroy', [$produto->pivot->id]) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este produto do pedido?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="texto-branco danger borda-branca" onclick="document.getElementById('form_{{$produto->pivot->id}}')">Excluir</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
            
            <form action="{{ route('pedido-produto.store') }}" method="post">
                @csrf
                <input type="hidden" name="pedido_id" value="{{ $pedido->id }}">
                @error('pedido_id')
                    <div class="alert">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                        {{ $message }}
                    </div>
                @enderror
                <select name="produto_id">
                    <option value="">-- Selecione um produto --</option>
                    @forelse ($produtos as $produto)
                        <option value="{{ $produto->id }}" {{ old('produto_id') == $produto->id ? 'selected' : '' }} >{{ $produto->nome }}</option>
                    @empty
                        <option value="">Nenhum registro encontrado</option>
                    @endforelse
                </select>
                @error('produto_id')
                    <div class="alert">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                        {{ $message }}
                    </div>
                @enderror
                <br>
                <input type="number" name="quantidade" value="{{ old('quantidade') }}" placeholder="Quantidade de produto" class="borda-preta">
                @error('quantidade')
                    <div class="alert">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                        {{ $message }}
                    </div>
                @enderror
                <br>
                <button type="submit" class="borda-preta">Cadastrar</button>
            </form>
        </div>
    </div>
</div>
@endsection

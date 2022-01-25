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
            <h4>Detalhes do pedido</h4>
            <p>ID do pedido: {{ $pedido->id }}</p>
            <p>Cliente: {{ $pedido->cliente_id }}</p>
            <form action="{{ route('pedido-produto.store') }}" method="post">
                @csrf
                <input type="hidden" name="pedido_id" value="{{ $pedido->id }}">
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
                <button type="submit" class="borda-preta">Cadastrar</button>
            </form>
        </div>
    </div>
</div>
@endsection

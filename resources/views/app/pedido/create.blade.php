@extends('app.layouts.basico')

@section('titulo', 'Pedidos')

@section('conteudo')
<div class="conteudo-pagina">
    <div class="titulo-pagina-2"><p>Adicionar Pedido</p></div>

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
            <form action="{{ route('pedido.store') }}" method="post">
                @csrf
                <select name="cliente_id">
                    <option value="">-- Selecione um cliente --</option>
                    @forelse ($clientes as $cliente)
                        <option value="{{ $cliente->id }}" {{ old('cliente_id') == $cliente->id ? 'selected' : '' }} >{{ $cliente->nome }}</option>
                    @empty
                        <option value="">Nenhum registro encontrado</option>
                    @endforelse
                </select>
                @error('cliente_id')
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

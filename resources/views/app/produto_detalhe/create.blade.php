@extends('app.layouts.basico')

@section('titulo', 'Detalhes do Produto')

@section('conteudo')
<div class="conteudo-pagina">
    <div class="titulo-pagina-2"><p>Adicionar Detalhes do Produto</p></div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('produto.index') }}">Voltar</a></li>
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
            <form action="{{ route('produto-detalhe.store') }}" method="post">
                @csrf
                <input type="text" name="produto_id" value="{{ old('produto_id') }}" placeholder="ID do Produto" class="borda-preta">
                @error('produto_id')
                    <div class="alert">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                        {{ $message }}
                    </div>
                @enderror
                <br>
                <input type="text" name="comprimento" value="{{ old('comprimento') }}" placeholder="Comprimento do produto" class="borda-preta">
                @error('comprimento')
                    <div class="alert">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                        {{ $message }}
                    </div>
                @enderror
                <br>
                <input type="text" name="largura" value="{{ old('largura') }}" placeholder="Largura do produto" class="borda-preta">
                @error('largura')
                    <div class="alert">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                        {{ $message }}
                    </div>
                @enderror
                <br>
                <input type="text" name="altura" value="{{ old('altura') }}" placeholder="Altura do produto" class="borda-preta">
                @error('altura')
                    <div class="alert">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                        {{ $message }}
                    </div>
                @enderror
                <br>
                <select name="unidade_id">
                    <option value="">-- Selecione a unidade de medida --</option>
                    @forelse ($unidades as $unidade)
                        <option value="{{ $unidade->id }}" {{ old('unidade_id') == $unidade->id ? 'selected' : '' }} >{{ $unidade->descricao }}</option>
                    @empty
                        <option value="">Nenhum registro encontrado</option>
                    @endforelse
                </select>
                @error('unidade_id')
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

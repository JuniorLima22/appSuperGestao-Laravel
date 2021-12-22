@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
<div class="conteudo-pagina">
    <div class="titulo-pagina-2"><p>Adicionar Produto</p></div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('produto.index') }}">Voltar</a></li>
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
            <form action="{{ route('produto.store') }}" method="post">
                @csrf
                <input type="text" name="nome" value="{{ old('nome') }}" placeholder="Nome do produto" class="borda-preta">
                @error('nome')
                    <div class="alert">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                        {{ $message }}
                    </div>
                @enderror
                <br>
                <input type="text" name="descricao" value="{{ old('descricao') }}" placeholder="Descrição do produto" class="borda-preta">
                @error('descricao')
                    <div class="alert">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                        {{ $message }}
                    </div>
                @enderror
                <br>
                <input type="text" name="peso" value="{{ old('peso') }}" placeholder="Peso do produto" class="borda-preta">
                @error('peso')
                    <div class="alert">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                        {{ $message }}
                    </div>
                @enderror
                <br>
                <select name="unidade_id">
                    <option value="">-- Selecione a unidade de medida --</option>
                    @forelse ($unidades as $unidade)
                        {{-- <option value="{{ $unidade->id }}" @if(old('unidade_id') && old('unidade_id') == $unidade->id) selected @endif>{{ $unidade->descricao }}</option> --}}
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

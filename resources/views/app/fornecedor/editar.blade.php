@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')
<div class="conteudo-pagina">
    <div class="titulo-pagina-2"><p>Fornecedor - Editar</p></div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('app.fornecedor.adicionar') }}">Novo</a></li>
            <li><a href="{{ route('app.fornecedor') }}">Consulta</a></li>
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
            <form action="{{ route('app.fornecedor.atualizar', $fornecedor->id) }}" method="post">
                @csrf
                @method('PUT')
                <input type="text" name="nome" value="{{ old('nome', $fornecedor->nome) }}" placeholder="Nome" class="borda-preta">
                @error('nome')
                    <div class="alert">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                        {{ $message }}
                    </div>
                @enderror
                <br>
                <input type="text" name="site" value="{{ old('site', $fornecedor->site) }}" placeholder="Site" class="borda-preta">
                @error('site')
                    <div class="alert">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                        {{ $message }}
                    </div>
                @enderror
                <br>
                <input type="text" name="uf" value="{{ old('uf', $fornecedor->uf) }}" placeholder="UF" class="borda-preta">
                @error('uf')
                    <div class="alert">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                        {{ $message }}
                    </div>
                @enderror
                <br>
                <input type="text" name="email" value="{{ old('email', $fornecedor->email) }}" placeholder="E-mail" class="borda-preta">
                @error('email')
                    <div class="alert">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                        {{ $message }}
                    </div>
                @enderror
                <br>
                <button type="submit" class="borda-preta">Atualizar</button>
            </form>
        </div>
    </div>
</div>
@endsection

@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
<div class="conteudo-pagina">
    <div class="titulo-pagina-2"><p>Visualizar Produto</p></div>

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

            <table>
                <tr>
                    <th style="background-color: #2a9ee2; color: #fff;">ID:</th>
                    <td>{{ $produto->id }}</td>
                </tr>

                <tr>
                    <th style="background-color: #2a9ee2; color: #fff;">Nome:</th>
                    <td>{{ $produto->nome }}</td>
                </tr>

                <tr>
                    <th style="background-color: #2a9ee2; color: #fff;">Descrição:</th>
                    <td>{{ $produto->descricao }}</td>
                </tr>

                <tr>
                    <th style="background-color: #2a9ee2; color: #fff;">Peso:</th>
                    <td>{{ $produto->peso }} KG</td>
                </tr>

                <tr>
                    <th style="background-color: #2a9ee2; color: #fff;">Unidade de medida:</th>
                    <td>{{ $produto->unidade_id }}</td>
                </tr>
            </table>
            
            <button onclick="location.href='{{ route('produto.edit', $produto->id) }}'" class="borda-preta">Editar</button>
        </div>
    </div>
</div>
@endsection

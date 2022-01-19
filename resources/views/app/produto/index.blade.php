@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
<div class="conteudo-pagina">
    <div class="titulo-pagina-2"><p>Listagems de Produto</p></div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('produto.create') }}">Novo</a></li>
            <li><a href="">Consulta</a></li>
        </ul>
    </div>

    <div class="informacao-pagina">
        <div style="width: 90%; margin-left: auto; margin-right: auto;">
            @if (Session::has('mensagem'))
                <div class="alert {{ Session::has('tipo') ? Session::get('tipo') : '' }}">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                    {{ Session::get('mensagem') }}
                </div>
            @endif
            <table >
                <thead>
                    <tr>
                        <td>#</td>
                        <td>Nome</td>
                        <td>Descrição</td>
                        <td>Peso</td>
                        <td>Unidade ID</td>
                        <td>Comprimento</td>
                        <td>Altura</td>
                        <td>Largura</td>
                        <td colspan="3">Ações</td>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($produtos as $produto)
                        <tr>
                            <td>{{ $produto->id }}</td>
                            <td>{{ $produto->nome }}</td>
                            <td>{{ $produto->descricao }}</td>
                            <td>{{ $produto->peso }}</td>
                            <td>{{ $produto->unidade_id }}</td>
                            <td>{{ $produto->itemDetalhe->comprimento ?? '' }}</td>
                            <td>{{ $produto->itemDetalhe->altura ?? '' }}</td>
                            <td>{{ $produto->itemDetalhe->largura ?? '' }}</td>
                            <td><button onclick="location.href='{{ route('produto.show', $produto->id) }}'" class="info  borda-branca">Visualizar</button></td>
                            <td><button onclick="location.href='{{ route('produto.edit', $produto->id) }}'" class="borda-branca">Editar</button></td>
                            <td>
                                <form action="{{ route('produto.destroy', $produto->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este produto?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="texto-branco danger borda-branca">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">Nenhum registro encontrado</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div>
                {{ $produtos->appends($dataForm)->links() }} <br>
                Exibindo {{ $produtos->count() }} produtos de {{ $produtos->total() }} (de {{ $produtos->firstItem() }} a {{ $produtos->lastItem() }})
            </div>
            
        </div>
    </div>
</div>
@endsection

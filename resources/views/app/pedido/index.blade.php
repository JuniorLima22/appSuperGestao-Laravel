@extends('app.layouts.basico')

@section('titulo', 'Pedido')

@section('conteudo')
<div class="conteudo-pagina">
    <div class="titulo-pagina-2"><p>Listagems de Pedidos</p></div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('pedido.create') }}">Novo</a></li>
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
                        <td>Cliente</td>
                        <td colspan="3">Ações</td>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pedidos as $pedido)
                        <tr>
                            <td>{{ $pedido->id }}</td>
                            <td>{{ $pedido->cliente_id }}</td>
                            <td><button onclick="location.href='{{ route('pedido-produto.create', ['pedido_id' => $pedido->id]) }}'" class="info  borda-branca">Adicionar Produtos</button></td>
                            <td><button onclick="location.href='{{ route('pedido.edit', $pedido->id) }}'" class="borda-branca">Editar</button></td>
                            <td>
                                <form action="{{ route('pedido.destroy', $pedido->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este pedido?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="texto-branco danger borda-branca">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">Nenhum registro encontrado</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div>
                {{ $pedidos->appends($dataForm)->links() }} <br>
                Exibindo {{ $pedidos->count() }} pedidos de {{ $pedidos->total() }} (de {{ $pedidos->firstItem() }} a {{ $pedidos->lastItem() }})
            </div>
            
        </div>
    </div>
</div>
@endsection

@extends('app.layouts.basico')

@section('titulo', 'Cliente')

@section('conteudo')
<div class="conteudo-pagina">
    <div class="titulo-pagina-2"><p>Listagems de Clientes</p></div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('cliente.create') }}">Novo</a></li>
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
                        <td colspan="3">Ações</td>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($clientes as $cliente)
                        <tr>
                            <td>{{ $cliente->id }}</td>
                            <td>{{ $cliente->nome }}</td>
                            <td><button onclick="location.href='{{ route('cliente.show', $cliente->id) }}'" class="info  borda-branca">Visualizar</button></td>
                            <td><button onclick="location.href='{{ route('cliente.edit', $cliente->id) }}'" class="borda-branca">Editar</button></td>
                            <td>
                                <form action="{{ route('cliente.destroy', $cliente->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este cliente?')">
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
                {{ $clientes->appends($dataForm)->links() }} <br>
                Exibindo {{ $clientes->count() }} clientes de {{ $clientes->total() }} (de {{ $clientes->firstItem() }} a {{ $clientes->lastItem() }})
            </div>
            
        </div>
    </div>
</div>
@endsection

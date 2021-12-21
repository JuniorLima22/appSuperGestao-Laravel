@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')
<div class="conteudo-pagina">
    <div class="titulo-pagina-2"><p>Fornecedor - Listar</p></div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('app.fornecedor.adicionar') }}">Novo</a></li>
            <li><a href="{{ route('app.fornecedor') }}">Consulta</a></li>
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
                        <td>Site</td>
                        <td>UF</td>
                        <td>E-mail</td>
                        <td colspan="2">Ações</td>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($fornecedores as $fornecedor)
                        <tr>
                            <td>{{ $fornecedor->id }}</td>
                            <td>{{ $fornecedor->nome }}</td>
                            <td>{{ $fornecedor->site }}</td>
                            <td>{{ $fornecedor->uf }}</td>
                            <td>{{ $fornecedor->email }}</td>
                            <td><button onclick="location.href='{{ route('app.fornecedor.editar', $fornecedor->id) }}'">Editar</a></td>
                            <td>
                                <form action="{{ route('app.fornecedor.deletar', $fornecedor->id) }}" method="POST" onsubmit="return confirm('Tem certeza de que deseja excluir este fornecedor?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="texto-branco danger">Excluir</button>
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
        </div>
    </div>
</div>
@endsection

@extends('site.layouts.basico')

@section('titulo', 'Home')

@section('conteudo')

<div class="conteudo-destaque">

    <div class="esquerda">
        <div class="informacoes">
            <h1>Sistema Super Gestão</h1>
            <p>Software para gestão empresarial ideal para sua empresa.<p>
            <div class="chamada">
                <img src="{{ asset('/img/check.png') }}">
                <span class="texto-branco">Gestão completa e descomplicada</span>
            </div>
            <div class="chamada">
                <img src="{{ asset('/img/check.png') }}">
                <span class="texto-branco">Sua empresa na nuvem</span>
            </div>
        </div>

        <div class="video">
            <img src="{{ asset('/img/player_video.jpg') }}">
        </div>
    </div>

    <div class="direita">
        <div class="contato">
            <h1>Contato</h1>
            <p>Caso tenha qualquer dúvida por favor entre em contato com nossa equipe pelo formulário abaixo.<p>
                <form action="{{ route('site.contato') }}" method="POST">
                    @csrf
                    <input type="text" name="nome" placeholder="Nome" class="borda-preta">
                    <br>
                    <input type="text" name="telefone" placeholder="Telefone" class="borda-preta">
                    <br>
                    <input type="text" name="email" placeholder="E-mail" class="borda-preta">
                    <br>
                    <select name="motivo_contato" class="borda-preta">
                        <option value="">Qual o motivo do contato?</option>
                        <option value="Dúvida">Dúvida</option>
                        <option value="Elogio">Elogio</option>
                        <option value="Reclamação">Reclamação</option>
                    </select>
                    <br>
                    <textarea name="mensagem" class="borda-preta" placeholder="Preencha aqui a sua mensagem"></textarea>
                    <br>
                    <button type="submit" class="borda-preta">ENVIAR</button>
                </form>
        </div>
    </div>
</div>
@endsection
{{ $slot }}
<form action="{{ route('site.contato') }}" method="POST">
    @csrf
    <input type="text" name="nome" placeholder="Nome" class="{{$classe}}">
    <br>
    <input type="text" name="telefone" placeholder="Telefone" class="{{$classe}}">
    <br>
    <input type="text" name="email" placeholder="E-mail" class="{{$classe}}">
    <br>
    <select name="motivo_contato" class="{{$classe}}">
        <option value="">Qual o motivo do contato?</option>
        <option value="Dúvida">Dúvida</option>
        <option value="Elogio">Elogio</option>
        <option value="Reclamação">Reclamação</option>
    </select>
    <br>
    <textarea name="mensagem" class="{{$classe}}" placeholder="Preencha aqui a sua mensagem"></textarea>
    <br>
    <button type="submit" class="{{$classe}}">ENVIAR</button>
</form>
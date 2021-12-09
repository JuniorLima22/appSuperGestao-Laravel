{{ $slot }}
<form action="{{ route('site.contato') }}" method="POST">
    @csrf
    <input type="text" name="nome" placeholder="Nome" class="{{$classe}}" value="{{ old('nome') }}">
    <br>
    <input type="text" name="telefone" placeholder="Telefone" class="{{$classe}}" value="{{ old('telefone') }}">
    <br>
    <input type="text" name="email" placeholder="E-mail" class="{{$classe}}" value="{{ old('email') }}">
    <br>
    <select name="motivo_contatos_id" class="{{$classe}}">
        <option value="">Qual o motivo do contato?</option>
        @foreach ($motivo_contatos as $motivo_contato)
            <option value="{{ $motivo_contato->id }}" {{ old('motivo_contatos_id') == $motivo_contato->id ? 'selected' : '' }}>{{ $motivo_contato->motivo_contato }}</option>
        @endforeach
    </select>
    <br>
    <textarea name="mensagem" class="{{$classe}}" placeholder="Preencha aqui a sua mensagem">{{ old('mensagem') ?? old('mensagem') }}</textarea>
    <br>
    <button type="submit" class="{{$classe}}">ENVIAR</button>
</form>
{{ $slot }}

@if (Session::has('mensagem'))
    <div class="alert {{ Session::has('tipo') ? Session::get('tipo') : '' }}">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
        {{ Session::get('mensagem') }}
    </div>
@endif

<form action="{{ route('site.contato') }}" method="POST">
    @csrf
    <input type="text" name="nome" placeholder="Nome" class="{{$classe}}" value="{{ old('nome') }}">
    @if ($errors->has('nome'))
        <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
            {{ $errors->first('nome') }}
        </div>
    @endif
    <br>
    <input type="text" name="telefone" placeholder="Telefone" class="{{$classe}}" value="{{ old('telefone') }}">
    @if ($errors->has('telefone'))
        <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
            {{ $errors->first('telefone') }}
        </div>
    @endif
    <br>
    <input type="text" name="email" placeholder="E-mail" class="{{$classe}}" value="{{ old('email') }}">
    @if ($errors->has('email'))
        <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
            {{ $errors->first('email') }}
        </div>
    @endif
    <br>
    <select name="motivo_contatos_id" class="{{$classe}}">
        <option value="">Qual o motivo do contato?</option>
        @foreach ($motivo_contatos as $motivo_contato)
            <option value="{{ $motivo_contato->id }}" {{ old('motivo_contatos_id') == $motivo_contato->id ? 'selected' : '' }}>{{ $motivo_contato->motivo_contato }}</option>
        @endforeach
    </select>
    @if ($errors->has('motivo_contatos_id'))
        <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
            {{ $errors->first('motivo_contatos_id') }}
        </div>
    @endif
    <br>
    <textarea name="mensagem" class="{{$classe}}" placeholder="Preencha aqui a sua mensagem">{{ old('mensagem') ?? old('mensagem') }}</textarea>
    @if ($errors->has('mensagem'))
        <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
            {{ $errors->first('mensagem') }}
        </div>
    @endif
    <br>
    <button type="submit" class="{{$classe}}">ENVIAR</button>
</form>

<h1>Nova Dúvida</h1>
@if($errors->any())
    @foreach ($errors->all() as $error)
        {{ $error }}        
    @endforeach
@endif

<form action=" {{ route('supports.store') }} " method="POST">
    @csrf()
    <input name="subject" type="text" placeholder="Assunto" value="{{ old('subject') }}" >
    <textarea name="body" id="" cols="30" rows="5" placeholder="decrição">{{ old('body') }}</textarea>
    <button type="submit">Enviar</button>
</form>
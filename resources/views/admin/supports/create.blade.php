
<h1>Nova Dúvida</h1>

<form action=" {{ route('supports.store') }} " method="POST">
    @csrf()
    <input name="subject" type="text" placeholder="Assunto" >
    <textarea name="body" id="" cols="30" rows="5" placeholder="decrição"></textarea>
    <button type="submit">Enviar</button>
</form>
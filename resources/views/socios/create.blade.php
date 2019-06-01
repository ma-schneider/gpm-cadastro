<form action="{{ route('socios.store') }}" method="POST">

    @csrf
    @method('POST')

    <label for="name">Nome</label>
    <input id="name" type="text" name="name">

    <label for="email">E-mail</label>
    <input id="email" type="text" name="email">

    <label for="email-verified-at">Confirmação do e-mail</label>
    <input type="text" id="email-verified-at" name="email_verified_at">

    <label for="number">Número de sócio</label>
    <input type="text" id="number" name="number">

    <label for="photo">Foto</label>
    <input type="text" id="photo" name="photo">

    <label for="password">Password</label>
    <input type="text" id="password" name="password">

    <button type="submit" dusk="register">Cadastrar</button>
</form>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Projeto básico</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <h2>Formulário de Registro</h2>
    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif
    <form method="post" action="/registro">
        @csrf
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required><br>

        <label for="email">E-mail:</label>
        <input type="email" name="email" required><br>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" required><br>

        <label for="senha_confirmation">Confirme a Senha:</label>
        <input type="password" name="senha_confirmation" required><br>

        <button type="submit">Registrar</button>
    </form>
</body>
</html>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edição do usuário</title>
</head>

<body>
    <h2>Editar usuário</h2>

    <form method="post" action="{{ route('atualizarUsuario', ['id' => $usuario->id]) }}">
        @csrf
        @method('PUT')
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" value="{{ $usuario->name }}" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ $usuario->email }}" required>
        <br>
        <button type="submit">Salvar</button>
    </form>
    <br>
    <!-- Botão Voltar -->
    <a href="{{ route('exibirFormulario') }}">
        <button>Voltar</button>
    </a>
</body>

</html>


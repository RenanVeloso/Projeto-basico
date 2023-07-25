<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de usuários</title>
</head>

<body>
    <h2>Lista de Usuários Cadastrados</h2>

    @foreach ($usuarios as $usuario)
        <p><strong>Nome:</strong> {{ $usuario->name }}</p>
        <p><strong>Email:</strong> {{ $usuario->email }}</p>
        <p><strong>Data de Registro:</strong> {{ $usuario->created_at }}</p>
        <form method="post" action="{{ route('excluirUsuario', ['id' => $usuario->id]) }}">
            @csrf
            @method('delete')
            <button type="submit">Excluir</button>
        </form>
        <hr>
    @endforeach

</body>

</html>

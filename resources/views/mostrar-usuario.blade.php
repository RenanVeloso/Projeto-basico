<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de usuários</title>
</head>
<body>
    <h3>Lista de Usuários Cadastrados</h3>

    @if (session('success'))
        <div id="alert-success" class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @foreach ($usuarios as $usuario)
        <p><strong>Nome:</strong> {{ $usuario->name }}</p>
        <p><strong>Email:</strong> {{ $usuario->email }}</p>
        <p><strong>Data de Registro:</strong> {{ $usuario->created_at }}</p>
        <form method="post" action="{{ route('excluirUsuario', ['id' => $usuario->id]) }}">
            @csrf
            @method('delete')
            <button type="submit">Excluir</button>
        </form>
        <br>
        <a href="{{ route('editarUsuario', ['id' => $usuario->id]) }}">
            <button>Editar</button>
        </a>
        <hr>
    @endforeach
    <!-- Botão Voltar -->
    <a href="{{ route('exibirFormulario') }}">
        <button>Voltar</button>
    </a>


    <script>
        // Função para esconder o alerta após alguns segundos
        function hideAlert() {
            const alertElement = document.getElementById('alert-success');
            if (alertElement) {
                setTimeout(function () {
                    alertElement.style.display = 'none';
                }, 3000); // Tempo em milissegundos (neste caso, 5000ms = 5 segundos)
            }
        }
    
        // Chama a função para esconder o alerta assim que a página carregar
        document.addEventListener('DOMContentLoaded', function () {
            hideAlert();
        });
    </script>
    

    <!-- Links de bootstrap e jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

</html>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <title>Usuários</title>
    </head>
    <nav class="indigo darken-4">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Página Inicial</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="endereco.php">Endereços</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pedido.php">Pedidos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="produto.php">Produtos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="usuario.php">Usuários</a>
                </li>
            </ul>
        </div>
    </nav>
    <nav class="amber darken-3">
        <div class=" conteiner">
            <a href="usuario.php" class="breadcrumb white-text">Cadastrar Usuário</a>
            <a href="altera_usuario.php" class="breadcrumb black-text">Alterar Usuário</a>
        </div>
    </nav>
    <div id="conteudo" class="container">
        <h2 class="text-center">Alterar Usuário</h2>
        <?php
        include_once './conexao.php';
        include_once 'funcoes/funcoes_usuario.php';
        imprimeFormularioAlteraUsuario();
        ?>
        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="crossorigin="anonymous"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('select').formSelect();
            });
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    </body>
</html>






<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <title>Pedidos</title>
    </head>
    <nav class="grey darken-3">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
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
        <div class="col s12">
            <a href="pedido.php" class="breadcrumb white-text">Cadastrar Pedido</a>
            <a href="altera_pedido.php" class="breadcrumb black-text">Alterar Pedido</a>
        </div>
    </nav>
    <div class="container">
        <h2 class="text-center">Alterar Pedido</h2>
        <?php
        include_once 'conexao.php';
        include_once 'funcoes/funcoes_pedido.php';
        imprimeFormularioAlteraPedido();
        ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('select').formSelect();
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>






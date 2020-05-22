<?php
include_once 'funcoes/funcoes_autenticar.php';

verificaLogin();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <title>Pedido</title>
    </head>
    <nav class="grey darken-3">
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
        <div class="col s12">
            <a href="cidade.php" class="breadcrumb white-text">Cadastrar Pedido</a>
        </div>
    </nav>
    <div class="container">
        <h2 class="text-center">Pedido</h2>
        <?php
        require_once 'conexao.php';
        require_once 'funcoes/funcoes_pedido.php';

        if (isset($_GET['acao'])) {
            switch ($_GET['acao']) {
                case 'cadastrar':
                    cadastrar($_POST['usuario'], $_POST['status'], $_POST['valor'], $_POST['data']);
                    break;
                case 'alterar':
                    alterar($_POST['pedcodigo'], $_POST['usuario'], $_POST['status'], $_POST['valor'], $_POST['data']);
                    break;
                case 'deletar':
                    deletar($_GET['registro']);
                    break;
                default:
                    echo 'Não foi possível completar o cadastro ';
                    break;
            }
        }
        imprimeFormularioCadastro();
        imprimeTabela(listar());
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

                




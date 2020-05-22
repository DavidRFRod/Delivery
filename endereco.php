<?php
include_once 'funcoes/funcoes_autenticar.php';

verificaLogin();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <title>Endereço</title>
    </head>
    <body>
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
                <a href="endereco.php" class="breadcrumb white-text">Cadastrar Endereço</a>
            </div>
        </nav>
        <div class="container">
            <h2 class="text-center">Endereço</h2>
            <?php
            require_once 'conexao.php';
            require_once 'funcoes/funcoes_endereco.php';

            if (isset($_GET['acao'])) {
                switch ($_GET['acao']) {
                    case 'cadastrar':
                        cadastrar($_POST['usuario'], $_POST['estado'], $_POST['cidade'], $_POST['bairro'], $_POST['rua'], $_POST['numero']);
                        break;
                    case 'alterar':
                        alterar($_POST['endcodigo'], $_POST['usuario'], $_POST['estado'], $_POST['cidade'], $_POST['bairro'], $_POST['rua'], $_POST['numero']);
                        break;
                    case 'deletar':
                        deletar($_GET['registro']);
                        break;
                    default:
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






<?php
include_once 'funcoes/funcoes_autenticar.php';

verificaLogin();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <link rel="stylesheet" href="css/body.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <title>Usuários</title>
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
            <a href="usuario.php" class="breadcrumb white-text">Cadastrar Usuário</a>
        </div>
    </nav>
    <div id="conteudo" class="container">
        <h2 class="text-center">Usuário</h2>

        <?php
        require_once 'conexao.php';
        require_once 'funcoes/funcoes_usuario.php';


        if (isset($_GET['acao'])) {
            switch ($_GET['acao']) {
                case 'cadastrar':
                    cadastrar($_POST['nome'], $_POST['cpf'], $_POST['email'], $_POST['telefone'], $_POST['senha'], $_POST['datanascimento']);
                    break;
                case 'alterar':
                    alterar($_POST['usucodigo'], $_POST['nome'], $_POST['cpf'], $_POST['email'], $_POST['telefone'], $_POST['senha'], $_POST['datanascimento']);
                    break;
                case 'deletar':
                    deletar($_GET['registro']);
                    break;
                default:
                    echo 'Não foi possível completar o cadastro ';
                    break;
            }
        }
        echo ' <br>';
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






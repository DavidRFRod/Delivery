<<?php
include_once './funcoes_autenticar.php';

if (taLogado()) {
    header("Location: usuario.php");
}
?> 
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="css/css.css" rel="stylesheet">
        <title>Login</title>
    </head>
    <body>
        <div class="row">
            <div class="conteiner col s12 l4 offset-l4">
                <form action="autenticar.php" method="post">
                    <div class="card">
                        <div class="card-action blue white-text">
                            <h3>Login</h3>
                        </div>
                        <div class="card-content">
                            <div class="form-field">
                                <label for="email">E-mail</label>
                                <input type="text" id="email" name="email">
                            </div><br>
                            <div class="form-field">
                                <label for="senha">Senha</label>
                                <input type="password" id="senha" name="senha">
                            </div><br>
                            <div class="form-field center-align">
                                <button class="btn-large blue ">Login</button>
                            </div><br>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <p>
            <?php
            if (isset($_SESSION['loginErro'])) {
                $erro = $_SESSION['loginErro'];

                echo "<div class='row'>
                            <div class='conteiner col s12 l4 offset-l4'>
                                <div class='erro card text-center'>{$erro}</div>
                            </div>
                        </div>";
            }
            ?>
        </p>

        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="crossorigin="anonymous"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('select').formSelect();
            });
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    </body>
</html>
<?php

session_start();

include_once './conexao.php';

echo '<h1>autenticando...</h1>';

if ((isset($_POST['email'])) && (isset($_POST['senha']))) {
    $sConexao = getConexao();

    $usuario = pg_escape_string($sConexao, $_POST['email']);
    $senha = pg_escape_string($sConexao, $_POST['senha']);

    //Buscar na tabela o usuário que corresponde com os dados digitado no formulário
    $result_usuario = "
        SELECT *
          FROM DELIVERY.TBUSUARIO
         WHERE usuemail = '$usuario'
         LIMIT 1";
    $resultado_usuario = pg_query($sConexao, $result_usuario);
    $resultado = pg_fetch_assoc($resultado_usuario);

    //Encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
    if ($resultado && $resultado['ususenha'] === $senha) {
        $_SESSION['usuario'] = $resultado;

        header("Location: usuario.php");
    } else if ($resultado) {
        $_SESSION['loginErro'] = "Senha inválida";
    } else {
        $_SESSION['loginErro'] = "O usuário informado não existe";
    }

    header("Location: index.php");
    //O campo usuário e senha não preenchido entra no else e redireciona o usuário para a página de login
}

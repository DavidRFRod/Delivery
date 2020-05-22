<?php

session_start();

function taLogado() {
    if (isset($_SESSION['usuario'])) {
        return true;
    }

    return false;
}

function verificaLogin() {
    if (taLogado()) {
        return;
    }

    $_SESSION['loginErro'] = "Acesso não permitido";

    header("Location: index.php");
}

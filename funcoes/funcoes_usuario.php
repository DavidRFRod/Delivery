
<?php

function listar() {
    $sSql = 'SELECT * '
            . 'FROM DELIVERY.TBUSUARIO';
    $oResultado = pg_query(getConexao(), $sSql);
    $aTabela = [];

    while ($aLinha = pg_fetch_assoc($oResultado)) {
        array_push($aTabela, $aLinha);
    }
    return ($aTabela);
}

function cadastrar($sNome, $sCpf, $sEmail, $iTelefone, $sSenha, $sDataNascimento) {
    $sSql = "INSERT INTO DELIVERY.TBUSUARIO (usunome,usucpf,usuemail,usutelefone,ususenha,usudatanascimento) VALUES ('$sNome','$sCpf','$sEmail', '$iTelefone', '$sSenha', '$sDataNascimento')";
    pg_query(getConexao(), $sSql);
}

function alterar($iCodigo, $sNome, $iCpf, $sEmail, $iTelefone, $sSenha, $sDataNascimento) {
    $sSql = "UPDATE DELIVERY.TBUSUARIO SET usunome='$sNome',usucpf= '$iCpf', usuemail = '$sEmail', usutelefone = $iTelefone, ususenha = '$sSenha', usudatanascimento = '$sDataNascimento' 
                    WHERE usucodigo = $iCodigo";
    pg_query(getConexao(), $sSql);
}

function deletar($iCodigo) {
    $sSql = 'DELETE FROM DELIVERY.TBUSUARIO WHERE usucodigo =' . $iCodigo . ';';
    pg_query(getConexao(), $sSql);
}

function imprimeTabela($aTabela) {
    if (empty($aTabela)) {
        echo 'Não há registro a serem exibidos';
    }
    echo '<table class="table table-bordered">';
    echo '<tr>';
    echo '<th>Código</th>';
    echo '<th>Nome</th>';
    echo '<th>CPF</th>';
    echo '<th>E-mail</th>';
    echo '<th>Telefone</th>';
    echo '<th>Senha</th>';
    echo '<th>Data de Nascimento</th>';
    echo '<th>Ações</th>';
    echo '</tr>';
    foreach ($aTabela as $aLinha) {
        echo '<tr>';
        echo '<td>' . $aLinha['usucodigo'] . '</td>';
        echo '<td>' . $aLinha['usunome'] . '</td>';
        echo '<td>' . $aLinha['usucpf'] . '</td>';
        echo '<td>' . $aLinha['usuemail'] . '</td>';
        echo '<td>' . $aLinha['usutelefone'] . '</td>';
        echo '<td>' . $aLinha['ususenha'] . '</td>';
        echo '<td>' . $aLinha['usudatanascimento'] . '</td>';
        echo '<td><a href="usuario.php?acao=deletar&registro=' . $aLinha['usucodigo'] . '"> 
                        <button class="btn waves-effect waves-light red darken-4 " type="submit" name="action">Deletar</button></a></td>';
        echo '<td><a href="altera_usuario.php?acao=alterar&registro=' . $aLinha['usucodigo'] . "&nome=" . $aLinha['usunome'] . "&cpf=" . $aLinha['usucpf'] . "&email=" . $aLinha['usuemail'] .
        "&telefone=" . $aLinha['usutelefone'] . "&senha=" . $aLinha['ususenha'] . "&datanascimento=" . $aLinha['usudatanascimento'] . '"> 
                        <button class="btn waves-effect waves-light blue darken-1" type="submit" name="action">Alterar</button></a></td>';
        echo '</tr>';
    }
    echo '</table>';
}

function imprimeFormularioCadastro() {
    echo '<form method="POST" action="usuario.php?acao=cadastrar" class="col s12">';
    echo '<div class="input-field">';
    echo '<label for="nome">Nome</label>';
    echo '<input type="text" class="validate" name="nome" required>';
    echo '</div>';
    echo '<div class="input-field">';
    echo '<label for="cpf">CPF</label>';
    echo '<input type="text" class="validate" name="cpf" required>';
    echo '</div>';
    echo '<div class="input-field">';
    echo '<label for="email">Email</label>';
    echo '<input type="email" class="validate" name="email" required>';
    echo '</div>';
    echo '<div class="input-field">';
    echo '<label for="telefone">Telefone</label>';
    echo '<input type="tel" class="validate" name="telefone" required>';
    echo '</div>';
    echo '<div class="input-field">';
    echo '<label for="senha">Senha</label>';
    echo '<input type="password" class="validate" name="senha" required>';
    echo '</div>';
    echo '<div>';
    echo '<label for="datanascimento">Data de Nascimento</label>';
    echo '<input type="date" class="validate" name="datanascimento" required>';
    echo '</div>';
    echo '<button class="btn waves-effect waves-light" type="submit" name="action">Cadastrar</button>';
    echo ' </form>';
    echo ' </br>';
}

function imprimeFormularioAlteraUsuario() {
    echo '<form method="POST" action="usuario.php?acao=alterar" class="col s12">';
    echo '<input type="hidden" class="validate" name="usucodigo" value = "' . $_GET['registro'] . '" required>';
    echo '<div class="input-field">';
    echo '<label for="nome">Nome</label>';
    echo '<input type="text" class="validate" name="nome" value = "' . $_GET['nome'] . '" required>';
    echo '</div>';
    echo '<div class="input-field">';
    echo '<label for="cpf">CPF</label>';
    echo '<input type="text" class="validate" name="cpf" value = "' . $_GET['cpf'] . '" required>';
    echo '</div>';
    echo '<div class="input-field">';
    echo '<label for="email">Email</label>';
    echo '<input type="text" class="validate" name="email" value = "' . $_GET['email'] . '" required>';
    echo '</div>';
    echo '<div class="input-field">';
    echo '<label for="telefone">Telefone</label>';
    echo '<input type="text" class="validate" name="telefone" value = "' . $_GET['telefone'] . '" required>';
    echo '</div>';
    echo '<div class="input-field">';
    echo '<label for="senha">Senha</label>';
    echo '<input type="password" class="validate" name="senha" value = "' . $_GET['senha'] . '" required>';
    echo '</div>';
    echo '<div>';
    echo '<label for="datanascimento">Data de Nascimento</label>';
    echo '<input type="date" class="validate" name="datanascimento" value = "' . $_GET['datanascimento'] . '" required>';
    echo '</div>';
    echo '<button class="btn waves-effect waves-light" type="submit" name="action">Alterar</button>';
    echo ' </form>';
    echo ' </br>';
}

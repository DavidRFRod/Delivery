<?php

function listar() {
    $sSql = 'SELECT * '
            . 'FROM DELIVERY.TBENDERECO JOIN DELIVERY.TBUSUARIO USING (USUCODIGO)';
    $oResultado = pg_query(getConexao(), $sSql);
    $aTabela = [];

    while ($aLinha = pg_fetch_assoc($oResultado)) {
        array_push($aTabela, $aLinha);
    }
    return ($aTabela);
}

function cadastrar($iUsocodigo, $sEstado, $sCidade, $sBairro, $sRua, $sNumero) {
    $sSql = "INSERT INTO DELIVERY.TBENDERECO (usucodigo,endestado,endcidade,endbairro,endrua,endnumero) VALUES ($iUsocodigo,'$sEstado', '$sCidade', '$sBairro', '$sRua','$sNumero')";
    pg_query(getConexao(), $sSql);
}

function alterar($iEndcodigo, $iUsucodigo, $sEstado, $sCidade, $sBairro, $sRua, $sNumero) {
    $sSql = "UPDATE DELIVERY.TBENDERECO SET usucodigo ='$iUsucodigo', endestado = '$sEstado', endcidade = '$sCidade', endbairro = '$sBairro', endrua = '$sRua', endnumero= '$sNumero'
            WHERE endcodigo = $iEndcodigo";
    pg_query(getConexao(), $sSql);
}

function deletar($iEndcodigo) {
    $sSql = 'DELETE FROM DELIVERY.TBENDERECO WHERE endcodigo =' . $iEndcodigo . ';';
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
    echo '<th>Estado</th>';
    echo '<th>Cidade</th>';
    echo '<th>Bairro</th>';
    echo '<th>Rua</th>';
    echo '<th>N° da casa </th>';
    echo '<th>Ações</th>';
    echo '</tr>';
    foreach ($aTabela as $aLinha) {
        echo '<tr>';
        echo '<td>' . $aLinha['endcodigo'] . '</td>';
        echo '<td>' . $aLinha['usunome'] . '</td>';
        echo '<td>' . $aLinha['endestado'] . '</td>';
        echo '<td>' . $aLinha['endcidade'] . '</td>';
        echo '<td>' . $aLinha['endbairro'] . '</td>';
        echo '<td>' . $aLinha['endrua'] . '</td>';
        echo '<td>' . $aLinha['endnumero'] . '</td>';
        echo '<td><a href="endereco.php?acao=deletar&registro=' . $aLinha['endcodigo'] . '"> 
                <button class="btn waves-effect waves-light red darken-4 " type="submit" name="action">Deletar</button></a></td>';
        echo '<td><a href="altera_endereco.php?acao=alterar&registro=' . $aLinha['endcodigo'] . "&usuario=" . $aLinha['usucodigo'] . "&estado=" . $aLinha['endestado'] . "&cidade=" . $aLinha['endcidade'] .
        "&bairro=" . $aLinha['endbairro'] . "&rua=" . $aLinha['endrua'] . "&numero=" . $aLinha['endnumero'] . '"> 
                <button class="btn waves-effect waves-light blue darken-1" type="submit" name="action">Alterar</button></a></td>';
        echo '</tr>';
    }
    echo '</table>';
}

function imprimeFormularioCadastro() {
    echo '<form method="POST" action="endereco.php?acao=cadastrar" class="col s12">';
    echo ' <div>';
    echo '<label for="usuario">Usuário</label>';
    echo ' <select name="usuario">';
    select();
    echo ' </select>';
    echo '</div>';
    echo '<div class="input-field">';
    echo '<label for="estado">Estado</label>';
    echo '<input type="text" class="validate" name="estado" required>';
    echo '</div>';
    echo '<div class="input-field">';
    echo '<label for="cidade">Cidade</label>';
    echo '<input type="text" class="validate" name="cidade" required>';
    echo '</div>';
    echo '<div class="input-field">';
    echo '<label for="bairro">Bairro</label>';
    echo '<input type="text" class="validate" name="bairro" required>';
    echo '</div>';
    echo '<div class="input-field">';
    echo '<label for="rua">Rua</label>';
    echo '<input type="text" class="validate" name="rua" required>';
    echo '</div>';
    echo '<div class="input-field">';
    echo '<label for="numero">Numero</label>';
    echo '<input type="text" class="validate" name="numero" required>';
    echo '</div>';
    echo '<button class="btn waves-effect waves-light" type="submit" name="action">Cadastrar</button>';
    echo ' </form>';
    echo ' </br>';
}

function imprimeFormularioAlteraEndereco() {
    echo '<form method="POST" action="endereco.php?acao=alterar" class="col s12">';
    echo '<input type="hidden" class="validate" name="endcodigo" value = "' . $_GET['registro'] . '">';
    echo ' <div class="input-field">';
    echo ' <select name="usuario">';
    select();
    echo ' </select>';
    echo '</div>';
    echo '<div class="input-field">';
    echo '<label for="estado">Estado</label>';
    echo '<input type="text" class="validate" name="estado" value = "' . $_GET['estado'] . '" required>';
    echo '</div>';
    echo '<div class="input-field">';
    echo '<label for="cidade">Cidade</label>';
    echo '<input type="text" class="validate" name="cidade" value = "' . $_GET['cidade'] . '" required>';
    echo '</div>';
    echo '<div class="input-field">';
    echo '<label for="bairro">Bairro</label>';
    echo '<input type="text" class="validate" name="bairro" value = "' . $_GET['bairro'] . '" required>';
    echo '</div>';
    echo '<div class="input-field">';
    echo '<label for="rua">Rua</label>';
    echo '<input type="text" class="validate" name="rua" value = "' . $_GET['rua'] . '" required>';
    echo '</div>';
    echo '<div class="input-field">';
    echo '<label for="numero">Numero</label>';
    echo '<input type="text" class="validate" name="numero" value = "' . $_GET['numero'] . '" required>';
    echo '</div>';
    echo '<button class="btn waves-effect waves-light" type="submit" name="action">Alterar</button>';
    echo ' </form>';
    echo ' </br>';
}

function select() {
    $sSql = 'SELECT *
                       FROM DELIVERY.TBUSUARIO';
    $oResultado = pg_query(getConexao(), $sSql);
    $aTabela = [];

    while ($aLinha = pg_fetch_assoc($oResultado)) {
        $aTabela[] = $aLinha;
    }
    foreach ($aTabela as $aLinha) {
        echo '<option value="' . $aLinha['usucodigo'] . '">' . $aLinha['usunome'] . '</option>';
    }
}

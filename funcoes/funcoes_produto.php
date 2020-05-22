
<?php

function listar() {
    $sSql = 'SELECT * '
            . 'FROM DELIVERY.TBPRODUTO JOIN DELIVERY.TBUSUARIO USING (USUCODIGO)';
    $oResultado = pg_query(getConexao(), $sSql);
    $aTabela = [];

    while ($aLinha = pg_fetch_assoc($oResultado)) {
        array_push($aTabela, $aLinha);
    }
    return ($aTabela);
}

function cadastrar($iUsocodigo, $sNome, $iValor) {
    $sSql = "INSERT INTO DELIVERY.TBPRODUTO (usucodigo,pronome,provalor) VALUES ($iUsocodigo,'$sNome', $iValor)";
    pg_query(getConexao(), $sSql);
}

function alterar($iProcodigo, $iUsucodigo, $sNome, $iValor) {
    $sSql = "UPDATE DELIVERY.TBPRODUTO SET  usucodigo ='$iUsucodigo', pronome = '$sNome', provalor = '$iValor'
                WHERE procodigo = $iProcodigo";
    pg_query(getConexao(), $sSql);
}

function deletar($iProcodigo) {
    $sSql = 'DELETE FROM DELIVERY.TBPRODUTO WHERE procodigo =' . $iProcodigo . ';';
    pg_query(getConexao(), $sSql);
}

function imprimeTabela($aTabela) {
    if (empty($aTabela)) {
        echo 'Não há registro a serem exibidos';
    }
    echo '<table class="table table-bordered">';
    echo '<tr>';
    echo '<th>Código</th>';
    echo '<th>Nome Produto</th>';
    echo '<th>Nome Cliente</th>';
    echo '<th>Valor</th>';
    echo '<th>Ações</th>';
    echo '</tr>';
    foreach ($aTabela as $aLinha) {
        echo '<tr>';
        echo '<td>' . $aLinha['procodigo'] . '</td>';
        echo '<td>' . $aLinha['usunome'] . '</td>';
        echo '<td>' . $aLinha['pronome'] . '</td>';
        echo '<td>' . $aLinha['provalor'] . '</td>';
        echo '<td><a href="produto.php?acao=deletar&registro=' . $aLinha['procodigo'] . '"> 
                    <button class="btn waves-effect waves-light red darken-4 " type="submit" name="action">Deletar</button></a></td>';
        echo '<td><a href="altera_produto.php?acao=alterar&registro=' . $aLinha['procodigo'] . "&cliente=" . $aLinha['usucodigo'] .
        "&nome=" . $aLinha['pronome'] . "&valor=" . $aLinha['provalor'] . '"> 
                    <button class="btn waves-effect waves-light blue darken-1" type="submit" name="action">Alterar</button></a></td>';
        echo '</tr>';
    }
    echo '</table>';
}

function imprimeFormularioCadastro() {
    echo '<form method="POST" action="produto.php?acao=cadastrar" class="col s12">';
    echo ' <div>';
    echo '<label for="cliente">Usuário</label>';
    echo ' <select name="cliente">';
    select();
    echo ' </select>';
    echo '</div>';
    echo '<div class="input-field">';
    echo '<label for="nome">Produto</label>';
    echo '<input type="text" class="validate" name="nome" required>';
    echo '</div>';
    echo '<div class="input-field">';
    echo '<label for="valor">Valor</label>';
    echo '<input type="text" class="validate" name="valor" required>';
    echo '</div>';
    echo '<button class="btn waves-effect waves-light" type="submit" name="action">Cadastrar</button>';
    echo ' </form>';
    echo ' </br>';
}

function imprimeFormularioAlteraProduto() {
    echo '<form method="POST" action="produto.php?acao=alterar" class="col s12">';
    echo '<input type="hidden" class="validate" name="procodigo" value = "' . $_GET['registro'] . '">';
    echo ' <div>';
    echo '<label for="cliente">Usuário</label>';
    echo ' <select name="cliente">';
    select();
    echo ' </select>';
    echo '</div>';
    echo '<div class="input-field">';
    echo '<label for="nome">Produto</label>';
    echo '<input type="text" class="validate" name="nome" value = "' . $_GET['nome'] . '" required>';
    echo '</div>';
    echo '<div class="input-field">';
    echo '<label for="valor">Valor</label>';
    echo '<input type="text" class="validate" name="valor" value = "' . $_GET['valor'] . '" required>';
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

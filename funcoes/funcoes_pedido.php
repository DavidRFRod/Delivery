
<?php

function listar() {
    $sSql = 'SELECT * '
            . 'FROM DELIVERY.TBPEDIDO JOIN DELIVERY.TBUSUARIO USING (USUCODIGO)';
    $oResultado = pg_query(getConexao(), $sSql);
    $aTabela = [];

    while ($aLinha = pg_fetch_assoc($oResultado)) {
        array_push($aTabela, $aLinha);
    }
    return ($aTabela);
}

function cadastrar($iUsocodigo, $sStatus, $iValor, $sData) {
    $sSql = "INSERT INTO DELIVERY.TBPEDIDO (usucodigo,pedstatus,pedvalor,peddata) VALUES ($iUsocodigo,'$sStatus', $iValor, '$sData')";
    pg_query(getConexao(), $sSql);
}

function alterar($iPedcodigo, $iUsucodigo, $sStatus, $iValor, $sData) {
    $sSql = "UPDATE DELIVERY.TBPEDIDO SET usucodigo = $iUsucodigo, pedstatus =  '$sStatus', pedvalor = $iValor, peddata = '$sData'
          WHERE pedcodigo = $iPedcodigo";
    pg_query(getConexao(), $sSql);
}

function deletar($iPedcodigo) {
    $sSql = 'DELETE FROM DELIVERY.TBPEDIDO WHERE pedcodigo =' . $iPedcodigo . ';';
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
    echo '<th>Status</th>';
    echo '<th>Valor</th>';
    echo '<th>Data</th>';
    echo '<th>Ações</th>';
    echo '</tr>';
    foreach ($aTabela as $aLinha) {
        echo '<tr>';
        echo '<td>' . $aLinha['pedcodigo'] . '</td>';
        echo '<td>' . $aLinha['usunome'] . '</td>';
        echo '<td>' . $aLinha['pedstatus'] . '</td>';
        echo '<td>' . $aLinha['pedvalor'] . '</td>';
        echo '<td>' . $aLinha['peddata'] . '</td>';
        echo '<td><a href="pedido.php?acao=deletar&registro=' . $aLinha['pedcodigo'] . '"> 
                       <button class="btn waves-effect waves-light red darken-4 " type="submit" name="action">Deletar</button></a></td>';
        echo '<td><a href="altera_pedido.php?acao=alterar&registro=' . $aLinha['pedcodigo'] . "&nome=" . $aLinha['usunome'] . "&status=" . $aLinha['pedstatus'] . "&valor=" . $aLinha['peddata'] . '"> 
                       <button class="btn waves-effect waves-light blue darken-1" type="submit" name="action">Alterar</button></a></td>';
        echo '</tr>';
    }
    echo '</table>';
}

function imprimeFormularioCadastro() {
    echo '<form method="POST" action="pedido.php?acao=cadastrar" class="col s12">';
    echo ' <div>';
    echo '<label for="usuario">Usuário</label>';
    echo ' <select name="usuario">';
    select();
    echo ' </select>';
    echo '</div>';
    echo '</br>';
    echo '<div>';
    echo '<label for=status>Status</label>';
    echo '<div>';
    echo '<br>';
    echo '<label for="naoconcluido">';
    echo '<input name="status" id="naoconcluido" type="radio" value="Não concluido"/>';
    echo '<span>Não concluído</span>';
    echo '</label>';
    echo '<label for="solicitado">';
    echo '<input name="status" id="solicitado" type="radio" value="Solicitado"/>';
    echo '<span>Solicitado</span>';
    echo '</label>';
    echo '<label for="emandamento">';
    echo '<input name="status"  id="emandamento" value="Em andamento" type="radio" />';
    echo '<span>Em andamento</span>';
    echo '</label>';
    echo '<label for="entregue">';
    echo '<input name="status" id="entregue" value="Entregue" type="radio" />';
    echo '<span>Entregue</span>';
    echo '</label>';
    echo '</div>';
    echo '<br>';
    echo '<div class="input-field">';
    echo '<label for="valor">Valor</label>';
    echo '<input type="text"  name="valor" />';
    echo '</div>';
    echo '<div>';
    echo '<label for="data">Data</label>';
    echo '<input type="date" name="data"  />';
    echo '</div>';
    echo '<button class="btn waves-effect waves-light" type="submit" name="action">Cadastrar</button>';
    echo ' </form>';
    echo ' </br>';
}

function imprimeFormularioAlteraPedido() {
    echo '<form method="POST" action="pedido.php?acao=alterar" class="col s12">';
    echo '<input type="hidden" class="validate" name="pedcodigo" value = "' . $_GET['registro'] . '">';
    echo ' <div>';
    echo '<label for="usuario">Usuário</label>';
    echo ' <select name="usuario">';
    select();
    echo ' </select>';
    echo '</div>';
    echo '</br>';
    echo '<div>';
    echo '<label for=status>Status</label>';
    echo '<div>';
    echo '<br>';
    echo '<label for="naoconcluido">';
    echo '<input name="status" id="naoconcluido" type="radio" value="' . $_GET['status'] . '"/>';
    echo '<span>Não concluído</span>';
    echo '</label>';
    echo '<label for="solicitado">';
    echo '<input name="status" id="solicitado" type="radio" value="' . $_GET['status'] . '"/>';
    echo '<span>Solicitado</span>';
    echo '</label>';
    echo '<label for="emandamento">';
    echo '<input name="status"  id="emandamento" " type="radio" value="' . $_GET['status'] . '" />';
    echo '<span>Em andamento</span>';
    echo '</label>';
    echo '<label for="entregue">';
    echo '<input name="status" id="entregue" type="radio" value="' . $_GET['status'] . '"  />';
    echo '<span>Entregue</span>';
    echo '</label>';
    echo '</div>';
    echo '<br>';
    echo '<div class="input-field">';
    echo '<label for="valor">Valor</label>';
    echo '<input type="text" name="valor"  value = "' . $_GET['valor'] . ' "/>';
    echo '</div>';
    echo '<div>';
    echo '<label for="data">Data</label>';
    echo '<input type="date"  name="data" value = "' . $_GET['data'] . '" />';
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

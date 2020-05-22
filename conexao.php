<?php

function getConexao() {
    $sHost = '127.0.0.1';
    $sPort = '5432';
    $sDbName = 'postgres';
    $sUser = 'postgres';
    $sPassword = 'postgres';

    $sConexao = "host=$sHost
                 port=$sPort
                 dbname=$sDbName
                 user=$sUser
                 password=$sPassword";

    return pg_connect($sConexao);
}

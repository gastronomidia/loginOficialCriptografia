<?php

//Configração

$serverhost = 'localhost';
$user       = 'root';
$password   = '12345678';
$database   = 'loginOficial3ddb';

//Estabelecendo conexão

$connection = mysql_connect($serverhost, $user, $password);
if($connection === FALSE)
{
    echo 'Não foi possível estabelecer conexão com o gerenciador Mysql <br/>';
    echo mysql_error();
}
else{
    if(!mysql_select_db($database, $connection))
    {
    echo 'Não foi possível escolher o banco de dados' . $database . '<br/>';
    echo mysql_error();
    }
}

<?php
include 'conexao/conecta.inc';
echo    '<meta charset=utf-8>';
session_start();

echo '<h3>Usuário Logado</h3>';

$email  = $_SESSION['email'];
$query  = "SELECT * FROM usuario WHERE EMAIL_USUARIO = '$email'";
$result = mysql_query($query);

$usuarios     = mysql_fetch_array($result);
$nome         = $usuarios['NOME_USUARIO'];

echo 'Bem vindo '.$nome.'&nbsp;&nbsp;&nbsp;&nbsp;<a href=PHPlogout.php>Sair</a>';
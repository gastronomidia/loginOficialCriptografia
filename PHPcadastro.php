<?php

include 'conexao/conecta.inc';
include 'classes/bcrypt.class.php';

//Recuperando Dados
$nome  = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$tipo  = 'RES';

//Criptografando Dados
$hash = Bcrypt::hash($senha);

//Inserindo Dados
$query  = "INSERT INTO usuario (NOME_USUARIO,EMAIL_USUARIO,SENHA_USUARIO,TIPO_USUARIO) VALUES ('$nome','$email','$hash','$tipo')";
$result = mysql_query($query);

if(!$result){
    echo mysql_error();
}
else{
    echo 'Ok';
    header('Location: frmLogin.php');
}
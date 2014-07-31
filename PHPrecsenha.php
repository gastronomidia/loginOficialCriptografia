<?php

include 'conexao/conecta.inc';
include 'classes/bcrypt.class.php';
echo '<meta charset=utf-8>';

//Recuperando Dados
$nome  = $_POST['nome'];
$email = $_POST['email'];

//Verificando Dados
$query  = "SELECT * FROM usuario WHERE EMAIL_USUARIO = '$email'";
$result = mysql_query($query);
$total  = mysql_num_rows($result);

if($total !== 1){
    
    echo 'Usuário não cadastrado<br/>';
    echo '<a href="frmCadastro.php">Cadastre-se</a>';
    
}
else{
    
    //Senha Aleatória
    $senhaNova = geraSenha(8,true,true,false);
    
    //Criptografando senha nova
    $hash = Bcrypt::hash($senhaNova);
    
    if($total === 1){
        
        $query1  = "UPDATE usuario SET SENHA_USUARIO = '$hash' WHERE EMAIL_USUARIO = '$email'";
        $result1 = mysql_query($query1);
        
        echo 'Olá '.$nome.'<br/>Senha alterada com sucesso!<br/>Sua nova senha é: <strong>'.$senhaNova.'</strong><br/><br/>Faça login:<br/>';
        echo '<a href="frmLogin.php">Login</a>';
        
    }
    else
    {
        echo 'Ocorreu um erro. Tente novamente...<br/>';
        echo '<a href="frmRecSenha.php">Recuperar senha</a>';
    }
}



///////////////////////////////////////////////////////////////////////////////////////////////////
//Retirei do TCC
//Gerar senha aleatória
function geraSenha($tamanho = 8, $maiusculas = true, $numeros = true, $simbolos = false){

// Caracteres de cada tipo
$lmin = 'abcdefghijklmnopqrstuvwxyz';
$lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
$num  = '1234567890';
$simb = '!@#$%*-';

// Variáveis internas
$retorno    = '';
$caracteres = '';

// Agrupamos todos os caracteres que poderão ser utilizados
$caracteres                  .= $lmin;
if ($maiusculas) $caracteres .= $lmai;
if ($numeros) $caracteres    .= $num;
if ($simbolos) $caracteres   .= $simb;

// Calculamos o total de caracteres possíveis
$len = strlen($caracteres);

for ($n = 1; $n <= $tamanho; $n++) {

// Criamos um número aleatório de 1 até $len para pegar um dos caracteres
$rand = mt_rand(1, $len);

// Concatenamos um dos caracteres na variável $retorno
$retorno .= $caracteres[$rand-1];

}

return $retorno;

}
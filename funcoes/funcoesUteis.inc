<?php

function validaAutentificacao($link,$tipo)
{
session_start();    
   if(!isset($_SESSION['senha']) or !isset($_SESSION['senha']))    
   {
    echo '<meta charset=UTF-8>';
    echo '<script>alert("Você não efetuou Login!")
          location.href="'.$link.'"  
          </script>';
   }
   else{
    
    if($tipo === 'RES')
    {
        include_once 'conexao/conecta.inc';
    }
    elseif ($tipo === 'ADM')
    {
        include_once '../conexao/conecta.inc';
    }
       
    $email = $_SESSION['email'];   
    $query = "SELECT * FROM usuario WHERE EMAIL_USUARIO='$email'";
    $result = mysql_query($query);
    $usuarios = mysql_fetch_array($result);
    $tipoUsuario = $usuarios['TIPO_USUARIO'];
    
    if($tipo !== $tipoUsuario)
    {
        session_destroy();
        echo '<script>alert("\n Você não possui credenciais para acessar essas páginas!")
          location.href="'.$link.'"  
          </script>';
    }
    
   }
    
}
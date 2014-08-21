<?php
include 'classes/bcrypt.class.php';
include 'conexao/conecta.inc';
echo '<meta charset=UTF-8>';

if(isset($_POST['email']) and isset($_POST['senha']))
{
    $email  = $_POST['email'];
    $senha  = $_POST['senha'];
    $query  = "SELECT * FROM usuario WHERE EMAIL_USUARIO='$email'";
    $result = mysql_query($query);
    $totalUsuarios = mysql_num_rows($result);
    
    if($totalUsuarios === 0){
        
    echo '<a href=frmlogin.php>Usuário Inexistente</a>';
    
    }else{
        $usuarios     = mysql_fetch_array($result);
        $hash         = $usuarios['SENHA_USUARIO'];
        $tipoUsuario  = $usuarios['TIPO_USUARIO'];
        
        if (!Bcrypt::check($senha, $hash)) {
            
            echo '<a href="frmlogin.php">Senha não confere!</a>';
                        
        }else{
            //Agora sim estão corretos email e senha
            session_start();
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
            
            //Agora vamos direcionar o usuario para seu ambiente (Restrito ou Administrativo)
            if($tipoUsuario === 'RES'){
               
                echo '<script type="text/javascript">
                     location.href="indexLogado.php"
                     </script>';
                
            }elseif($tipoUsuario === 'ADM'){
                
                echo '<script type="text/javascript">
                     location.href="admin/indexadmin.php"
                     </script>';
            }
            else{
                //Caso seja cadastrado um tipo de usuario diferente de (ADM ou RES)
                echo '<a href=frmlogin.php>Tipo de Usuário Invalido!</a>';
            }
            
        }
    }
    
}else{
    
    //Caso algum usuário tente acessar o arquivo login diretamente sem passar pelo frmLogin.php
    echo '<script type="text/javascript"> 
         location.href="frmlogin.php"
         </script>';
}

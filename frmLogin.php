<!DOCTYPE >
<html>
    <head>
        <meta charset="UTF-8">
        <meta lang="pt-br">
    <title> Formulário de Login </title>
    </head>
    
    <body>
        
        <h3>Login</h3>
        
        <form action="PHPlogin.php" method="POST">
                      
            Email: <input type="email" name="email" autofocus /></br>
            Senha: <input type="password" name="senha" /></br><br/>    
            
            <input type="submit" value="Entrar" name="Entrar" />
            <input type="reset" value="Limpar" name="Limpar" />
            
        </form>
        
        <a href=frmCadastro.php>Cadastre-se</a><br/>
        <a href=frmRecSenha.php>Recuperar senha</a>
       
    </body>
</html>    
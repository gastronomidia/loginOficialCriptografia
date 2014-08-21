<!DOCTYPE >
<html>
    <head>
        <meta charset="UTF-8">
        <meta lang="pt-br">
    <title> Formulário de Cadastro </title>
    </head>
    
    <body>
        
        <h3>Cadastro</h3>
        
        <form action="PHPcadastro.php" method="POST">
                      
            Nome: <input type="text" name="nome" autofocus /></br>
            Email: <input type="email" name="email" /></br>
            Senha: <input type="password" name="senha" /></br><br/>    
            
            <input type="submit" value="Entrar" name="Entrar" />
            <input type="reset" value="Limpar" name="Limpar" />
            
        </form>
        
    </body>
</html>    


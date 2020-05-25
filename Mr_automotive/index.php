<?php 
require_once 'model/usuarios.php';
$u = new Usuario;
?>

<html>
    
<head>
    <meta charset="utf-8"/>
    <title> Mr Automotive </title>
    <link rel="Stylesheet" type="text/css" href="css/estilo.css">  
</head>

<body>
    
    <div id="corpo-form">
        
    <h1>ENTRAR</h1>
    <form method="POST">
        <input type="email" name="email"  placeholder="E-mail">
        <input type="password" name="senha"  placeholder="Senha">
        <input type="submit" value="ACESSAR">
        <a href="cadastrar.php"><strong>Registrar-se</strong></a>
        <br><br>
        
    </form>
    
    </div>
    
    <?php 
      if(isset($_POST['email'])){
        $email = ($_POST['email']);
        $senha = ($_POST['senha']);
        
        
        //Verifica se todos campos estão preenchidos
        if(!empty($email) && !empty($senha)){
            
            $u->conectar("mrautomotive", "localhost", "root", "");
            if($u->msgErro == ""){
                
                if($u->logar($email, $senha)){
                    header("location: anunciante.php");
                
            }else{
                ?>
                <div id="msg-erro">
                    Email ou senha incorretos!
                </div>
    
                 <?php   
            }
      
        }else{
            
             ?>
            <div id="msg-erro">
                <?php echo "Erro".$u->msgErro; ?>
            </div>
    
            <?php
        }
      }
                
    }
   
    ?>
    
    
</body>
    
</html>
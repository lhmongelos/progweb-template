<?php
require_once 'model/usuarios.php';
$u = new Usuario();
?>

<html>
    
<head>
    <meta charset="utf-8"/>
    <title> Mr Automotive </title>
    <link rel="Stylesheet" type="text/css" href="css/estilo.css">  
</head>

<body>
    
    <div id="corpo-form-Cad">
        
    <h1>CADASTRAR-SE</h1>
    <form method="POST">
        <input type="email"  name="email" placeholder="E-mail">
        <input type="text" name="nome" placeholder="Nome">
        <input type="text" name="sobrenome" placeholder="Sobrenome">
        <input type="text" name="telefone" placeholder="Telefone">
        <input type="password" name="senha" placeholder="Senha">
        <input type="password" name="confsenha"  placeholder=" Confirmar Senha">
        <input type="submit" value="CONFIRMAR">
        <br><br>
        
    </form>
    
    </div>
    <?php 
    //Validando entrada e recuperando valores
    if(isset($_POST['nome'])){
        $email = ($_POST['email']);
        $nome = ($_POST['nome']);
        $sobrenome = ($_POST['sobrenome']);
        $telefone = ($_POST['telefone']);
        $senha = ($_POST['senha']);
        $confirmarSenha = ($_POST['confsenha']);
        
        //Verifica se todos campos estão preenchidos
        if(!empty($email) && !empty($nome) && !empty($sobrenome) && !empty($telefone)&& !empty($senha)&& !empty($confirmarSenha)){
            $u->conectar("mrautomotive", "localhost", "root", ""); //Conexão com o banco de dados phpadmin wampserver
            
          //Se não retornar nada esta tudo certo  
          if($u->msgErro == ""){
              
              
              if($senha == $confirmarSenha){
                  
                  //Insere dados no banco
                  if($u->cadastrar($email, $nome, $sobrenome, $telefone, $senha)){
                      ?>
    
                    <div id="msg-sucesso">
                         Cadastrado com sucesso
                    </div>
                      
                      
                      <?php
                  }else{
                      
                      ?>
                      <div id="msg-erro">
                         E-mail já cadastrado;
                      </div>
    
                      <?php
                  }
                  
              }else{
                  
                  ?>
                    <div id="msg-erro">
                        As senha inseridas não coinsidem";
                    </div>
    
                   <?php
                  
              }
              
              
          }else{
              ?>
            <div id="msg-erro">
                <?php echo "Erro".$u->msgErro; ?>
            </div>
    
            <?php
              
              echo "Erro".$u->msgErro;  
          }
        }else{
             ?>
            <div id="msg-erro">
                Preencha todos os campos!
             </div>
    
            <?php
            
        }
    }
    
    ?>
    
    
    
</body>
    
</html>


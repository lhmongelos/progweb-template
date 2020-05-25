<?php

//Classes que irão gerenciar os processos relacionados ao usuárop
class Usuario{
   
    //Variavel que irá instancoar o PDO
    private $pdo;
   
    public $msgErro = "";
    
    //Conexão com o banco de dados
    public function conectar ($nome, $host, $usuario, $senha) {
        
        global $pdo;//Refere-se a variavel pdo acima.
        
        try{
            $pdo = new PDO("mysql:dbname=".$nome.";host=".$host,$usuario,$senha);
            
        } catch (PDOExceptionE $e){
            $this->msgErro = $e->getMessage();
        }
    }
    
    
    //Classe de registro de usuário
    public function cadastrar($email, $nome, $sobrenome,$telefone, $senha ) {
        
       
        global $pdo;//Refere-se a variavel pdo acima.
        
        //Verifica se já exciste o e-mail cadastrado -> se retornar um id, um usuário já existe.
        $sql = $pdo->prepare("SELECT idusuario FROM usuario WHERE email = :e");
        $sql->bindValue(":e", $email);
        $sql->execute();
        if($sql->rowCount() > 0){
            return false;//Já esta cadastrada
            
        }else{
          //Caso não o  cadastrado é realizado 
            $sql = $pdo->prepare("INSERT INTO usuario (nome,sobrenome,telefone,email,senha) VALUES (:n, :sn, :t, :e, :s)");
            $sql->bindValue(":n",$nome);
            $sql->bindValue(":sn",$sobrenome);
            $sql->bindValue(":t",$telefone);
            $sql->bindValue(":e",$email);
            $sql->bindValue(":s", md5($senha));//Md5 para criptografar senha
            $sql->execute();
            return true;
        }
        
        
    }
    
    public function logar($email, $senha){
        
        global $pdo;//Refere-se a variavel pdo acima.
        
        //Valida se o e-mail e senha estão corretos
        $sql = $pdo->prepare("SELECT idusuario FROM usuario WHERE email =:e AND senha = :s");
        $sql->bindValue(":e",$email);
        $sql->bindValue(":s",$senha);
        $sql->execute();
        
        if($sql->rowCount() > 0){
           //Cria sessão de acesso caso e-mail e senha estejam corretos 
            $dado = $sql->fetch(); //Transforma o retorno no banco em um array
            
            //Inicia sessao caso login seja realizado
            session_start();
            $_SESSION['idusuario'] = $dado['idusuario'];
            return true; //Login realizado com sucesso
        }else{
            return false; //Login não foi realizado
            
            
        }
        
    }
}


?>


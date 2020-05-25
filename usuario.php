<?php

Class Usuario{
    private $pdo;
    public $msgErro = ""; //inicia vaxioa; para verificar a existência de erro

    //métodos somente para conectar com Banco de Dados
    public function concectar($nome, $host, $usuario, $senha){
        global $pdo;
        try {
            $pdo = new PDO("mysql:dbname=".$nome.";host=".$host,$usuario,$senha);
        } catch (PDOExcaeption $e) {
            $msgErro = $e->getMessage();
        }
    }


    //método Cadastrar
    public function cadastrar($nome, $email, $login, $senha){
        global $pdo;
        //Verificar se já existe o email cadastrado
        $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = e");
        $sql->bindValue(":e",$email);
        $sql->execute();

        if($sql->rowCount > 0){
            return false; //já está cadastrada
        } else {
            //não está cadastrada, logo vai cadastrar
            $sql = $pdo->prepare("INSERT INTO usuarios (nome, email, login, senha) VALUES (:n, :e, :l, :s)");
            $sql->bindValue(":n",$nome);
            $sql->bindValue(":t",$email);
            $sql->bindValue(":l",$login);
            $sql->bindValue(":s",md5($senha));
            $sql->execute();
            return true;
        }
    }


    public function logar($username, $senha){

        global $pdo;

        //comandos para verificar se o email estao cadastrados, se sim
        $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE username = :e AND senha = :s");
        $sqp->bindValue(":u",$username);
        $sqp->bindValue(":s",$userpass);
        $sqp->execute();


        //verifica se retorna algum id depois desses comandos acima
        //se sim, significa que username foi cadastrado e que pode entrar no sistema
        if($sql->rowCount() > 0){
            
            $dado = $sql->fetch(); //função fetch que trasnforma os dados vindo do BD em uma array, com nome das colunas
            session_start(); //starta a sessão 
            $_SESSION['id_usuario'] = $dado['id_usuario']; //cria a sessão id_usuario e armazena o id dela
            return true; //casdatrado e conseguiu logar

        } else { //se não, não é possivel logar
            return false;
        }
    }
}

?>
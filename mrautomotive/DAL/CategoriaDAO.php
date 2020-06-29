<?php

//Importando o arquivo banco de dados
require_once("Banco.php");


if (file_exists("../Util/ClassSerialization.php")) {
    require_once("../Util/ClassSerialization.php");
} elseif (file_exists("Util/ClassSerialization.php")) {
    require_once("Util/ClassSerialization.php");
}


//Criando classe Categoria DAO
class CategoriaDAO {
  
    //Variaveis da classe 
    private $pdo;
    private $debug;
    
    
    //Contructor da classe 
    public function _contruct(){
        
        $this->pdo = new Banco();//Instanciando comnunicação com o banco
        $this->debug = true;
    }
    
      //Criando Método para alterar as categorias
      public function Cadastrar(Categoria $categoria) {
        try {
            $sql = "INSERT INTO categoria (nome, thumb, descricao, link) VALUES (:nome, :thumb, :descricao, :link)";
            $param = array(
                ":nome" => $categoria->getNome(),
                "thumb" => $categoria->getThumb(),
                ":descricao" => $categoria->getDescricao(),
                ":link" => $categoria->getLink(),
                
            );

            return $this->pdo->ExecuteNonQuery($sql, $param);
        } catch (PDOException $ex) {
            if ($this->debug) {
                echo "ERRO: {$ex->getMessage()} LINE: {$ex->getLine()}";
            }
            return false;
        }
    }
    
    
    //Criando Método para alterar as categorias
    public function Alterar(Categoria $categoria) {
        try {
            $sql = "UPDATE categoria SET nome = :nome, descricao = :descricao, link = :link, categoria_cod = :categoriacod WHERE cod = :cod";
            $param = array(
                ":nome" => $categoria->getNome(),
                ":descricao" => $categoria->getDescricao(),
                ":link" => $categoria->getLink(),
                ":categoriacod" => $categoria->getSubcategoria(),
                ":cod" => $categoria->getCod()
            );

            return $this->pdo->ExecuteNonQuery($sql, $param);
        } catch (PDOException $ex) {
            if ($this->debug) {
                echo "ERRO: {$ex->getMessage()} LINE: {$ex->getLine()}";
            }
            return false;
        }
    }
    
    
    //Criando classe para retornar as categorias na tela do 
    public function RetornarCategoriasResumido() {
        
       /* 
        try {
            
            $sql = "SELECT cod, nome, categoria_cod FROM categoria ORDER BY categoria_cod, nome ASC"; //SQL de consulta
            
            //Executa consulta e armazena na variavel 
            
            $dt = $this->pdo->ExecuteQuery($sql);
            $listaCategoria = [];//Array que recebera o resultado da consulta
            
            //Para cada retorno o array irá receber os dados da consulta
            foreach ($dt as $cat) {
                $categoria = new Categoria();
                $categoria->setCod($cat["cod"]);
                $categoria->setNome($cat["nome"]);
                $listaCategoria[] = $categoria;
            }

            return $listaCategoria;//Retorna o array
        } catch (PDOException $ex) {
            if ($this->debug) {
                echo "ERRO: {$ex->getMessage()} LINE: {$ex->getLine()}";
            }
            return null;
        }*/
    }
  
} 

?>
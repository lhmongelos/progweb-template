<?php

require_once("Banco.php");

    class MarcaDao {

        private $pdo;
        private $debug;

        public function __construct() {
            $this->pdo = new Banco();
            $this->debug = true;
        }
        
        
        //Metodo para cadastrar Modelo
        public function Cadastrar(Marca $marca) {
            try {
                $sql = "INSERT INTO marca (nome,  descricao) VALUES (:nome, :descricao)";
                $param = array(
                 ":nome" =>$marca->getNome(),
                 ":descricao" =>$marca->getDescricao(),   
                );

                return $this->pdo->ExecuteNonQuery($sql, $param);
            } catch (PDOException $ex) {
                if ($this->debug) {
                    echo "ERRO: {$ex->getMessage()} LINE: {$ex->getLine()}";
                }
                return false;
            }
        }
        
        
         //metodo para alterar o usuário
    public function Alterar(Marca $marca) {
        try {
            $sql = "UPDATE modelo SET nome = :nome, descrcao = :descricao WHERE cod = :cod";
            $param = array(
                ":nome"=>$marca.getNome(),
                ":email" =>$marca.getDescricao(),
                
            );

            return $this->pdo->ExecuteNonQuery($sql, $param);
        } catch (PDOException $ex) {
            if ($this->debug) {
                echo "ERRO: {$ex->getMessage()} LINE: {$ex->getLine()}";
            }
            return false;
        }
    }
        
      // Metodos para Busca usuário conforme o tipo de pesquisa
    public function RetornarMarca() {
    
        try {
            
            $sql = "SELECT cod, nome FROM marca ORDER BY  nome ASC"; //SQL de consulta
            
            //Executa consulta e armazena na variavel 
            
            $dt = $this->pdo->ExecuteQuery($sql);
            $listaMarca = [];//Array que recebera o resultado da consulta
            
            //Para cada retorno o array irá receber os dados da consulta
            foreach ($dt as $cat) {
                $marca = new Marca();
                $marca->setCod($cat["cod"]);
                $marca->setNome($cat["nome"]);
                $listaMarca[] = $marca;
            }

            return $listaMarca;//Retorna o array
        } catch (PDOException $ex) {
            if ($this->debug) {
                echo "ERRO: {$ex->getMessage()} LINE: {$ex->getLine()}";
            }
            return null;
        }
    } 
            
    }
      
    
?>    


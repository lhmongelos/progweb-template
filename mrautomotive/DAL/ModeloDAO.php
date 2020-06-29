<?php

require_once("Banco.php");

    class ModeloDao {

        private $pdo;
        private $debug;

        public function __construct() {
            $this->pdo = new Banco();
            $this->debug = true;
        }
        
        
        //Metodo para cadastrar Modelo
        public function Cadastrar(Modelo $modelo) {
            try {
                $sql = "INSERT INTO modelo (nome,  descricao) VALUES (:nome, :descricao)";
                $param = array(
                 ":nome" =>$modelo->getNome(),
                 ":descricao" =>$modelo->getDescricao(),   
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
    public function Alterar(Modelo $modelo) {
        try {
            $sql = "UPDATE modelo SET nome = :nome, descrcao = :descricao WHERE cod = :cod";
            $param = array(
                ":nome"=>$modelo.getNome(),
                ":email" =>$modelo.getDescricao(),
                
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
    public function RetornarModelo() {
    
        try {
            
            $sql = "SELECT cod, nome FROM modelo ORDER BY  nome ASC"; //SQL de consulta
            
            //Executa consulta e armazena na variavel 
            
            $dt = $this->pdo->ExecuteQuery($sql);
            $listaModelo = [];//Array que recebera o resultado da consulta
            
            //Para cada retorno o array irá receber os dados da consulta
            foreach ($dt as $cat) {
                $modelo = new Modelo();
                $modelo->setCod($cat["cod"]);
                $modelo->setNome($cat["nome"]);
                $listaModelo[] = $modelo;
            }

            return $listaModelo;//Retorna o array
        } catch (PDOException $ex) {
            if ($this->debug) {
                echo "ERRO: {$ex->getMessage()} LINE: {$ex->getLine()}";
            }
            return null;
        }
    }
             
    }
    
     
    
    
?>    
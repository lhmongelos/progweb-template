<?php

    //Importando arquivo DAO
    if (file_exists("../DAL/ModeloDAO.php")) {
        require_once("../DAL/ModeloDAO.php");
    } elseif (file_exists("DAL/ModeloDAO.php")) {
        require_once("DAL/ModeloDAO.php");
    }

    //Implementando a classe controladora de categoria
    class ModeloController {

        //Atributo da classe 
        private $modeloDAO;

        //Contrutor da classe
        function __construct() {
            $this->modeloDAO = new ModeloDao(); //Instanciando a classe categoriaDao
        }
        
        
        //Implementando a Função de cadastro
    public function Cadastrar(Modelo $modelo) {
        //Se as condiçoes forem verdaderira
        if (strlen($modelo->getNome()) > 5 &&  strlen($modelo->getDescricao()) > 10) {
            return $this->modeloDAO->Cadastrar($modelo); //Retorna o cadastro
        } else {
            return false;//retorna falso caso algumas das condições acima não seja seguida
        }
    }
    //Implementando a Função de Alteração
    public function Alterar(Modelo $modelo) {
        if (strlen($modelo->getNome()) > 5  && strlen($modelo->getDescricao()) > 10) {
            return $this->modeloDAO->Alterar($modelo);
        } else {
            return false;
        }
    }
    
     //Funções para retornar as categorias
    public function RetornarModelo() {
        return $this->modeloDAODAO->RetornarModelo();
    }
        
     
    
        
    }
    
 ?>   
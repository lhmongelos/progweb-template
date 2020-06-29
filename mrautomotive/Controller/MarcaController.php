<?php

    //Importando arquivo DAO
    if (file_exists("../DAL/MarcaDAO.php")) {
        require_once("../DAL/MarcaDAO.php");
    } elseif (file_exists("DAL/MarcaDAO.php")) {
        require_once("DAL/MarcaDAO.php");
    }

    //Implementando a classe controladora de categoria
    class MarcaController {

        //Atributo da classe 
        private $marcaDAO;

        //Contrutor da classe
        function __construct() {
            $this->marcaDAO = new MarcaDao(); //Instanciando a classe categoriaDao
        }
        
        
        //Implementando a Função de cadastro
    public function Cadastrar(Marca $marca) {
        //Se as condiçoes forem verdaderira
        if (strlen($marca->getNome()) > 5 &&  strlen($marca->getDescricao()) > 10) {
            return $this->marcaDAO->Cadastrar($marca); //Retorna o cadastro
        } else {
            return false;//retorna falso caso algumas das condições acima não seja seguida
        }
    }
    //Implementando a Função de Alteração
    public function Alterar(Marca $marca) {
        if (strlen($marca->getNome()) > 5  && strlen($marca->getDescricao()) > 10) {
            return $this->marcaDAO->Alterar($marca);
        } else {
            return false;
        }
    }
    
     //Funções para retornar as categorias
    public function RetornarMarca() {
        return $this->marcaDAO->RetornarMarca();
    }
        
     
    
        
    }
    
 ?>  

<?php

//Importando arquivo DAO
if (file_exists("../DAL/CategoriaDAO.php")) {
    require_once("../DAL/CategoriaDAO.php");
} elseif (file_exists("DAL/CategoriaDAO.php")) {
    require_once("DAL/CategoriaDAO.php");
}

//Implementando a classe controladora de categoria
class CategoriaController {
    
    //Atributo da classe 
    private $categoriaDAO;

    //Contrutor da classe
    function __construct() {
        $this->categoriaDAO = new CategoriaDAO(); //Instanciando a classe categoriaDao
    }
    
    //Implementando a Função de cadastro
    public function Cadastrar(Categoria $categoria) {
        //Se as condiçoes forem verdaderira
        if (strlen($categoria->getNome()) > 5 && strlen($categoria->getLink()) > 5 && $categoria->getThumb() != "" && strlen($categoria->getDescricao()) > 10) {
            return $this->categoriaDAO->Cadastrar($categoria); //Retorna o cadastro
        } else {
            return false;//retorna falso caso algumas das condições acima não seja seguida
        }
    }
    //Implementando a Função de Alteração
    public function Alterar(Categoria $categoria) {
        if (strlen($categoria->getNome()) > 2 && strlen($categoria->getLink()) > 2 && $categoria->getCod() > 0 && strlen($categoria->getDescricao()) > 10) {
            return $this->categoriaDAO->Alterar($categoria);
        } else {
            return false;
        }
    }
    //Implementando a Função para alterar imagem da categoria
    public function AlterarImagem(string $thumb, int $cod) {
        if (trim(strlen($thumb)) > 0 && $cod > 0) {
            return $this->categoriaDAO->AlterarImagem($thumb, $cod);
        } else {
            return false;
        }
    }
    
    //Funções para retornar as categorias
    public function RetornarCategoriasResumido() {
        return $this->categoriaDAO->RetornarCategoriasResumido();
    }

    public function RetornarTodos() {
        return $this->categoriaDAO->RetornarTodos();
    }

    public function RetornarTodosJSON() {
        return $this->categoriaDAO->RetornarTodosJSON();
    }

    public function RetornarCod(int $cod) {

        if ($cod > 0) {
            return $this->categoriaDAO->RetornarCod($cod);
        } else {
            return null;
        }
    }

}

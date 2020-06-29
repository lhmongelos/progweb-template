<?php 
    
class Marca{
    
    private $cod;
    private $nome;
    private $descricao;
    
    function getCod() {
        return $this->cod;
    }

    function getNome() {
        return $this->nome;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function setCod($cod): void {
        $this->cod = $cod;
    }

    function setNome($nome): void {
        $this->nome = $nome;
    }

    function setDescricao($descricao): void {
        $this->descricao = $descricao;
    }


}


?>


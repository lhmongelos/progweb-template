
<!--  Arquivo para realizar o upload da imagem de categorias-->
<?php


//Criando a classe 
class Upload {
    
    
    //Atributos privados (arrays)
    private $arrFormatImages;
    private $arrFormatFiles;

    
    //Contrutor da classe (mime types)
    //Valida o tipo do conteudo (img)
    public function __construct() {
        $this->arrFormatImages = array(
            "image/jpeg",
            "image/png"
        );
        
        
        
        //Formatos de arquivos (file)
        $this->arrFormatFiles = array(
            "application/zip",
            "multipart/x-zip",
            "application/x-compressed",
            "application/x-gzip",
            "text/html", 
        );
    }

    
    //Função para carregar arquivo (Caminho, tipo (Img, file) , renomear arquivo)
    public function LoadFile($path, $type, $file, $renameFile = true) {
        $fl = $file['type'];//recebe o arquivo
        $validFormat = false;
        
        //Valida se o arquivo é uma imagem
        if ($type == "img") {
            foreach ($this->arrFormatImages as $result) {
                if ($fl == $result) {
                    $validFormat = true;
                }
            }
        }
        //Valida se o arquivo é um file
        if ($type == "file") {
            foreach ($this->arrFormatFiles as $result) {
                if ($fl == $result) {
                    $validFormat = true;
                }
            }
        }
        
        //Valida se o formato é valido ou não
        if ($validFormat) {
            $finalName = ""; //recebe nome vazio
            if ($renameFile) { //se o arquivo for renomeado executa o explode para realizar a extensão do arquivo
                $explode = explode(".", $file['name']);//retorna a data e hora atual
                $finalName = md5(time()) . "." . $explode[(count($explode) - 1)];
            } else {
                $finalName = $file['name'];//Pega o nome original do arquivo caso nao haja alteração
            }
            
            //Metodo por fazer o upload do arquivo e movelo para a pasta que foi definida
            if (move_uploaded_file($file['tmp_name'], $path . "/" . $finalName)) {
                return $finalName;//Retorna o nome do arquivo
            } else {
                return "";
            }
        } else {
            return "invalid";
        }
    }

}

?>
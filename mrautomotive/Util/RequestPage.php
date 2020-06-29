<!-- Arquivo para carregar as paginas solicitadas - Reponsivo -->
<?php

$pagina = filter_input(INPUT_GET, "pagina", FILTER_SANITIZE_STRING);

//echo $pagina;

//Carrega as páginas de acordo com o nome solicitado 
$arrayPaginas = array(
    "home" => "View/home.php", //Página inicial
    "usuario" => "View/UsuarioView/UsuarioView.php",//Pagina do usuário
    "alterarsenha" => "View/UsuarioView/AlterarSenhaView.php", //pagina para alterar senha
    "visualizarusuario" => "View/UsuarioView/VisualizarView.php",//pagina para visualizar usuário
    "classificado" => "View/ClassificadoView/ClassificadoView.php",//pagina para visualizar classificado
    "categoria" => "View/CategoriaView/CategoriaView.php",//Pagina para vesualizar categorias
    "modelo" => "View/ModeloView/ModeloView.php",//Pagina para vesualizar Modelos
    "marca" => "View/MarcaView/MarcaView.php",//Pagina para vesualizar Marcas
    "categoriaimagem" => "View/CategoriaView/AlterarImagem.php",//Pagina para alterar imagem da categoria
    "gerenciarimagemclassificado" => "View/ClassificadoView/ImagensClassificadoView.php", //Pagina para vesualizar classificados
    "visualizarclassificado" => "View/ClassificadoView/VisualizarClassificado.php", ////Pagina para vesualizar categorias
);

//
if ($pagina) {
    $encontrou = false;

    foreach ($arrayPaginas as $page => $key) {
        if ($pagina == $page) {
            $encontrou = true;
            require_once($key);
        }
    }

    if (!$encontrou) {
        require_once("View/home.php");
    }
} else {
    require_once("View/home.php");
}
?>
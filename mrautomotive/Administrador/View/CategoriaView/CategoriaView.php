<?php
require_once("../Util/UploadFile.php");
require_once("../Model/Categoria.php");
require_once("../Controller/CategoriaController.php");
$categoriaController = new CategoriaController();

$cod = "";
$nome = "";
$link = "";
$thumb = "";
$subcategoria = 0;
$descricao = "";
$resultado = "";

if (filter_input(INPUT_POST, "btnGravar", FILTER_SANITIZE_STRING)) {
    $categoria = new Categoria();
    $categoria->setCod(filter_input(INPUT_GET, "cod", FILTER_SANITIZE_NUMBER_INT));
    $categoria->setNome(filter_input(INPUT_POST, "txtNome", FILTER_SANITIZE_STRING));
    $categoria->setLink(filter_input(INPUT_POST, "txtLink", FILTER_SANITIZE_STRING));
    $categoria->setDescricao(filter_input(INPUT_POST, "txtDescricao", FILTER_SANITIZE_STRING));

    


    if (!filter_input(INPUT_GET, "cod", FILTER_SANITIZE_NUMBER_INT)) {
        //Cadastro
        $upload = new Upload();
        $nomeImagem = $upload->LoadFile("../img/Categorias/", "img", $_FILES["flImagem"]);
        $categoria->setThumb($nomeImagem);

        if ($nomeImagem != "" && $nomeImagem != "invalid") {
            //Método de cadastro

            if ($categoriaController->Cadastrar($categoria)) {
                ?>
                <script>
                    document.cookie = "msg=1";
                    document.location.href = "?pagina=categoria";
                </script>
                <?php
            } else {
                $resultado = "<div class=\"alert alert-danger\" role=\"alert\">Houve um erro ao tentar cadastrar a categoria.</div>";
            }
        } else if ($nomeImagem == "invalid") {
            $resultado = "<div class=\"alert alert-danger\" role=\"alert\">Formato de imagem inválido.</div>";
        } else {
            $resultado = "<div class=\"alert alert-danger\" role=\"alert\">Houve um erro ao tentar carregar a imagem.</div>";
        }
    } else {
        //Editar
        if ($categoriaController->Alterar($categoria)) {
            ?>
            <script>
                document.cookie = "msg=2";
                document.location.href = "?pagina=categoria";
            </script>
            <?php
        } else {
            $resultado = "<div class=\"alert alert-danger\" role=\"alert\">Houve um erro ao tentar alterar a categoria.</div>";
        }
    }
}

if (filter_input(INPUT_GET, "cod", FILTER_SANITIZE_NUMBER_INT)) {
    $categoria = $categoriaController->RetornarCod(filter_input(INPUT_GET, "cod", FILTER_SANITIZE_NUMBER_INT));
    if ($categoria != null) {
        $cod = filter_input(INPUT_GET, "cod", FILTER_SANITIZE_NUMBER_INT);
        $nome = $categoria->getNome();
        $link = $categoria->getLink();
        $thumb = "img";
        $descricao = $categoria->getDescricao();
    }
}


//$listaResumida = $categoriaController->RetornarCategoriasResumido();
//$listaCategoria = $categoriaController->RetornarTodos();
?>

<div id="dvCategoriaView">
    <h1>Gerenciar Categorias</h1>
    <br />
    
    <!--Contruindo visual da página de categorias-->
    <div class="panel panel-default maxPanelWidth">
            <div class="panel-heading">CADASTRAR E EDITAR CATEGORIAS</div>
            <div class="panel-body">
                <!-- https://www.w3schools.com/php/php_file_upload.asp - enctype  -->
                <form method="post" id="frmGerenciar" name="frmGerenciar" novalidate enctype="multipart/form-data" >

                    <div class="row">
                        <!-- Campo do nome da categoria -->
                        <div class="col-lg-6 col-xs-12">
                            <div class="form-group">
                                <input type="hidden" id="txtCodCategoria" value="<?=$cod;?>"/>
                                <label for="txtNome">Nome da categoria</label>
                                <input type="text" class="form-control" id="txtNome" name="txtNome" placeholder="ex: utilitario" value="<?= $nome; ?>">
                            </div>
                        </div>
                        <!-- Campo do link da categoria -->
                        <div class="col-lg-6 col-xs-12">
                            <div class="form-group">
                                <label for="txtLink">Link</label>
                                <input type="text" class="form-control" id="txtLink" name="txtLink" placeholder="Link da imagem"  value="<?= $link; ?>">
                            </div>
                        </div>
                    </div>
                    <!-- Campo para inserir a imagem / icone da categoria -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="flImagem">Selecione uma imagem</label>
                                <input type="file" id="flImagem" name="flImagem">
                                
                            </div>
                        </div>
                    </div>
                    <!-- Campo para inserir a descrição da categoria  -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="txtDescricao">Descrição</label>
                                <textarea class="form-control" rows="3" id="txtDescricao" name="txtDescricao"><?=$descricao?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <p id="pResultado"><?= $resultado; ?></p>
                        </div>
                    </div>
                    <input class="btn btn-success" type="submit" name="btnGravar" value="Gravar">
                    <a href="#" class="btn btn-danger">Cancelar</a>

                    <br />
                    <br />
                    <div class="row">
                        <div class="col-lg-12">
                            <ul id="ulErros"></ul>
                        </div>
                    </div>
                </form>
            </div>
     </div>                  
</div>

<!-- Script de validação de dados do Formulário -->
<script> 
    $(document).ready(function () {
        
        //Se a mensagem de retorno do processo de cadastro for 1 retorna mensagem de sucesso
        if (getCookie("msg") == 1) {
            document.getElementById("pResultado").innerHTML = "<div class=\"alert alert-success\" role=\"alert\">Categoria cadastrado com sucesso.</div>";
            document.cookie = "msg=d";
        }
        //Impede o envio do formulario caso haja erro
        $("#frmGerenciar").submit(function (e) {
            if (!ValidarFormulario()) {
                e.preventDefault();
            }
        });
        
            //Valida  se há erros na inserção do formulário
            function ValidarFormulario() {
            var erros = 0;
            var ulErros = document.getElementById("ulErros");
            ulErros.style.color = "red";
            ulErros.innerHTML = "";


            //Valida a entrada nome
            if (document.getElementById("txtNome").value.length < 5) {
                var li = document.createElement("li");
                li.innerHTML = "- Informe o nome da categoria";
                ulErros.appendChild(li);
                erros++;
            }

            //Valida a entrada do link
            if (document.getElementById("txtLink").value.length < 2) {
                var li = document.createElement("li");
                li.innerHTML = "- Informe o link para imagem";
                ulErros.appendChild(li);
                erros++;
            }

            //Se o condigo for igual a zero ( Um cadastro será realizado)
            //Valida se houve entrada da imagem da categoria
            if ($("#txtCodCategoria").val() == "") {
                if (document.getElementById("flImagem").value == "") {
                    var li = document.createElement("li");
                    li.innerHTML = "- Selecione uma imagem";
                    ulErros.appendChild(li);
                    erros++;
                }
            }
            
            //Valida se foi inserida a descrição da categoria 
            if (document.getElementById("txtDescricao").value.length < 10) {
                var li = document.createElement("li");
                li.innerHTML = "- Informe a descrição da categoria";
                ulErros.appendChild(li);
                erros++;
            }

            if (erros == 0) {
                return true;
            } else {
                return false;
            }
        }
    }); 
</script>
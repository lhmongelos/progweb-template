<?php

    //Declarando variaveis
    $nome = "";
    $link = "";
    $descricao = "";
    $resultado = "";
    $cod = "";
?>

<div id="dvCategoriaView">
    <h1>Gerenciar Marcas</h1>
    <br />
    
    <!--Contruindo visual da página de categorias-->
    <div class="panel panel-default maxPanelWidth">
            <div class="panel-heading">CADASTRAR E EDITAR MARCAS</div>
            <div class="panel-body">
                <form method="post" id="frmGerenciar" name="frmGerenciar" novalidate>

                    <div class="row">
                        <!-- Campo do nome da categoria -->
                        <div class="col-lg-6 col-xs-12">
                            <div class="form-group">
                                <input type="hidden" id="txtCategoria" value="<?=$cod;?>"/>
                                <label for="txtNome">Nome da Marca</label>
                                <input type="text" class="form-control" id="txtNome" name="txtNome" placeholder="ex: Fiat" value="<?= $nome; ?>">
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




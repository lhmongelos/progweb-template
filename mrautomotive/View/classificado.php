<?php
$cod = filter_input(INPUT_GET, "cod", FILTER_SANITIZE_NUMBER_INT);
$classificado = null;
$resultado = " ";

if ($cod > 0) {

    require_once("Controller/ClassificadoController.php");
    require_once("Controller/ImagemController.php");
    require_once("Model/Classificado.php");

    
    

    $classificadoController = new ClassificadoController();
    $imagemController = new ImagemController();
    

    $classificado = $classificadoController->RetornarAnuncioClassificadoCod($cod);

   
}
?>

<div id="dvClassificado">
    <?php
    if ($classificado->getCod() > 0) {
        $listaImagem = $imagemController->RetornarImagensClassificadoResumida($cod);

        $tipoAnucio = "";
        if ($classificado->getTipo() == 1) {
            $tipoAnucio = "Venda";
        } else if ($classificado->getTipo() == 2) {
            $tipoAnucio = "Troca";
        } else {
            $tipoAnucio = "Doação";
        }
        ?>
        <h1><?= $classificado->getNome(); ?></h1>
        <br />
        <!--        <div id="sliderImagemClassificado">
                    <img src="img/Classificados/<?= $listaImagem[0][0]; ?>" alt=""/>
                </div>-->
        <div id="dvImagensAnuncioPainel">
            <?php
            foreach ($listaImagem as $img) {
                ?>
                <a href="#" onclick="OpenModal('<?= $img; ?>');"><img src="img/Classificados/<?= $img; ?>" alt="Imagem - <?= $classificado->getNome(); ?>"></a>
                <?php
            }
            ?>
        </div>
        <br />
        <p><span class="bold">Proprietário:</span> <?= $classificado->getUsuario()->getNome(); ?></p>
         
        <div class="line"></div>

        <p><span class="bold">Categoria:</span> <?= $classificado->getCategoria()->getNome(); ?></p>
        <br/>
        <p><span class="bold">Tipo de anúncio:</span> <?= $tipoAnucio; ?></p>
        <br/>
        
        <p><span class="bold">Valor:</span> R$ <?= number_format($classificado->getValor(), 2, ",", " "); ?></p>
        <br/>
        <p><span class="bold">Descrição:</span> <?= html_entity_decode($classificado->getDescricao()); ?></p>
        <br />

        <?php
        if (isset($_SESSION["cod"])) {
            ?>
            
            <?php
        } else {
            echo "Para comentar você precisa estar autenticado.";
        }
        ?>
        <br>  <br>
        <div id="dvComentariosUsuarios">
            
        </div>
        <?php
    } else {
        ?>
        <h1>Conteúdo não encontrado</h1>
        <br />
        <div>
            <p>Desculpe, o classificado que você procura não existe ou não foi encontrado.</p>
            <p>Por favor, faça uma busca através do menu acima.</p>
        </div>
        <?php
    }
    ?>

</div>
<br />
<div id="dvModal">
    <div>
        <img src="" alt="Imagem Classificado" id="imgModal" />
        <br>
        <button onclick="CloseModal();">Fechar</button>
    </div>
</div>
<script>
    function OpenModal(image) {
        $("#dvModal").show("normal");
        document.getElementById("imgModal").src = "img/classificados/" + image;
    }
    function CloseModal() {
        $("#dvModal").hide("normal");
    }

    $(document).ready(function () {
        $("#txtComentario").keyup(function () {
            ContarCaracteres();
        });


        $("#frmComentario").submit(function (event) {

            if (ContarCaracteres() < 0) {
                event.preventDefault();
                $("#pResultado").text("Formulário inválido");
                $("#pResultado").css("color", "red");
            }
        });


    });

    function ContarCaracteres() {
        var total = 500;
        var txtComentario = $("#txtComentario").val();

        var atual = (total - txtComentario.length);

        if (atual < 0) {
            $("#spCaracteresRestantes").css("color", "red");
            $("#txtComentario").css("border", "1px solid red");
        } else {
            $("#spCaracteresRestantes").css("color", "black");
            $("#txtComentario").css("border", "1px solid green");
        }

        $("#spCaracteresRestantes").text(atual);
        return atual;
    }
</script>
<?php
session_start();

require_once("Controller/ClassificadoController.php");
require_once("Model/ViewModel/ClassificadoConsulta.php");

$classificadoController = new ClassificadoController();

$listaUltimosClassificadosLateral = $classificadoController->RetornarUltimosClassificados(5);
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Home - Mr Automotive</title>
        <meta name="viewport" content="width=device-width, initial-scale=1,minimum-scale=1, maximum-scale=1" />
        <script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
        <link href="css/style.css?x=1" rel="stylesheet" type="text/css"/>
        <link href="css/unsemantic-grid-responsive.css" rel="stylesheet" media="all" />
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link rel="shortcut icon" href="img/favicon.ico" />
        <script src="js/script.js" type="text/javascript"></script>
        <script src="js/cookie.js" type="text/javascript"></script>
    </head>
    <body>
        <!--Topo do site-->
        <div id="dvTopo">
            <div class="row" style="padding: 10px; max-width: 1200px;">
                <div class="hide-on-desktop mobile-grid-25">
                    <img src="img/mobile-icon.png" alt="Menu Mobile" id="menuMobile"/> <!-- Definindo Logo da pagina --> 
                </div>

                <div class="grid-70 mobile-grid-75">
                    <a href="index.php"><img src="img/mrlogo.png" alt="Logo Mr Automotive" /></a>
                </div>
                
                <!-- Definindo informações do canto direito do topo da tela -->
                <div class="grid-30 hide-on-mobile" style="text-align: center;">
                    <p>Implementado por: <span class="bold">Diego A Herzer</span></p>
                    <p>Implementado por: <span class="bold">Graciele B Matsuda</span></p>
                    <p>Implementado por:  <span class="bold">Luiz H Mongelos</span></p>
                    <p><span class="bold">UFMS - PROG WEB</span></p>
                </div>



            </div>
            <div class="clear"></div>
        </div>

        <!--Definindo ações da barra - Menu da pagina-->
        <div id="dvMenuTopo" class="hide-on-mobile">
            <div class="grid-container">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <?php
                    if (!isset($_SESSION["cod"])) {
                        ?>
                        <li><a href="?pagina=entrar">Entrar</a></li>
                        <?php
                    }
                    ?>
                    <li><a href="?pagina=cadastro">Cadastro</a></li>
                    
                    <?php
                    if (isset($_SESSION["cod"])) {
                        ?>
                        <li><a href="?pagina=painel">Painel</a></li> 
                        <li><a href="logout.php">Sair</a></li>
                        <?php
                    }
                    ?>
                </ul> 
            </div>
        </div>
        
        <br>
        
        <!-- Contruindo fixo do site  -->
        <!--Conteúdo centro do site-->
        <div id="dvConteudo" class="grid-container">
            <div class="grid-60 mobile-grid-100 suffix-10" id="dvEsquerda">
                <!--Menu Pesquisa-->
                <div class="grid-parent grid-100" id="boxBusca">
                    <input type="text" id="txtBusca" placeholder="Buscar" />
                    <select id="slBusca"></select>
                    <select id="slBusca"></select><br/>
                    
                    <button id="btnBuscar" class="btnconfig">Buscar</button>
                </div>
                <br />
                <?php
                require_once("Util/ResquestPageSite.php");
                ?>               
            </div> 
            <br>  <br>
            <div class="grid-30 mobile-grid-100" id="dvDireita">
                <!--Redes sociais-->
                <div class="boxDireita grid-parent grid-100" id="imagem">
                    <a href="?pagina=anunciar"><img src="img/Anuncie.png" alt=""/></a>
                    
                </div>


                <!---->
                <div class="boxDireita grid-parent grid-100">
                    <p class="titulosRecentes">Envios recentes</p>
                    <ul class="ulListaLateral">
                        <?php
                        $cont = 0;
                        foreach ($listaUltimosClassificadosLateral as $classificadoConsulta) {

                            $titulo = $classificadoConsulta->getNome();

                            if (strlen($titulo) >= 35) {

                                $titulo = substr($titulo, 0, 25);
                                $titulo = "{$titulo}...";
                            }
                            ?>
                            <li class="<?= ($cont == 0 ? "borderTop" : "") ?>">
                                <a href="?pagina=classificado&cod=<?= $classificadoConsulta->getCod(); ?>" style="text-decoration: none;">
                                    <img src="img/Classificados/<?= $classificadoConsulta->getImagem(); ?>" alt="<?= $classificadoConsulta->getNome(); ?>" />
                                    <span><?= $titulo; ?></span>
                                </a>
                            </li>

                            <?php
                            $cont ++;
                        }
                        ?>
                    </ul>
                </div>

                
            </div>
        </div>

        <!--Rodapé do site-->
        <div id="dvRodape">
            <div class="grid-container">
                <div class="grid-100">
                    <p>&copy; <b>Mr Automoveis<b></p>
                </div>
            </div>
        </div>
    </body>
</html>


<?php
session_start();

if (isset($_SESSION["logado"])) {
    if (!$_SESSION["logado"]) {
        header("Location: index.php?msg=1");
    }
} else {
    header("Location: index.php?msg=1");
}
?>
<!doctype html>
<html lang="pt-br">
    <head>
        <title>Mr Automoveis - Admin</title>
        <meta charset="utf-8" />
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="../js/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <script src="js/script.js" type="text/javascript"></script>
    </head>
    <body>
        <div id="dvConteudoPrincipal">
            <div class="row" id="dvTopo">
               
                <div class="col-xs-12 hidden-xs">
                    <div class="dvlogoTopo">
                        <a href="painel.php"><img src="../img/mrlogo.png" alt="Logo Mr Automotive" /></a>
                    </div>
                </div>
            </div>

            <div class="row no-gutter">
                <div class="col-lg-2 gridLeft hidden-xs" id="dvEsquerda">
                    <div id="dvMenuLateral">
                        <ul id="ulMenu">
                            <li class="firstLine"><a href="painel.php">Inicio</a></li>
                            <li><a href="?pagina=usuario">Usuários</a></li>
                            <li><a href="?pagina=classificado">Classificados</a></li>
                            <li><a href="?pagina=categoria">Categorias</a></li>
                            <li><a href="?pagina=modelo">Modelos</a></li>
                            <li><a href="?pagina=marca">Marcas</a></li>
                            <li><a href="logout.php">Sair</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-xs-12 col-lg-10" id="dvDireita">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php
                            require_once("../Util/RequestPage.php");
                            ?>
                            <div class="clear"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <script>
            $(document).ready(function () {
                $("#btnMenuResponsive").click(function () {
                    $("#dvMenuResponsive").slideToggle("slow");
                });
            });
        </script>
    </body>
</html>
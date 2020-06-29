<?php
session_start();

require_once("../Controller/UsuarioController.php");
require_once("../Model/Usuario.php");

$retorno = "&nbsp;";

if (isset($_SESSION["entrar"])) {
    header("Location: painel.php");
}


if (filter_input(INPUT_GET, "msg", FILTER_SANITIZE_NUMBER_INT)) {
    if (filter_input(INPUT_GET, "msg", FILTER_SANITIZE_NUMBER_INT) == 1) {
        $retorno = "<div class=\"alert alert-danger\" role=\"alert\">Acesso negado!!!</div>";
    } else {
        $retorno = "<div class=\"alert alert-warning\" role=\"alert\">Você fez Logout.</div>";
    }
}

if (filter_input(INPUT_POST, "btnEntrar", FILTER_SANITIZE_STRING)) {

    $usuarioController = new UsuarioController();
    $user = filter_input(INPUT_POST, "txtUsuario", FILTER_SANITIZE_STRING);
    $pass = filter_input(INPUT_POST, "txtSenha", FILTER_SANITIZE_STRING);
    $permissao = 1;
    
    $resultado = $usuarioController->AutenticarUsuario($user, $pass, $permissao);

    if ($resultado != null) {
        if (filter_input(INPUT_POST, "ckManterLogado", FILTER_SANITIZE_STRING)) {
            $_SESSION["entrar"] = true;
        }


        $_SESSION["cod"] = $resultado->getCod();
        $_SESSION["nome"] = $resultado->getNome();
        $_SESSION["logado"] = true;
        header("Location: painel.php");
    } else {
        $retorno = "<div class=\"alert alert-danger\" role=\"alert\">Usuário ou senha inválido.</div>";
    }
}
?>
<!doctype html>
<html lang="pt-br">
    <head>
        <title>Brasil Classificados - Login</title>
        <meta charset="utf-8" />
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="../js/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <link rel="shortcut icon" href="../img/favicon.ico" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    </head>
    <body>
        <div id="dvLogin">
            <form method="post">
                <div class="row">
                    <div class="col-lg-12 alignCenter">
                        <img src="../img/minilogo.png" alt="Mini logo Mr Automoveis"/>
                    </div>
                    <div class="clear"></div>

                    <br /> 
                    <div class="borderBottom"></div>
                    <br /> 

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="txtUsuario">Usuário</label>
                            <input type="text" class="form-control" id="txtUsuario" name="txtUsuario" placeholder="Usuário">
                        </div>
                        <div class="form-group">
                            <label for="txtSenha">Senha</label>
                            <input type="password" class="form-control" id="txtSenha" name="txtSenha" placeholder="*******">
                        </div>
                        <input class="btn btn-success" type="submit" name="btnEntrar" value="Entrar">

                         
                    </div>
                    <p>&nbsp;</p>
                    <div class="col-lg-12">
                        <?= $retorno; ?>
                    </div>
                </div>
            </form>
        </div>


        <script>
            $('#myModal').on('shown.bs.modal', function () {
                $('#myInput').focus();
            });
        </script>
    </body>
</html>
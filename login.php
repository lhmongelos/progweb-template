<?php 
require_once 'CLASSES/usuario.php'; //Para utiliza os métodos da classe Usuario
$u = new Usuario; //instancia
?>

<html lang="pt-br">
<head>
<title> Mr Automotive Webpage</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="//fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
<link href="css/font-awesome.css" rel="stylesheet" /><!-- font-awesome css -->
<!-- bootstrap css -->
<link href="css/bootstrap.css" rel="stylesheet" />
<!-- //bootstrap css -->
<!-- style css -->
<link href="css/styleLogin.css" rel="stylesheet" />
<!-- //style css -->
<!-- //lightbox files -->
<link rel="stylesheet" href="css/lightbox.css">
<!-- //lightbox files -->
<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- //js -->
<link href="css/mislider.css" rel="stylesheet" type="text/css" />
<link href="css/mislider-custom.css" rel="stylesheet" type="text/css" />
<!-- bootstrap js -->
<script src="js/bootstrap.js"></script>
<!-- bootstrap js -->


</head>
<body>
<div class="navbar-header">
            <img src="images/Logo.png" href="index.php" width="500"height="200">
        </div>
	<!-- banner -->
	<div class="banner">
		<div class="banner-dott">
			<div class="container">
                            
                                    
				<!-- navigation -->
				<nav class="navbar navbar-inverse">
					
					<div class="collapse navbar-collapse" id="myNavbar">
						<ul class="nav navbar-nav link-effect-14" id="link-effect-14">
                                                    <li><a href="index.php"><span>Home</span></a></li>
                                                    
							<li><a href="#" class="scroll"><span>ESTOQUE</span></a></li>
                                                        
                                                        <li><a href="anunciante.php" class="scroll"><span>SOBRE NÓS</span></a></li>
                                                        
                                                        <li><a href="login.php" class="scroll"><span>LOGIN</span></a></li>
                                                        
                                                        <li><a href="registro.php" class="scroll"><span></span>REGISTRE-SE</a></li>
						</ul>
						
					</div>
				</nav>
                                        	
                <div class="banner-header">
                                    
                                    <div class="slider">
                                            
                                            <div class="form-title">
                                                <h2>REALIZAR LOGIN</h2><BR>
                                             
                                            </div>
                                            
						<div class="callbacks_container">
                                                    
                                                       
							<ul class="rslides callbacks callbacks1" id="slider4">
								<li>	
                                                                    
									<div class="banner_text">
                                                                            
                                                                                   
                                                                            
										<form class="navbar-form navbar-left w3_search" action="#" method="post">
                                                                                    
                                                                                    
                                                
                                                                                    <div class="form-group">
                                                                                            <input type="login" class="form-control" placeholder="Login" required="">
                                                                                    </div>

                                                                                    <div class="form-group">
                                                                                            <input type="senha" class="form-control" placeholder="Senha" required="">
                                                                                    </div>
                                                                                    
                                                                                </form>
									</div>	
								</li>
									
							</ul>
						</div>
					</div>
                                        
                                        <br>
                                        <div class="form-submit">
                                              <input type="submit" value="ACESSAR">                                                
                                        </div>
				</div>
                                
			</div>
		</div>
	</div>
	
	

	</div>
	<script src="js/SmoothScroll.min.js"></script>
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<script src="js/responsiveslides.min.js"></script>

	<?php
	//verifica a existência de uma variável dentro do método POST
	if(isset($_POST['login'])){

		//variáveis que recebem todas os inputs
		//addcslashes: tira qlq comando maliciosos e depois armazena 
		$login = addcslashes($_POST['login']);
		$senha = addcslashes($_POST['userpass']);

		//caso todos os inputs tenham sido preenchidos
		if(!empty($login) && !empty($senha)){
			$u->conectar("login", "localhost", "root", "NOVASENHA");
			
			// caso não tenha nenhum erro
			if($u->msgErro == ""){

				//loga e vai para a página privada aka anuciante
				if($u->logar($login,$senha)){
					header("location: anunciante.php");

				} else {
					
					?>
					<div class="msg-erro">
					Email e/ou senha estão incorretos!
					</div>
					<?php
					
				}
			} else{
				<div class="msg-erro">
				<?php echo "Erro: ".$u->msgErro; ?>
				</div>
				<?php
					
			}
		} else {
			
			?>
			<div class="msg-erro">
			Preencha todos os campos!
			</div>
			<?php
			
		}
	}
	?>
</body>
</html>



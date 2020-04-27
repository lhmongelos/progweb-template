
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Tela de Registro de Anuncios</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Dependencia Bootstrap -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <link href="http://netdna.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Referencia ao css -->
    <link href="css/anunciante.css" rel="stylesheet" />
    
</head>


<body>
    <div class="logo">
        <img src="images/Logo.png" href="index.php" width="500"height="200">
    </div>
    
<!-- Dependencia Bootstrap -->
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
<div class="row flex-lg-nowrap">
  <div class="col-12 col-lg-auto mb-3" style="width: 200px;">
    <div class="card p-3">
      <div class="e-navlist e-navlist--active-bg">
         <!-- Lista de Itens - Barra de navegação Lateral --> 
        <ul class="nav">
            <li class="nav-item"><a class="nav-link px-2 active" href="anunciante.php"><i class="fa fa-fw fa-bar-chart mr-1"></i><span>Perfil</span></a></li>
          <li class="nav-item"><a class="nav-link px-2" href="#"><i class="fa fa-fw fa-th mr-1"></i><span>Meus Anuncios</span></a></li>
          <li class="nav-item"><a class="nav-link px-2" href="anuncio.php"><i class="fa fa-fw fa-cog mr-1"></i><span>Anunciar</span></a></li>
        </ul>
      </div>
    </div>
  </div>
    <!-- Lista de Itens - Barra de navegação Lateral --> 
    
    
    
  <!-- Foto usuário, --> 
  <div class="col">
    <div class="row">
      <div class="col mb-3">
        <div class="card">
          <div class="card-body">
            <div class="e-profile">
              
              <ul class="nav nav-tabs">
                <li class="nav-item"><a  class="active nav-link">Registrar Anúncio</a></li>
              </ul><br>
                
               <div class="mt-2">
                            <button class="btn btn-primary" type="button">
                            <i class="fa fa-fw fa-camera"></i>
                            <span>Inserir Imagem</span>
                            </button>
                </div>  
                
              <div class="tab-content pt-3">
                <div class="tab-pane active">
                  <form class="form" novalidate="">
                    <div class="row">
                      <div class="col">
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Marca</label>
                              <input class="form-control" type="text" name="marca" placeholder="Marca" value="Marca">
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-group">
                              <label>Modelo</label>
                              <input class="form-control" type="text" name="Modelo" placeholder="Modelo" value="Modelo">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Ano</label>
                              <input class="form-control" type="text" name="Ano" placeholder="Ano" value="Ano">
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-group">
                              <label>Valor</label>
                              <input class="form-control" type="text" name="Valor" placeholder="Valor" value="Valor">
                            </div>
                          </div>
                        </div>
                        
                         <div class="col mb-3">
                            <div class="form-group">
                              <label>Descrição</label>
                              <textarea class="form-control" rows="5" placeholder="Descrição do Veículo"></textarea>
                            </div>
                          </div>
                       </div>
                        
                    </div>
                 
                    
                    
                      
                     
                    
                    <!-- Botão para atualizar dados --> 
                    <div class="row">
                      <div class="col d-flex justify-content-end">
                        <button class="btn btn-primary" type="submit">Registrar Anúncio</button>
                      </div>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
       
        <!-- Seção lateral de logout --> 
      <div class="col-12 col-md-3 mb-3">
        <div class="card mb-3">
          <div class="card-body">
            <div class="px-xl-3">
              <button class="btn btn-block btn-secondary">
                <i class="fa fa-sign-out"></i>
                <span>Logout</span>
              </button>
            </div>
          </div>
        </div>
          
         <!-- Seção de contato com suporte --> 
        <div class="card">
          <div class="card-body">
            <h6 class="card-title font-weight-bold">Suporte</h6>
            <p class="card-text">Dúvidas ou problemas?</p>
            <button type="button" class="btn btn-primary">Contatar</button>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
</div>

<!-- Dependecias --> 
<script src="http://netdna.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script type="text/javascript">
	
</script>
</body>
</html>
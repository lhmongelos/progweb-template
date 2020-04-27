<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Tela de Anunciante</title>
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
              <div class="row">
                <div class="col-12 col-sm-auto mb-3">
                  <div class="mx-auto" style="width: 140px;">
                    <div class="d-flex justify-content-center align-items-center rounded" style="height: 140px; background-color: rgb(233, 236, 239);">
                      <span style="color: rgb(166, 168, 170); font: bold 8pt Arial;">140x140</span>
                    </div>
                  </div>
                </div>
                <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                  <div class="text-center text-sm-left mb-2 mb-sm-0">
                    <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">Nome Usuário</h4>
                    
                    
                    <div class="mt-2">
                      <button class="btn btn-primary" type="button">
                        <i class="fa fa-fw fa-camera"></i>
                        <span>Change Photo</span>
                      </button>
                    </div>
                  </div>
                  
                    
                    
                </div>
                  
               <!-- Seção de informações de usuário -->    
              </div>
              <ul class="nav nav-tabs">
                <li class="nav-item"><a  class="active nav-link">Informações Pessoais</a></li>
              </ul>
              <div class="tab-content pt-3">
                <div class="tab-pane active">
                  <form class="form" novalidate="">
                    <div class="row">
                      <div class="col">
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Nome</label>
                              <input class="form-control" type="text" name="name" placeholder="Nome" value="Nome">
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-group">
                              <label>Sobrenome</label>
                              <input class="form-control" type="text" name="username" placeholder="Sobrenome" value="Sobrenome">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>E-mail</label>
                              <input class="form-control" type="text" placeholder="user@example.com">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-sm-6 mb-3">
                        <div class="mb-2"><b>Trocar Senha</b></div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Senha Atual</label>
                              <input class="form-control" type="password" placeholder="••••••">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Nova Senha</label>
                              <input class="form-control" type="password" placeholder="••••••">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Confirmar Senha <span class="d-none d-xl-inline">Password</span></label>
                              <input class="form-control" type="password" placeholder="••••••"></div>
                          </div>
                        </div>
                      </div>
                      
                    </div>
                    <!-- Seção de informações de usuário -->   
                     
                    
                    <!-- Botão para atualizar dados --> 
                    <div class="row">
                      <div class="col d-flex justify-content-end">
                        <button class="btn btn-primary" type="submit">Salvar Mudanças</button>
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
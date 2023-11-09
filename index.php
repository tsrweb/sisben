<?php
  session_start();  
    if((isset($_SESSION['erro']))){echo $_SESSION['erro'];}
      session_destroy();
      ?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- As 3 meta tags acima *devem* vir em primeiro lugar dentro do `head`; qualquer outro conteúdo deve vir *após* essas tags -->
    <title>SisBen</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" type="text/css" rel="stylesheet">
    <link rel="icon" href="img/favicon.ico">

    <!-- HTML5 shim e Respond.js para suporte no IE8 de elementos HTML5 e media queries -->
    <!-- ALERTA: Respond.js não funciona se você visualizar uma página file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body data-spy="scroll" data-target=".navbar" data-offset="70">
    
  <!-- navbar -->
    <div class="container">
      <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
          <div class="container-fluid">
          <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
                <a class="navbar-brand" href="#">
                    SisBen
                      </a>
        </div>
          <div id="navbar" class="navbar-collapse collapse">
            <form class="navbar-form navbar-right" method="post" action="login">
              <div class="form-group">
                <input type="text" name="user" id="user" placeholder="Usuário" class="form-control" required>
              </div>
              <div class="form-group">
                <input type="password" name="senha" id="senha" placeholder="Senha" class="form-control" required>
              </div>
              <button type="submit" class="btn btn-danger">Login</button>
            </form>

          <ul class="nav navbar-nav navbar-right" role="tablist">
              <li><a href="#home" onclick="$('html,body').animate({scrollTop: $('#home').offset().top-50}, 2000);">Home</a></li>
              <li><a href="#objetivo" onclick="$('html,body').animate({scrollTop: $('#objetivo').offset().top-50}, 2000);">Objetivo</a></li>
              <li><a href="#contato" onclick="$('html,body').animate({scrollTop: $('#contato').offset().top-50}, 2000);">Contato</a></li>
            </ul>
          </div>
        </div>
      </div>
    </nav><!-- /navbar -->

<div id="home"></div>
  <!-- carousel -->
    <div id="carousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img src="img/banner.jpeg" alt="banner">
            <div class="carousel-caption">
              <h3>Bem Vindo ao SisBen</h3>
              <p>Sistema para Controle de Benefícios para Cidadãos de Baixa Renda</p>
              <p><a class="btn btn-lg btn-danger" href="cadastroSisBen" role="button">Cadastre-se</a></p>
          </div>
        </div>
          <div class="item">
            <img src="img/banner2.jpg" alt="banner">
            <div class="carousel-caption">
              <h3>Parceria</h3>
              <p>Contamos com Grandes empresas para nos ajudar a transformar vidas.</p>
            </div>
          </div>
          <div class="item">
            <img src="img/banner3.jpg" alt="banner">
            <div class="carousel-caption">
              <h3>ONGs</h3>
              <p>Contamos também com o apoio de diversas ONGs para sempre ajudar aquele que mais precisa.</p>
            </div>
          </div>
      </div>

      <!-- Controls -->
      <a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#carousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div><!-- /carousel -->

<hr class="featurette-divider">
<!-- informações -->
  <div id="objetivo"></div>
      <div class="row">
          <div class="jumbotron">  
           <h2 class="text-center">Objetivo do SisBen</h2>
            <p class="lead text-center">Este portal tem como principal objetivo, cadastrar as pessoas de baixa renda, no intuíto de verificar as necessidades dos que forem considerados aptos a receber doações e benefícios sociais de empresas, ONGs ou governos, mostrando através das informações coletadas, onde é mais necessário e devem agir para dar melhor atendimento as deficiêcias com soluções mais eficazes no contexto socio-econômico de cada bairro ou cidade, Procurando assim trazer uma melhor qualidade de vida ao cidadão e sua família e colaborando para que situações que nunca foram atendidas sejam solucionadas. O Programa é direcionado para famílias com renda per capita mensal de 85,00 até 170,00 Reais. O recebimento mensal do benefício pelas familias está condicionado à frequência escolar e ao uso de serviços de saúde materno-infantil. <a href="cadastroSisBen"><button type="button" class="btn btn-warning btn-lg">CADASTRE-SE</button></a> e participe dos programas sociais e outros benefícios que poderão ser entregues em seu bairro ou ações voltadas para melhorar a qualidade de vida de sua cidade.</p>
        </div>
      </div><!-- /informações -->

<hr class="featurette-divider">
<!-- Consulta -->
  <div class="row">
   <form method="post" action="login">
    <div class="row">
     <div class="col-md-6">
      <div class="alert alert-info text-center" role="alert">
       <strong>Consultar Solicitação:</strong> Informe seu <strong>CPF</strong> e <strong>Senha</strong> cadastrado para consultar o andamento da sua solicitação.</div>
         </div>
        <div class="col-md-2">
          <div class="form-group">
            <label for="cpf">CPF:</label>
              <input type="text" class="form-control" id="cpf" name="user" required>
             </div>
            </div>
           <div class="col-md-2">
            <div class="form-group">
             <label for="senha">Senha:</label>
              <input type="password" class="form-control" id="senha" name="senha" required>
             </div>
            </div>
           <div class="col-md-1">
             <div class="form-group">
              <input type="submit" class="btn btn-danger" value="Consultar" title="Consultar" style="margin-top: 25px;">
              </div>
            </div>
           </div>
         </form>                   
      </div>

<hr class="featurette-divider">
<!-- Contato -->
<div id="contato"></div>
  <hr class="featurette-divider">
      <div class="row">
        <div class="col-md-6">
            <img src="img/logoSisBen.png" alt="sisBen" width="500px" class="center-block">
              </div>

          <div class="col-md-6"> 
          <form class="form-inline" method="post" action="enviarMensagem.php" style="margin-left: 55px">
            <h2 class="media-heading">Contato</h2>
              <div class="form-group">
                  <label for="nome">Nome:</label><br>
                  <input type="text" class="form-control" id="nome" name="nome" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label><br>
                    <input type="email" class="form-control" id="email" name="email" placeholder="exemplo@exemplo.com" required>
                  </div>
                <div class="form-group">
                  <label for="msg">Mensagem:</label><br>
                  <textarea class="form-control" cols="50" rows="5" id="msg" name="msg" placeholder="Texto..." required></textarea>
                </div><br />
            <br /><input type="submit" name="enviar" value="Enviar" class="btn btn-danger" />
          </form>
        </div>
    </div><!-- \Contato --> 

<!-- footer -->
<hr class="featurette-divider">
  <div class="row" style="margin-right: 0px;">
    <div class="col-md-3 col-md-offset-9">
      &copy; 2017 Equipe Umbrella Corporation
        </div>
          </div><!-- /footer -->

  </div> <!--  /container -->

    <!-- Validação de campos -->
    <script type="text/javascript" src="js/JavaScript.js"></script>
    <script type="text/javascript" src="js/jquery-1.11.3.js"></script>
    <script type="text/javascript">validar();</script>
    <!-- jQuery (obrigatório para plugins JavaScript do Bootstrap) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Inclui todos os plugins compilados (abaixo), ou inclua arquivos separadados se necessário -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
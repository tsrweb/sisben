<?php
session_start();
$logado = $_SESSION['nome'];
$tpLogado = $_SESSION['tipo'];
if ((!isset($_SESSION['nome']))) {
    header('location: index.php');
}?>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- As 3 meta tags acima *devem* vir em primeiro lugar dentro do `head`; qualquer outro conteúdo deve vir *após* essas tags -->
    <title>sisBen</title>

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

<body>
  <?php include "navBar.php"; ?>
    <div class="row">
      <h2>SisBen</h2>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Sistema para Controle de Benefícios para Cidadãos de Baixa Renda</h3>
              </div>
          <div class="panel-body">
            <div class="col-md-2 col-md-offset-2">
              <a href="cadastrarPrefeitura"><img src="img/novo.png" alt="Cadastrar Prefeitura" title="Cadastrar Prefeitura" class="img-responsive"></a>
                <div class="capiton">
                  <h4 class="text-center">Cadastrar Prefeitura</h4>
                    </div>
                  </div>
            <div class="col-md-2 col-md-offset-1">
              <a href="listPrefeituras"><img src="img/listar.jpg" alt="Listar Prefeituras" title="Listar Prefeituras" class="img-responsive"></a>
                <div class="capiton">
                  <h4 class="text-center">Listar Prefeituras</h4>
                    </div>
                  </div>
            <div class="col-md-2 col-md-offset-1">
              <a href="logout"><img src="img/sair.jpg" alt="Sair do Sistema" title="Sair do Sistema" class="img-responsive"></a>
                <div class="capiton">
                  <h4 class="text-center">Sair do Sistema</h4>
                    </div>
                  </div>
                </div>
              </div>    
            </div><!-- /row -->
        </div><!-- /container -->

<!-- footer -->
<hr class="featurette-divider">
  <div class="row" style="margin-right: 0px;">
    <div class="col-md-3 col-md-offset-9">
      &copy; 2017 Equipe Umbrella Corporation
        </div>
          </div><!-- /footer -->

  </div> <!--  /container -->

    <!-- jQuery (obrigatório para plugins JavaScript do Bootstrap) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Inclui todos os plugins compilados (abaixo), ou inclua arquivos separadados se necessário -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
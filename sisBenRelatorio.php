<?php
session_start();
$logado = $_SESSION['nome'];
$tpLogado = $_SESSION['tipo'];
if ((!isset($_SESSION['nome']))) {
    header('location: index.php');
}

// Definindo a home
if ($tpLogado == "pref") {
  $home = "sisBenPrefeitura";
}
if ($tpLogado == "assist") {
  $home = "sisBenAssistente";
}

?>
<!DOCTYPE html>
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

<?php include "navBar.php";?>

    <div class="row">
      <h2>SisBen</h2>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Relatórios</h3>
              </div>
          <div class="panel-body">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-5 col-md-offset-4">
                  <div class="alert alert-info text-center" role="alert">
                    <strong>Busca Filtrada.</strong> Preencha os campos para fazer uma busca específica na sua cidade.</div>
                   </div>
                 </div>
              <form method="post" action="sisBenRelatorioViewer" class="form-inline">
                <div class="row">
                  <div class="col-md-3 col-md-offset-4">
                    <div class="form-group">
                      <label for="bairro">Bairro:</label>
                      <input type="text" class="form-control" id="bairro" name="bairro" autocomplete="off">
                      </div><br><br>
                    </div>
                  </div><!-- /row -->
                <div class="row">
                 <div class="col-md-5 col-md-offset-4">
                    <div class="form-group">
                      <label for="renda">Renda:</label>
                      <input type="text" class="form-control btn-xs" id="renda1" name="faixa1" autocomplete="off">
                      <label for="ate">até</label>
                      <input type="text" class="form-control btn-xs" id="renda2" name="faixa2" autocomplete="off">
                    </div><br><br>
                </div>
              </div><!-- /row -->
            <div class="row">
              <div class="col-md-3 col-md-offset-4">
                  <div class="form-group">
                    <label for="status">Status:</label>
                      <select class="form-control" name="status">
                        <option value="">Selecione</option>
                        <option value="Solicitação">Solicitação</option>
                        <option value="Beneficiário">Beneficiário</option>
                        <option value="Rejeitado">Rejeitado</option>
                        <option value="Cancelado">Cancelado</option>
                      </select><br><br>
                </div>
              </div>
            </div><!-- /row -->
          <div class="row">
            <div class="col-md-3 col-md-offset-4">
              <input type="submit" class="btn btn-danger" value="Buscar">
              <a href="<?=$home?>"><button type="button" class="btn btn-danger">Voltar</button></a>
           </div>
          </div><!-- row -->          
        </form>
               </div>
              </div>
             </div>    
            </div><!-- /row -->

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
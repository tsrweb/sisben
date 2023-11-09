<?php
session_start();
$logado = $_SESSION['nome'];
$tpLogado = $_SESSION['tipo'];
if ((!isset($_SESSION['nome']))) {
    header('location: index.php');
}

$idDoador = $_GET["idDoador"];

require "conecta.php";

$sql = $link->query("SELECT * FROM tb_doador WHERE id_doador = '$idDoador' ");

while($reg = $sql->fetch_array()){

$nome = $reg['nm_doador'];
$cpfcnpj = $reg['nu_cpf_cnpj'];
$fone = $reg['fn_doador'];
$cep = $reg['nu_cep'];
$logradouro = $reg['nm_logradouro'];
$numero = $reg['nu_numero'];
$bairro = $reg['nm_bairro'];
$cidade = $reg['nm_cidade'];
$uf = $reg['sl_estado'];
      };
$link->close();
?>
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
            <h3 class="panel-title">Doador</h3>
              </div>
          <div class="panel-body">
            <div class="col-md-12">
              <form method="post" action="updateDoador?idDoador=<?=$idDoador?>">
                <div class="row">
                  <div class="col-md-4">
                <div class="form-group">
                  <label for="nome">Nome:</label>
                  <input type="text" class="form-control" name="nome" value="<?=$nome?>">
                    </div>
                    </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="cpfcnpj">CPF/CNPJ:</label>
                <input type="text" class="form-control" name="cpfcnpj" value="<?=$cpfcnpj?>" id="disabledInput" disabled>
                  </div>
                  </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="fone">Telefone:</label>
                <input type="text" class="form-control" name="fone" id="fone" value="<?=$fone?>">
                  </div>
                  </div>
          </div><!-- /row -->
        <div class="row">
                <div class="col-md-2">
              <div class="form-group">
                <label for="fone">CEP:</label>
                <input type="text" class="form-control" name="cep" id="cep" value="<?=$cep?>">
                  </div>
                        </div>
                <div class="col-md-5">
              <div class="form-group">
                <label for="logradouro">Logradouro:</label>
                <input type="text" class="form-control" name="logradouro" id="logradouro" value="<?=$logradouro?>">
                  </div>
                        </div>
                <div class="col-md-1">
              <div class="form-group">
                <label for="numero">Número:</label>
                <input type="text" class="form-control" name="numero" value="<?=$numero?>">
                  </div>
                        </div>
              </div><!-- /row -->
      <div class="row">
              <div class="col-md-4">
            <div class="form-group">
              <label for="bairro">Bairro:</label>
              <input type="text" class="form-control" name="bairro"  id="bairro" value="<?=$bairro?>">
                  </div>
                        </div>
                <div class="col-md-4">
              <div class="form-group">
                <label for="cidade">Cidade:</label>
                <input type="text" class="form-control" name="cidade" id="cidade" value="<?=$cidade?>">
                  </div>
                        </div>
                <div class="col-md-1">
              <div class="form-group">
                <label for="uf">Estado:</label>
                <input type="text" class="form-control text-uppercase"  name="uf" id="uf" value="<?=$uf?>">
                  </div>
                        </div>
              </div><!-- /row -->
            <div class="row">
              <div class="col-md-4">
                <div class="alert alert-danger" role="alert"><strong>Atenção!</strong> Campos em branco não será alterado.</div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <button type="submit" class="btn btn-danger" onclick="return confirm('Deseja realmente editar este cadastro?');">Salvar</button>
                <button type="button" class="btn btn-danger" onclick="window.history.back();">Voltar</button>
              </div>
            </div>
        </form>
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

    <?php include "buscarCep.php"; ?>
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
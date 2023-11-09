<?php
session_start();
$logado = $_SESSION['nome'];
$tpLogado = $_SESSION['tipo'];
if ((!isset($_SESSION['nome']))) {
    header('location: index.php');
}
require "conecta.php";

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
            <h3 class="panel-title">Relatório</h3>
              </div>
          <div class="panel-body">
            <div class="col-md-12">
              <div class="table-responsive">
            	<table class="table table-hover">
            		<tr>
            			<th>ID</th>
            			<th>Nome:</th>
            			<th>Profissão:</th>
            			<th>Renda Familiar:</th>
            			<th>Bairro</th>
            			<th>Tipo do Imóvel</th>
            			<th>Dependentes</th>
            			<th>Status</th>           			           			
            		</tr>

<!-- Listando as Prefeituras -->
<?php

// Coletando a cidade da prefeitura
if($tpLogado == "pref"){
  $colet = $link->query("SELECT * FROM tb_prefeituras WHERE nm_prefeitura = '$logado' ");

  while($reg = $colet->fetch_array()){

  $cidadePrefeitura = $reg['nm_cidade'];

  }
}else{
  $colet = $link->query("SELECT * FROM tb_assistenteSocial WHERE nm_assistenteSocial = '$logado' ");

  while($reg = $colet->fetch_array()){

  $idPrefeitura = $reg['id_prefeitura'];

  }

  $colet2 = $link->query("SELECT * FROM tb_prefeituras WHERE id_prefeitura = '$idPrefeitura' ");

  while($reg2 = $colet2->fetch_array()){

  $cidadePrefeitura = $reg2['nm_cidade'];

  }
}

$and = Array();

    $bairro = $_POST["bairro"];
    $renda1 = $_POST["faixa1"];
    $renda2 = $_POST["faixa2"];
    $status = $_POST["status"];


    if( $bairro ){ $and[] = " `nm_bairro` = '{$bairro}'"; }
    if( $renda1 ){ $and[] = " `nu_renda` BETWEEN '{$renda1}' AND '{$renda2}'"; }
    if( $status ){ $and[] = " `tp_status` = '{$status}'"; }

    $sql = "SELECT * FROM tb_usuario WHERE nm_cidade = '$cidadePrefeitura' ";
    if( sizeof( $and ) )
      $sql .= ' AND '.implode( ' AND ',$and );

    $res = $link->query($sql);

    $total = $res->num_rows;

while($reg3 = $res->fetch_array()){

$id = $reg3['id_usuario'];
$nome = $reg3['nm_usuario'];
$profissao = $reg3['nm_profissao'];
$renda = $reg3['nu_renda'];
$bairro = $reg3['nm_bairro'];
$tipoImovel = $reg3['tp_imovel'];
$nDependentes = $reg3['nu_dependentes'];
$status = $reg3['tp_status'];

// Mudando a cor do campo status de acordo com o mesmo

if($status == "Solicitação"){
	$cor = 'class="alert-info"';
}elseif ($status == "Beneficiário") {
	$cor = 'class="alert-success"';
}elseif ($status == "Rejeitado") {
	$cor = 'class="alert-danger"';
}elseif ($status == "Cancelado") {
	$cor = 'class="alert-warning"';
}

echo '<tr>
	  <td>'.$id.'</td>
	  <td>'.$nome.'</td>
	  <td>'.$profissao.'</td>
	  <td>R$ '.$renda.'</td>
	  <td>'.$bairro.'</td>
	  <td>'.$tipoImovel.'</td>
	  <td>'.$nDependentes.'</td>
	  <td '.$cor.'>'.$status.'</td>
	  </tr>';

};
?>
		</table>
	</div>
<!-- Caso não tenha nenhum cadastro -->
<?php if ($res->num_rows == 0){echo '<div class="row"><div class="col-md-4 col-md-offset-4">
                                      <div class="alert alert-info text-center" role="alert">
                                        <strong>Nenhum Registro Encontrado.</strong></div>
                                            </div>
                                          </div>';}
                                         $link->close();?>

          <div class="row">
                  <div class="col-md-9">
                    <div class="col-md-3">
                      <strong>Total de Registros:</strong><?=$total?>
                    </div>
                  </div>
              </div>
            <hr class="featurette-divider">
					<div class="row">
		              <div class="col-md-2">
		              	<a href="sisBenRelatorio"><button type="button" class="btn btn-danger">Voltar</button></a>
		              </div>
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
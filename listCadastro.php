<?php
session_start();
$logado = $_SESSION['nome'];
$tpLogado = $_SESSION['tipo'];
if ((!isset($_SESSION['nome']))) {
    header('location: index.php');
}
require "conecta.php";
require "functionEstatistica.php";

// Definindo a home
if ($tpLogado == "pref") {
  $home = "sisBenPrefeitura";
}
if ($tpLogado == "assist") {
  $home = "sisBenAssistente";
}
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
            <h3 class="panel-title">Solicitações de Benefício</h3>
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
            			<th>Ações</th>            			           			
            		</tr>

<!-- Listando as Prefeituras -->
<?php

require "conecta.php";

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

$sql =$link->query("SELECT * FROM tb_usuario WHERE nm_cidade = '$cidadePrefeitura'");

while($reg = $sql->fetch_array()){

$id = $reg['id_usuario'];
$nome = $reg['nm_usuario'];
$profissao = $reg['nm_profissao'];
$renda = $reg['nu_renda'];
$bairro = $reg['nm_bairro'];
$tipoImovel = $reg['tp_imovel'];
$nDependentes = $reg['nu_dependentes'];
$status = $reg['tp_status'];

// Mudando a cor do campo status de acordo com o mesmo

if($status == "Solicitação"){
	$cor = 'class="alert alert-info"';
}elseif ($status == "Beneficiário") {
	$cor = 'class="alert alert-success"';
}elseif ($status == "Rejeitado") {
	$cor = 'class="alert alert-danger"';
}elseif ($status == "Cancelado") {
	$cor = 'class="alert alert-warning"';
}

// ocutando butão mudar status caso o logado seja prefeitura

if ($tpLogado == "pref") {
	$ocultar = "hidden";
}else{
	$ocultar = null;
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
	  <td><a href="readCadastro?idUsuario='.$id.'"><button type="button" class="btn btn-danger">
		  <span class="glyphicon glyphicon-eye-open" aria-hidden="true" title="Visualizar"></span>
		  	</button></a>
      <a href="editarCadastro?idUsuario='.$id.'"><button type="button" class="btn btn-danger '.$ocultar.'">
      <span class="glyphicon glyphicon-pencil" aria-hidden="true" title="Editar"></span>
      </button></a>
      <button type="button" class="btn btn-danger '.$ocultar.'" role="button" data-toggle="modal" data-target="#troca'.$id.'">
      <span class="glyphicon glyphicon-sort" aria-hidden="true" title="Modificar Status"></span>
      </button>
      <a href="doacao?idUsuario='.$id.'"><button type="button" class="btn btn-danger '.$ocultar.'">
      <span class="glyphicon glyphicon-list" aria-hidden="true" title="Registro de Doações"></span>
      </button></a></td>';

// Modal
echo '<div class="modal fade" id="troca'.$id.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>	      		
				<h4 class="modal-title" id="myModalLabel"><strong>Alterar Status</strong></h4>
		      </div>
		      <div class="modal-body">
		      	<form method="post" action="updateStatus?idUsuario='.$id.'">
		              <div class="form-group">
		                  <select class="form-control" name="status" required>
		                  	<option value="">Selecione</option>
		                    <option value="Solicitação">Solicitação</option>
		                    <option value="Beneficiário">Beneficiário</option>
		                    <option value="Rejeitado">Rejeitado</option>
		                    <option value="Cancelado">Cancelado</option>
		                  </select>
		              </div>	      	
		      		</div>
		      	<div class="modal-footer">
		      		<input type="submit" class="btn btn-danger" value="Salvar">
		        	<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
		     	 </div>
		      </form>
		    </div>
		  </div>
		</div>
	</tr>';

};
?>
		</table>
	</div>
<!-- Caso não tenha nenhum cadastro -->
<?php if ($sql->num_rows == 0){echo '<div class="row"><div class="col-md-4 col-md-offset-4">
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
                   <div class="col-md-2">
                      <strong>Solicitação:</strong><?=$totalSolicitacao?>
                    </div>
                   <div class="col-md-2">
                      <strong>Beneficiário:</strong><?=$totalBeneficiario?>
                    </div>
                   <div class="col-md-2">
                      <strong>Rejeitado:</strong><?=$totalRejeitado?>
                    </div>
                   <div class="col-md-2">
                      <strong>Cancelado:</strong><?=$totalCancelado?>
                    </div>
                  </div>
              </div>
            <hr class="featurette-divider">
					<div class="row">
		              <div class="col-md-2">
		              	<a href="<?=$home?>"><button type="button" class="btn btn-danger">Home</button></a>
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
<?php
session_start();
$logado = $_SESSION['nome'];
$tpLogado = $_SESSION['tipo'];
if ((!isset($_SESSION['nome']))) {
    header('location: index.php');
}
require "conecta.php";
// Definindo a home
if ($tpLogado == "pref") {
  $home = "sisBenPrefeitura";
}
if ($tpLogado == "assist") {
  $home = "sisBenAssistente";
}
if ($tpLogado == "adm") {
  $home = "sisBenAdm";
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
            <h3 class="panel-title">Prefeituras Cadastradas</h3>
              </div>
          <div class="panel-body">
            <div class="col-md-12">
              <div class="table-responsive">
            	<table class="table table-hover">
            		<tr>
            			<th>Nome:</th>
            			<th>CNPJ:</th>
            			<th>Telefone:</th>
            			<th>Ações</th>
            		</tr>

<!-- Listando as Prefeituras -->
<?php

require "conecta.php";

$sql =$link->query("SELECT * FROM tb_prefeituras");

while($reg = $sql->fetch_array()){

$id = $reg['id_prefeitura'];
$nome = $reg['nm_prefeitura'];
$cnpj = $reg['nu_cnpj'];
$fone = $reg['fn_prefeitura'];
$cep = $reg['nu_cep'];
$logradouro = $reg['nm_logradouro'];
$numero = $reg['nu_numero'];
$bairro = $reg['nm_bairro'];
$cidade = $reg['nm_cidade'];
$uf = $reg['sl_estado'];
//Preciso para não ter erro na execução do onclick por causa da aspas simples
$confirmar = "return confirm('Deseja realmente editar este cadastro?');";

echo '<tr>
	  <td>'.$nome.'</td>
	  <td>'.$cnpj.'</td>
	  <td>'.$fone.'</td>
	  <td><button type="button" class="btn btn-danger role="button" data-toggle="modal" data-target="#'.$id.'"">
		  <span class="glyphicon glyphicon-eye-open" aria-hidden="true" title="Visualizar"></span>
		  </button>
		  <a href="editarPrefeitura?idPrefeitura='.$id.'"><button type="button" class="btn btn-danger">
		  <span class="glyphicon glyphicon-pencil" aria-hidden="true" title="Editar"></span>
		  </button></a>
		  <a href="deletePrefeitura?idPrefeitura='.$id.'" onclick="'.$confirmar.'"><button type="button" class="btn btn-danger">
		  <span class="glyphicon glyphicon-remove" aria-hidden="true" title="Excluir"></span>
		  </button></a></td>';

// Modal
echo '<div class="modal fade" id="'.$id.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>	      		
				<h4 class="modal-title" id="myModalLabel"><strong>'.$nome.'</strong></h4>
		      </div>
		      <div class="modal-body">
		        <strong>CNPJ:</strong> '.$cnpj.' <strong>Telefone:</strong> '.$fone.'<br>
		        <strong>Endereço:</strong> '.$logradouro.', '.$numero.', '.$bairro.', '.$cidade.'-'.$uf.'<br>
		        <strong>CEP:</strong> '.$cep.'
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
		      </div>
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
		              <div class="col-md-2">
		              	<a href="<?=$home?>"><button type="button" class="btn btn-danger">Voltar</button></a>
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
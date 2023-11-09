<?php
session_start();
$logado = $_SESSION['nome'];
$tpLogado = $_SESSION['tipo'];
if ((!isset($_SESSION['nome']))) {
    header('location: index.php');
}

$idUsuario = $_GET["idUsuario"];

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

<?php require "navBar.php";?>

    <div class="row">
      <h2>SisBen</h2>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Doações</h3>
              </div>
          <div class="panel-body">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-6 col-md-offset-3">
                  <div class="alert alert-info text-center" role="alert">
                    <strong>Registro de Doações!</strong> Descreva a doação e selecione o doaor cadastrado do sistema. A data é gerada automaticamente de acordo com o dia do registro.</strong></div>
                   </div>
                 </div>
            	<form method="post" action="newDoacao?idUsuario=<?=$idUsuario?>">
            		<div class="row">
            			<div class="col-md-5 col-md-offset-2">
				  		    	<div class="form-group">
    				    			<label for="descricao">Descrição:</label>
    				    			<input type="text" class="form-control" id="descricao" name="descricao" autocomplete="off" required>
				  				  	</div>
                    </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="doador">Doador:</label><br />
                  <select class="form-control" name="doador" required>
                    <option value="">Selecione</option>
<?php 
// Coletando doadores
require "conecta.php";
	$colect = $link->query("SELECT * FROM tb_doador");
		while ($reg = $colect->fetch_array()) {
			$doador = $reg['nm_doador'];
			echo '<option value="'.$doador.'">'.$doador.'</option>';
		}

  $colect2 = $link->query("SELECT * FROM tb_prefeituras");
    while ($reg2 = $colect2->fetch_array()) {
      $prefeitura = $reg2['nm_prefeitura'];
      echo '<option value="'.$prefeitura.'">'.$prefeitura.'</option>';
    }

?>
                  </select>
                  </div>
                </div>                                        
                 </div><!-- /row -->				      
          <div class="row">
            <div class="col-md-4 col-md-offset-2">
           	<button type="submit" class="btn btn-danger">Adicionar</button>
           	<a href="listCadastro"><button type="button" class="btn btn-danger" >Voltar</button></a>
             </div>
            </div>
				  </form>
    <hr class="featurette-divider">
<div class="table-responsive">
              <table class="table table-hover">
                <tr>
                  <th>Disponível em:</th>
                  <th>Descrição:</th>
                  <th>Doador:</th>
                  <th>Situação:</th>
                  <th>Data da Entrega:</th>
                  <th>Ações</th>
                </tr>

<!-- Listando Doações -->
<?php

$sql = $link->query("SELECT * FROM tb_doacao WHERE id_usuario = '$idUsuario'");

while($reg1 = $sql->fetch_array()){

$idDoacao = $reg1['id_doacao'];
$dataEntrada = $reg1['dt_entrada'];
$descricao = $reg1['te_descricao'];
$doador = $reg1['nm_doador'];
$situacao = $reg1['tp_situacao'];
$dataSaida= $reg1['dt_saida'];

//Preciso para não ter erro na execução do onclick por causa da aspas simples
$confirmarEntrega = "return confirm('Você Confirma a Entrega da Doação?');";
$confirmarDelete = "return confirm('Deseja realmente excluir esta doação?');";

// Mudando a cor do campo status de acordo com o mesmo

if($situacao == "A Receber"){
  $cor = 'class="alert alert-danger"';
}elseif ($situacao == "Entregue") {
  $cor = 'class="alert alert-success"';
}

// Ocutando ações caso a doação tenha sido entregue
if ($situacao == "Entregue") {
  $ocultar = "hidden";
}else{
  $ocultar = null;
}

echo '<tr>
    <td>'.$dataEntrada.'</td>
    <td>'.$descricao.'</td>
    <td>'.$doador.'</td>
    <td '.$cor.'>'.$situacao.'</td>
    <td>'.$dataSaida.'</td>
    <td>
      <a href="updateDoacao?idUsuario='.$idUsuario.'&&idDoacao='.$idDoacao.'" onclick="'.$confirmarEntrega.'"><button type="button" class="btn btn-danger '.$ocultar.'">
      <span class="glyphicon glyphicon-ok" aria-hidden="true" title="Confirmar Recebimento"></span>
      </button></a>
      <a href="deleteDoacao?idUsuario='.$idUsuario.'&&idDoacao='.$idDoacao.'" onclick="'.$confirmarDelete.'"><button type="button" class="btn btn-danger '.$ocultar.'">
      <span class="glyphicon glyphicon-remove" aria-hidden="true" title="Excluir"></span>
      </button></a></td>';
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
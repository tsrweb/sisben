<?php

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
                <a class="navbar-brand" href="#">SisBen</a>
                  <p class="navbar-text">Sistema para Controle de Benefícios para Cidadãos de Baixa Renda</p>
         </div>
        </div>
      </div>
    </nav><!-- /navbar -->

    <div class="row">
      <h2>SisBen</h2>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Dependentes</h3>
              </div>
          <div class="panel-body">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-6 col-md-offset-3">
                  <div class="alert alert-danger text-center" role="alert">
                    <strong>Atenção!</strong> Adicione todos os dependentes inserindo o nome, o grau de parentensco e a idade. Para adicionar mais dependentes clique em <strong>Adicionar</strong>, Caso tenha terminado ou não possua dependentes clique em <strong>Finalizar</strong></div>
                   </div>
                 </div>
            	<form method="post" action="newDependente?idUsuario=<?=$idUsuario?>">
            		<div class="row">
            			<div class="col-md-5 col-md-offset-1">
				  		    	<div class="form-group">
    				    			<label for="nome">Nome Completo:</label>
    				    			<input type="text" class="form-control" id="nome" name="nome" autocomplete="off" required>
				  				  	</div>
                    </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="grau">Grau de Parentesco:</label><br />
                  <select class="form-control" name="grau" required>
                    <option value="">Selecione</option>
                    <option value="Esposo(a)">Esposo(a)</option>
                    <option value="Filho(a)">Filho(a)</option>
                    <option value="Sobrinho(a)">Sobrinho(a)</option>
                    <option value="Pai/Mãe">Pai/Mãe</option>
                    <option value="Avô/Avó">Avô/Avó</option>
                    <option value="Enteado(a)">Enteado(a)</option>
                  </select>
                  </div>
                </div>                    
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="idade">Idade:</label>
                      <input type="text" class="form-control" id="idade" name="idade" maxlength="3" autocomplete="off" required>
                      </div>
                    </div>                      
                 </div><!-- /row -->				      
          <div class="row">
            <div class="col-md-4 col-md-offset-1">
           	<button type="submit" class="btn btn-danger">Adicionar</button>
           	<a href="readCadastro?idUsuario=<?=$idUsuario?>"><button type="button" class="btn btn-danger" onclick="alert('Cadastro Realizado Com Sucesso!')">Finalizar</button></a>
             </div>
            </div>
				  </form>
    <hr class="featurette-divider">
<div class="table-responsive">
              <table class="table table-hover">
                <tr>
                  <th>Nome:</th>
                  <th>Grau de Parentesco:</th>
                  <th>idade:</th>
                  <th>Ações</th>
                </tr>

<!-- Listando Dependentes -->
<?php

require "conecta.php";

$sql =$link->query("SELECT * FROM tb_dependente WHERE id_usuario = '$idUsuario'");

while($reg = $sql->fetch_array()){

$nome = $reg['nm_dependente'];
$tipo = $reg['tp_dependente'];
$idade = $reg['nu_idade'];
//Preciso para não ter erro na execução do onclick por causa da aspas simples
$confirmar = "return confirm('Deseja realmente excluir este cadastro?');";

echo '<tr>
    <td>'.$nome.'</td>
    <td>'.$tipo.'</td>
    <td>'.$idade.'</td>
    <td>
      <a href="deleteDependente?idUsuario='.$idUsuario.'&&nome='.$nome.'" onclick="'.$confirmar.'"><button type="button" class="btn btn-danger">
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
<?php
session_start();
$logado = $_SESSION['nome'];
$tpLogado = $_SESSION['tipo'];
if ((!isset($_SESSION['nome']))) {
    header('location: index.php');
}

$idAssistente = $_GET["idAssistente"];

require "conecta.php";

$sql = $link->query("SELECT * FROM tb_assistenteSocial WHERE id_assistentesocial = '$idAssistente' ");

while($reg = $sql->fetch_array()){

$nome = $reg['nm_assistenteSocial'];
$cpf = $reg['nu_cpf'];
$fone = $reg['fn_assistenteSocial'];
$cep = $reg['nu_cep'];
$logradouro = $reg['nm_logradouro'];
$numero = $reg['nu_numero'];
$bairro = $reg['nm_bairro'];
$cidade = $reg['nm_cidade'];
$uf = $reg['sl_estado'];
$login = $reg['nm_usuario'];
$senha = $reg['pw_senha'];
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
            <h3 class="panel-title">Editar Cadastro do Assistente Social</h3>
              </div>
          <div class="panel-body">
            <div class="col-md-12">
            	<form method="post" action="updateAssistente?idAssistente=<?=$idAssistente?>">
                <div class="row">
                  <div class="col-md-4">
                <div class="form-group">
                  <label for="nome">Nome:</label>
                  <input type="text" class="form-control" id="nome" name="nome" autocomplete="off" value="<?=$nome?>" required>
                    </div>
                    </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="cpf">CPF:</label>
                <input type="text" class="form-control" id="cpf" name="cpf" autocomplete="off" value="<?=$cpf?>" id="disabledInput" disabled>
                  </div>
                  </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="fone">Telefone:</label>
                <input type="text" class="form-control" id="fone" name="fone" placeholder="(00) 0000-0000" autocomplete="off" value="<?=$fone?>">
                  </div>
                  </div>
          </div><!-- /row -->
        <div class="row">
                <div class="col-md-2">
              <div class="form-group">
                <label for="fone">CEP:</label>
                <input type="text" class="form-control" id="cep" name="cep" placeholder="00000-000" value="<?=$cep?>" required>
                  </div>
                        </div>
                <div class="col-md-5">
              <div class="form-group">
                <label for="logradouro">Logradouro:</label>
                <input type="text" class="form-control" id="logradouro" name="logradouro" value="<?=$logradouro?>">
                  </div>
                        </div>
                <div class="col-md-1">
              <div class="form-group">
                <label for="numero">Número:</label>
                <input type="text" class="form-control" id="numero" name="numero" value="<?=$numero?>" required>
                  </div>
                        </div>
              </div><!-- /row -->
      <div class="row">
              <div class="col-md-4">
            <div class="form-group">
              <label for="bairro">Bairro:</label>
              <input type="text" class="form-control" id="bairro" name="bairro" value="<?=$bairro?>">
                  </div>
                        </div>
                <div class="col-md-4">
              <div class="form-group">
                <label for="cidade">Cidade:</label>
                <input type="text" class="form-control" id="cidade" name="cidade" value="<?=$cidade?>">
                  </div>
                        </div>
                <div class="col-md-1">
              <div class="form-group">
                <label for="uf">Estado:</label>
                <input type="text" class="form-control text-uppercase" id="uf" name="uf" maxlength="2" value="<?=$uf?>">
                  </div>
                        </div>
              </div><!-- /row -->
      <div class="row">
              <div class="col-md-4">
            <div class="form-group">
              <label for="login">Login:</label>
              <input type="text" class="form-control" id="login" name="login" value="<?=$login?>" required>
                  </div>
                        </div>
                <div class="col-md-3">
              <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" class="form-control" id="senha" name="senha" value="<?=$senha?>" required>
                  </div>
                        </div>
                <div class="col-md-3">
              <div class="form-group">
                <label for="confirSenha">Confirme a Senha:</label>
                <input type="password" class="form-control" id="confirSenha" name="confirSenha" value="<?=$senha?>" required>
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
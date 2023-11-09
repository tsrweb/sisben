<?php
session_start();
$logado = $_SESSION['nome'];
$tpLogado = $_SESSION['tipo'];
if ((!isset($_SESSION['nome']))) {
    header('location: index.php');
}

$idUsuario = $_GET["idUsuario"];

require "conecta.php";

$sql = $link->query("SELECT * FROM tb_usuario WHERE id_usuario = '$idUsuario' ");

while($reg = $sql->fetch_array()){

$nome = $reg['nm_usuario'];
$cpf = $reg['nu_cpf'];
$rg = $reg['nu_rg'];
$pis = $reg['nu_pis'];
$fone = $reg['fn_usuario'];
$dataNascimento = $reg['dt_nascimento'];
$profissao = $reg['nm_profissao'];
$renda = $reg['nu_renda'];
$cep = $reg['nu_cep'];
$logradouro = $reg['nm_logradouro'];
$numero = $reg['nu_numero'];
$bairro = $reg['nm_bairro'];
$cidade = $reg['nm_cidade'];
$uf = $reg['sl_estado'];
$tipoImovel = $reg['tp_imovel'];
$saneamento = $reg['tp_saneamento'];
$nDependentes = $reg['nu_dependentes'];
$nDeficiente = $reg['nu_deficiente'];
$status = $reg['tp_status'];
      };

// Mudando a cor do campo status de acordo com o mesmo

if($status == "Solicitação"){
  $cor = 'alert-info';
}elseif ($status == "Beneficiário") {
  $cor = 'alert-success';
}elseif ($status == "Rejeitado") {
  $cor = 'alert-danger';
}elseif ($status == "Cancelado") {
  $cor = 'alert-warning';
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
  <?php if ($tpLogado == "user") {
    include "navBarUser.php";
  }else{
    include "navBar.php";
  }?>
    <div class="row">
      <div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1">
      <h2>SisBen</h2>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title text-center">Ficha de Cadastro</h3>
              </div>
          <div class="panel-body" style="font-size: 16px;">
            <div class="col-md-12 col-xs-12">
              <div class="row">
                <div class="col-md-6 col-xs-6" style="border:1px solid #CCC;">
                  <strong>Nome:</strong><br><?=$nome?>
                </div>
                <div class="col-md-6 col-xs-6" style="border:1px solid #CCC;">
                  <strong>Telefone:</strong><br><?=$fone?>
                </div>
              </div><!-- /row -->
                <div class="row">
                <div class="col-md-3 col-xs-3" style="border:1px solid #CCC;">
                  <strong>CPF:</strong><br><?=$cpf?>
                </div>
                <div class="col-md-2 col-xs-2" style="border:1px solid #CCC;">
                  <strong>RG:</strong><br><?=$rg?>
                </div>
                <div class="col-md-3 col-xs-3" style="border:1px solid #CCC;">
                  <strong>PIS:</strong><br><?=$pis?>
                </div>
                <div class="col-md-4 col-xs-4" style="border:1px solid #CCC;">
                  <strong>Data de Nascimento:</strong><br><?=$dataNascimento?>
                </div>
              </div><!-- /row -->
                <div class="row">
                <div class="col-md-4 col-xs-4" style="border:1px solid #CCC;">
                  <strong>Profissão:</strong><br><?=$profissao?>
                </div>
                <div class="col-md-3 col-xs-3" style="border:1px solid #CCC;">
                  <strong>Renda:</strong><br>R$ <?=$renda?>
                </div>
                <div class="col-md-2 col-xs-2" style="border:1px solid #CCC;">
                  <strong>Dependentes:</strong><br><?=$nDependentes?>
                </div>
                <div class="col-md-3 col-xs-3" style="border:1px solid #CCC;">
                  <strong>Deficientes:</strong><br><?=$nDeficiente?>
                </div>
              </div><!-- /row -->
              <div class="row">
                <div class="col-md-5 col-xs-5" style="border:1px solid #CCC;">
                  <strong>Endereço:</strong><br><?=$logradouro?>
                </div>
                <div class="col-md-2 col-xs-2" style="border:1px solid #CCC;">
                  <strong>Número:</strong><br><?=$numero?>
                </div>
                <div class="col-md-3 col-xs-3" style="border:1px solid #CCC;">
                  <strong>Bairro:</strong><br><?=$bairro?>
                </div>
                <div class="col-md-2 col-xs-2" style="border:1px solid #CCC;">
                  <strong>CEP:</strong><br><?=$cep?>
                </div>
              </div><!-- /row -->
              <div class="row">
                <div class="col-md-4 col-xs-4" style="border:1px solid #CCC;">
                  <strong>Cidade:</strong><br><?=$cidade?>
                </div>
                <div class="col-md-1 col-xs-1" style="border:1px solid #CCC;">
                  <strong>UF:</strong><br><?=$uf?>
                </div>
                <div class="col-md-4 col-xs-3" style="border:1px solid #CCC;">
                  <strong>Tipo do Imóvel:</strong><br><?=$tipoImovel?>
                </div>
                <div class="col-md-3 col-xs-4" style="border:1px solid #CCC;">
                  <strong>Saneamento:</strong><br><?=$saneamento?>
                </div>
              </div><!-- /row -->

<?php

$sql2 =$link->query("SELECT * FROM tb_dependente WHERE id_usuario = '$idUsuario'");

if ($sql2->num_rows > 0) {
  echo '<div class="row">
          <div class="col-md-12 col-xs-12 text-center" style="border:1px solid #CCC;">
            <strong>Dependentes:</strong>
              </div>
            </div><!-- /row -->';
}
while($reg2 = $sql2->fetch_array()){

$nomeDependente = $reg2['nm_dependente'];
$grau = $reg2['tp_dependente'];
$idade = $reg2['nu_idade'];

echo '<div class="row">
        <div class="col-md-6 col-xs-6" style="border:1px solid #CCC;">
          <strong>Nome:</strong><br>'.$nomeDependente.'
            </div>
          <div class="col-md-3 col-xs-3" style="border:1px solid #CCC;">
            <strong>Grau de Parentesco:</strong><br>'.$grau.'
              </div>
            <div class="col-md-3 col-xs-3" style="border:1px solid #CCC;">
              <strong>Idade:</strong><br>'.$idade.'
            </div>
          </div><!-- /row -->';
};
?>
              <div class="row">
                <div class="col-md-12 col-xs-12 text-center <?=$cor?>" style="border:1px solid #CCC;">
                  <strong>Status do Cadastro:</strong><br><?=$status?>
               </div>
              </div><!-- /row -->
<?php

$sql3 =$link->query("SELECT * FROM tb_doacao WHERE id_usuario = '$idUsuario'");

if ($sql3->num_rows > 0) {
  echo '<div class="row">
          <div class="col-md-12 col-xs-12 text-center" style="border:1px solid #CCC;">
            <strong>Registro de Doações:</strong>
              </div>
             </div><!-- /row -->';
}
while($reg3 = $sql3->fetch_array()){

$dataEntrada = $reg3['dt_entrada'];
$descricao = $reg3['te_descricao'];
$doador = $reg3['nm_doador'];
$situacao = $reg3['tp_situacao'];
$dataSaida = $reg3['dt_saida'];

// Mudando a cor do campo Situação de acordo com o mesmo

if($situacao == "A Receber"){
  $cor = 'red';
}elseif ($situacao == "Entregue") {
  $cor = 'green';
}

echo '<div class="row" style="border:1px solid #CCC;">
        <div class="row">      
        <div class="col-md-7 col-xs-7">
          <strong>Descrição: </strong>'.$descricao.'
        </div>
          <div class="col-md-5 col-xs-5">
            <strong>Doador: </strong>'.$doador.'
          </div>
        </div><br>
      <div class="row">
                <div class="col-md-3 col-xs-3">
          <strong>Disponível em: </strong>'.$dataEntrada.'
        </div>
      <div class="col-md-4 col-xs-4">
            <strong>Data da Entrega: </strong>'.$dataSaida.'
          </div>
      <div class="col-md-3 col-md-offset-2 col-xs-3 col-xs-offset-2" style="color:'.$cor.';">
            <strong>Situação: </strong>'.$situacao.'
          </div>
        </div>
      </div><!-- /row -->';
};

if ($tpLogado == "user") {
  echo '<div class="row">
          <div class="col-md-12 col-xs-12">
            <hr class="featurette-divider">
             <a href="editarCadastro?idUsuario='.$idUsuario.'"><button type="button" class="btn btn-danger">Editar Cadastro</button></a>
            <a href="logout"><button type="button" class="btn btn-danger">Sair</button></a>
          </div>
        </div><!-- /row -->';
}else{

echo '<div class="row">
          <div class="col-md-12 col-xs-12">
            <hr class="featurette-divider">
            <a href="listCadastro"><button type="button" class="btn btn-danger">Voltar</button></a>
          </div>
        </div><!-- /row -->';
}
?>

<!-- Modal de Alerta-->
<div class="modal fade" id="alerta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="alert alert-danger text-center" role="alert"><strong>Atenção!!!</strong><br>
      Você possui doações a receber, por favor entre em contato com os assistentes sociais do SisBen.
    </div>
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
    <div class="col-md-3 col-md-offset-9 col-xs-3 col-xs-offset-9">
      &copy; 2017 Equipe Umbrella Corporation
        </div>
          </div><!-- /footer -->

  </div> <!--  /container -->

    <!-- jQuery (obrigatório para plugins JavaScript do Bootstrap) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Inclui todos os plugins compilados (abaixo), ou inclua arquivos separadados se necessário -->
    <script src="js/bootstrap.min.js"></script>

<?php
// Exibindo Modal caso o usuário tenha doação a receber
if($tpLogado == "user"){ 
$verify = $link->query("SELECT * FROM tb_doacao WHERE id_usuario = '$idUsuario' AND tp_situacao = 'A Receber'");

if($verify->num_rows > 0){
  echo'<script type="text/javascript">
       $(document).ready(function(){ $("#alerta").modal(); });
    </script>';}}
  ?>
  </body>
</html>
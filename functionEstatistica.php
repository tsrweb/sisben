<?php

require "conecta.php";

//Identificando o usuário
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

// Coletando dados gerais
$sql =$link->query("SELECT * FROM tb_usuario WHERE nm_cidade = '$cidadePrefeitura'");

$total = $sql->num_rows;

$sql2 =$link->query("SELECT * FROM tb_usuario WHERE nm_cidade = '$cidadePrefeitura' AND tp_status = 'Solicitação' ");

$totalSolicitacao = $sql2->num_rows;

$sql3 =$link->query("SELECT * FROM tb_usuario WHERE nm_cidade = '$cidadePrefeitura' AND tp_status = 'Beneficiário' ");

$totalBeneficiario = $sql3->num_rows;

$sql4 =$link->query("SELECT * FROM tb_usuario WHERE nm_cidade = '$cidadePrefeitura' AND tp_status = 'Rejeitado' ");

$totalRejeitado = $sql4->num_rows;

$sql5 =$link->query("SELECT * FROM tb_usuario WHERE nm_cidade = '$cidadePrefeitura' AND tp_status = 'Cancelado' ");

$totalCancelado = $sql5->num_rows;

?>
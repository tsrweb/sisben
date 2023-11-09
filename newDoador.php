<?php
session_start();
$logado = $_SESSION['nome'];
$tpLogado = $_SESSION['tipo'];
if ((!isset($_SESSION['nome']))) {
    header('location: index.php');}

$nome = $_POST["nome"];
$cpfcnpj = $_POST["cpfcnpj"];
$fone = $_POST["fone"];
$cep = $_POST["cep"];
$logradouro = $_POST["logradouro"];
$numero = $_POST["numero"];
$bairro = $_POST["bairro"];
$cidade = $_POST["cidade"];
$uf = $_POST["uf"];

$chk = strlen($cpfcnpj);
if($chk == 14){
	$tp = "Pessoa Física";
}else{
	$tp = $_POST["tipo"];
}

require "conecta.php";

// Coletando o ID da prefeitura
$colet = $link->query("SELECT * FROM tb_prefeituras WHERE nm_prefeitura = '$logado' ");

	while($reg = $colet->fetch_array()){

	$idPrefeitura = $reg['id_prefeitura'];

	}

$sql = $link->query("INSERT INTO tb_doador (
nm_doador,
nu_cpf_cnpj,
tp_tipo,
fn_doador,
nu_cep,
nm_logradouro,
nu_numero,
nm_bairro,
nm_cidade,
sl_estado,
id_prefeitura
)VALUES(
'$nome',
'$cpfcnpj',
'$tp',
'$fone',
'$cep',
'$logradouro',
'$numero',
'$bairro',
'$cidade',
'$uf',
'$idPrefeitura'
)");

$idDoador = $link->insert_id;

echo "<script>
		alert('Cadastro Realizado com Sucesso!');
		window.location.href = 'readDoador?idDoador=$idDoador';
			</script>";

$link->close();
?>
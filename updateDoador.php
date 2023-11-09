<?php
session_start();
$logado = $_SESSION['nome'];
$tpLogado = $_SESSION['tipo'];
if ((!isset($_SESSION['nome']))) {
    header('location: index.php');}

$idDoador = $_GET["idDoador"];

$nome = $_POST["nome"];
$fone = $_POST["fone"];
$cep = $_POST["cep"];
$logradouro = $_POST["logradouro"];
$numero = $_POST["numero"];
$bairro = $_POST["bairro"];
$cidade = $_POST["cidade"];
$uf = $_POST["uf"];

require "conecta.php";

$sql = "UPDATE tb_doador SET
nm_doador = '$nome',
fn_doador = '$fone',
nu_cep = '$cep',
nm_logradouro = '$logradouro',
nu_numero = '$numero',
nm_bairro = '$bairro',
nm_cidade = '$cidade',
sl_estado = '$uf'
WHERE id_doador = '$idDoador'";

$res = $link->query($sql);

echo "<script>
		alert('Cadastro Alterado com Sucesso!');
		window.location.href = 'readDoador?idDoador=$idDoador';
			</script>";

$link->close();
?>
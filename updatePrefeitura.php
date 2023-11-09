<?php
session_start();
$logado = $_SESSION['nome'];
$tpLogado = $_SESSION['tipo'];
if ((!isset($_SESSION['nome']))) {
    header('location: index.php');}

$idPrefeitura = $_GET["idPrefeitura"];

$nome = $_POST["nome"];
$fone = $_POST["fone"];
$cep = $_POST["cep"];
$logradouro = $_POST["logradouro"];
$numero = $_POST["numero"];
$bairro = $_POST["bairro"];
$cidade = $_POST["cidade"];
$uf = $_POST["uf"];
$login = $_POST["login"];
$senha = $_POST["senha"];

require "conecta.php";

$verify = $link->query("SELECT * FROM tb_prefeituras WHERE id_prefeitura != '$idPrefeitura' AND nm_usuario = '$login' ");

if ($verify->num_rows > 0) {

	echo "<script>	alert('Login já cadastrado!');
					window.history.back();
		</script>";

	die;
	}

$sql = "UPDATE tb_prefeituras SET
nm_prefeitura = '$nome',
fn_prefeitura = '$fone',
nu_cep = '$cep',
nm_logradouro = '$logradouro',
nu_numero = '$numero',
nm_bairro = '$bairro',
nm_cidade = '$cidade',
sl_estado = '$uf',
nm_usuario = '$login',
pw_senha = '$senha'
WHERE id_prefeitura = '$idPrefeitura'";

$res = $link->query($sql);

if ($tpLogado == "pref") {
	$_SESSION['nome'] = $nome;
}

echo "<script>
		alert('Cadastro Alterado com Sucesso!');
		window.location.href = 'readPrefeitura?idPrefeitura=$idPrefeitura';
			</script>";

$link->close();
?>
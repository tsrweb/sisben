<?php
session_start();
$logado = $_SESSION['nome'];
$tpLogado = $_SESSION['tipo'];
if ((!isset($_SESSION['nome']))) {
    header('location: index.php');}

$idPrefeitura = $_GET["idPrefeitura"];

require "conecta.php";

$sql = $link->query("DELETE FROM tb_assistenteSocial WHERE id_prefeitura = '$idPrefeitura'");
$sql1 = $link->query("DELETE FROM tb_prefeituras WHERE id_prefeitura = '$idPrefeitura'");

echo "<script>
		alert('Cadastro excluido com Sucesso!');
		window.location.href = 'listPrefeituras';
			</script>";

$link->close();
?>
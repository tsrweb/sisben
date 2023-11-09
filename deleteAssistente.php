<?php
session_start();
$logado = $_SESSION['nome'];
$tpLogado = $_SESSION['tipo'];
if ((!isset($_SESSION['nome']))) {
    header('location: index.php');}

$idAssistente = $_GET["idAssistente"];

require "conecta.php";

$sql = $link->query("DELETE FROM tb_assistenteSocial WHERE id_assistenteSocial = '$idAssistente'");

echo "<script>
		alert('Cadastro excluido com Sucesso!');
		window.location.href = 'listAssistentes';
			</script>";

$link->close();
?>
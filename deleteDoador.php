<?php
session_start();
$logado = $_SESSION['nome'];
$tpLogado = $_SESSION['tipo'];
if ((!isset($_SESSION['nome']))) {
    header('location: index.php');}

$idDoador = $_GET["idDoador"];

require "conecta.php";

$sql = $link->query("DELETE FROM tb_doador WHERE id_doador = '$idDoador'");

echo "<script>
		alert('Cadastro excluido com Sucesso!');
		window.location.href = 'listDoadores';
			</script>";

$link->close();
?>
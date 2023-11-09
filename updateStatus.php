<?php
session_start();
$logado = $_SESSION['nome'];
$tpLogado = $_SESSION['tipo'];
if ((!isset($_SESSION['nome']))) {
    header('location: index.php');}

$idUsuario = $_GET["idUsuario"];

$status = $_POST["status"];

require "conecta.php";

$sql = "UPDATE tb_usuario SET tp_status = '$status' WHERE id_usuario = '$idUsuario'";

$res = $link->query($sql);

echo "<script>
		window.location.href = 'listCadastro';
			</script>";

$link->close();
?>
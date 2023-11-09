<?php

$idUsuario = $_GET["idUsuario"];
$nome = $_GET["nome"];

require "conecta.php";

$sql = $link->query("DELETE FROM tb_dependente WHERE id_usuario = '$idUsuario' AND nm_dependente = '$nome'");

echo "<script>
    window.location.href = 'cadastroSisBenDependente?idUsuario=$idUsuario';
      </script>";

$link->close();
?>
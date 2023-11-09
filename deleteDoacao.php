<?php

$idUsuario = $_GET["idUsuario"];
$idDoacao = $_GET["idDoacao"];

require "conecta.php";

$sql = $link->query("DELETE FROM tb_doacao WHERE id_doacao = '$idDoacao' ");

echo "<script>
    window.location.href = 'doacao?idUsuario=$idUsuario';
      </script>";

$link->close();
?>
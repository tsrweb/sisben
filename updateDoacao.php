<?php

date_default_timezone_set ("America/Sao_Paulo");

$data = date("d/m/20y", time());

$idUsuario = $_GET["idUsuario"];
$idDoacao = $_GET["idDoacao"];

$situacao = "Entregue";

require "conecta.php";

$sql = "UPDATE tb_doacao SET 
tp_situacao = '$situacao',
dt_saida = '$data'
WHERE id_doacao = '$idDoacao'";

$res = $link->query($sql);

echo "<script>
    window.location.href = 'doacao?idUsuario=$idUsuario';
      </script>";

$link->close();
?>
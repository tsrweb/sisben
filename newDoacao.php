<?php

date_default_timezone_set ("America/Sao_Paulo");

$data = date("d/m/20y", time());

$idUsuario = $_GET["idUsuario"];

$descricao = $_POST["descricao"];
$doador = $_POST["doador"];

$situacao = "A Receber";

require "conecta.php";

$sql = $link->query("INSERT INTO tb_doacao (
te_descricao,
dt_entrada,
nm_doador,
tp_situacao,
id_usuario
)VALUES(
'$descricao',
'$data',
'$doador',
'$situacao',
'$idUsuario'
)");

echo "<script>
    window.location.href = 'doacao?idUsuario=$idUsuario';
      </script>";

$link->close();
?>
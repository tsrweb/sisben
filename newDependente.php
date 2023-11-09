<?php

$idUsuario = $_GET["idUsuario"];

$nome = $_POST["nome"];
$grau = $_POST["grau"];
$idade = $_POST["idade"];

require "conecta.php";

$sql = $link->query("INSERT INTO tb_dependente (
nm_dependente,
tp_dependente,
nu_idade,
id_usuario
)VALUES(
'$nome',
'$grau',
'$idade',
'$idUsuario'
)");

echo "<script>
    window.location.href = 'cadastroSisBenDependente?idUsuario=$idUsuario';
      </script>";

$link->close();
?>
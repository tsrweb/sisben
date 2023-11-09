<?php

$nome = $_POST["nome"];
$cpf = $_POST["cpf"];
$rg = $_POST["rg"];
$pis = $_POST["pis"];
$fone = $_POST["fone"];
$dataNascimento = $_POST["dataNascimento"];
$profissao = $_POST["profissao"];
$renda = $_POST["renda"];
$cep = $_POST["cep"];
$logradouro = $_POST["logradouro"];
$numero = $_POST["numero"];
$bairro = $_POST["bairro"];
$cidade = $_POST["cidade"];
$uf = $_POST["uf"];
$tipoImovel = $_POST["tipoImovel"];
$saneamento = $_POST["saneamento"];
$nDependente = $_POST["nDependente"];
$nDeficiente = $_POST["nDeficiente"];
$senha = $_POST["senha"];
$tpUser = "user";
$status = "Solicitação";

if (empty($nDependente)) {
	$nDependente = "Não";
}
if (empty($nDeficiente)) {
	$nDeficiente = "Não";
}
require "conecta.php";

$verify = $link->query("SELECT * FROM tb_usuario WHERE nu_cpf = '$cpf' ");

if ($verify->num_rows > 0) {

  echo "<script>  alert('CPF já cadastrado!');
          window.history.back();
    </script>";

  die;
  }

$sql = $link->query("INSERT INTO tb_usuario (
nm_usuario,
nu_cpf,
nu_rg,
nu_pis,
fn_usuario,
dt_nascimento,
nm_profissao,
nu_renda,
nu_cep,
nm_logradouro,
nu_numero,
nm_bairro,
nm_cidade,
sl_estado,
tp_imovel,
tp_saneamento,
nu_dependentes,
nu_deficiente,
pw_senha,
tp_user,
tp_status
)VALUES(
'$nome',
'$cpf',
'$rg',
'$pis',
'$fone',
'$dataNascimento',
'$profissao',
'$renda',
'$cep',
'$logradouro',
'$numero',
'$bairro',
'$cidade',
'$uf',
'$tipoImovel',
'$saneamento',
'$nDependente',
'$nDeficiente',
'$senha',
'$tpUser',
'$status'
)");

$idUsuario = $link->insert_id;

session_start();
$_SESSION['nome'] = $idUsuario ;
$_SESSION['tipo'] = $tpUser;

echo "<script>
    window.location.href = 'cadastroSisBenDependente?idUsuario=$idUsuario';
      </script>";

$link->close();
?>
<?php
session_start();
$logado = $_SESSION['nome'];
$tpLogado = $_SESSION['tipo'];
if ((!isset($_SESSION['nome']))) {
    header('location: index.php');
}

$idUsuario = $_GET["idUsuario"];

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

if (empty($nDependente)) {
	$nDependente = "Não";
}
if (empty($nDeficiente)) {
	$nDeficiente = "Não";
}
require "conecta.php";

$verify = $link->query("SELECT * FROM tb_usuario WHERE nu_cpf = '$cpf' AND id_usuario != '$idUsuario' ");

if ($verify->num_rows > 0) {

  echo "<script>  alert('CPF já cadastrado!');
          window.history.back();
    </script>";

  die;
  }

$sql = "UPDATE tb_usuario SET
nm_usuario = '$nome',
nu_cpf = '$cpf',
nu_rg = '$rg',
nu_pis = '$pis',
fn_usuario = '$fone',
dt_nascimento = '$dataNascimento',
nm_profissao = '$profissao',
nu_renda = '$renda',
nu_cep = '$cep',
nm_logradouro = '$logradouro',
nu_numero = '$numero',
nm_bairro = '$bairro',
nm_cidade = '$cidade',
sl_estado = '$uf',
tp_imovel = '$tipoImovel',
tp_saneamento = '$saneamento',
nu_dependentes = '$nDependente',
nu_deficiente = '$nDeficiente',
pw_senha = '$senha'
WHERE id_usuario = '$idUsuario'";

$res = $link->query($sql);

echo "<script>
		alert('Cadastro Alterado com Sucesso!');
		window.location.href = 'cadastroSisBenDependente?idUsuario=$idUsuario';
			</script>";

$link->close();
?>
<?php
session_start();
$logado = $_SESSION['nome'];
$tpLogado = $_SESSION['tipo'];
if ((!isset($_SESSION['nome']))) {
    header('location: index.php');}

$nome = $_POST["nome"];
$cnpj = $_POST["cnpj"];
$fone = $_POST["fone"];
$cep = $_POST["cep"];
$logradouro = $_POST["logradouro"];
$numero = $_POST["numero"];
$bairro = $_POST["bairro"];
$cidade = $_POST["cidade"];
$uf = $_POST["uf"];
$login = $_POST["login"];
$senha = $_POST["senha"];
$tpUser = "pref";

require "conecta.php";

$verify = $link->query("SELECT * FROM tb_prefeituras WHERE nu_cnpj = '$cnpj' ");

if ($verify->num_rows > 0) {

	echo "<script>	alert('CNPJ já cadastrado!');
					window.history.back();
		</script>";

	die;
	}

$verify2 = $link->query("SELECT * FROM tb_prefeituras WHERE nm_usuario = '$login' ");

if ($verify2->num_rows > 0) {

	echo "<script>	alert('Login já cadastrado!');
					window.history.back();
		</script>";

	die;
	}

$sql = $link->query("INSERT INTO tb_prefeituras (
nm_prefeitura,
nu_cnpj,
fn_prefeitura,
nu_cep,
nm_logradouro,
nu_numero,
nm_bairro,
nm_cidade,
sl_estado,
nm_usuario,
pw_senha,
tp_user
)VALUES(
'$nome',
'$cnpj',
'$fone',
'$cep',
'$logradouro',
'$numero',
'$bairro',
'$cidade',
'$uf',
'$login',
'$senha',
'$tpUser'
)");

$idPrefeitura = $link->insert_id;

echo "<script>
		alert('Cadastro Realizado com Sucesso!');
		window.location.href = 'readPrefeitura?idPrefeitura=$idPrefeitura';
			</script>";

$link->close();
?>
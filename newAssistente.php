<?php
session_start();
$logado = $_SESSION['nome'];
$tpLogado = $_SESSION['tipo'];
if ((!isset($_SESSION['nome']))) {
    header('location: index.php');}

$nome = $_POST["nome"];
$cpf = $_POST["cpf"];
$fone = $_POST["fone"];
$cep = $_POST["cep"];
$logradouro = $_POST["logradouro"];
$numero = $_POST["numero"];
$bairro = $_POST["bairro"];
$cidade = $_POST["cidade"];
$uf = $_POST["uf"];
$login = $_POST["login"];
$senha = $_POST["senha"];
$tpUser = "assist";

require "conecta.php";

// Coletando o ID da prefeitura
$colet = $link->query("SELECT * FROM tb_prefeituras WHERE nm_prefeitura = '$logado' ");

	while($reg = $colet->fetch_array()){

	$idPrefeitura = $reg['id_prefeitura'];

	}

$verify = $link->query("SELECT * FROM tb_assistenteSocial WHERE nu_cpf = '$cpf' ");

if ($verify->num_rows > 0) {

	echo "<script>	alert('CPF já cadastrado!');
					window.history.back();
		</script>";

	die;
	}

$verify2 = $link->query("SELECT * FROM tb_assistenteSocial WHERE nm_usuario = '$login' ");

if ($verify2->num_rows > 0) {

	echo "<script>	alert('Login já cadastrado!');
					window.history.back();
		</script>";

	die;
	}

$sql = $link->query("INSERT INTO tb_assistenteSocial (
nm_assistenteSocial,
nu_cpf,
fn_assistenteSocial,
nu_cep,
nm_logradouro,
nu_numero,
nm_bairro,
nm_cidade,
sl_estado,
nm_usuario,
pw_senha,
tp_user,
id_prefeitura
)VALUES(
'$nome',
'$cpf',
'$fone',
'$cep',
'$logradouro',
'$numero',
'$bairro',
'$cidade',
'$uf',
'$login',
'$senha',
'$tpUser',
'$idPrefeitura'
)");

$idAssistente = $link->insert_id;

echo "<script>
		alert('Cadastro Realizado com Sucesso!');
		window.location.href = 'readAssistente?idAssistente=$idAssistente';
			</script>";

$link->close();
?>
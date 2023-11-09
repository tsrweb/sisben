<?php	/* Desenvolvido por Tiago Rodrigues */
session_start();

$login = $_POST['user'];
$senha = $_POST['senha'];

require "conecta.php";

$con = $link->query("SELECT * FROM tb_user WHERE nm_user = '$login' AND pw_senha = '$senha'");
$con2 = $link->query("SELECT * FROM tb_prefeituras WHERE nm_usuario = '$login' AND pw_senha = '$senha'");
$con3 = $link->query("SELECT * FROM tb_assistenteSocial WHERE nm_usuario = '$login' AND pw_senha = '$senha'");
$con4 = $link->query("SELECT * FROM tb_usuario WHERE nu_cpf = '$login' AND pw_senha = '$senha'");

if ($con->num_rows > 0) {

	while($reg = $con->fetch_array()){

	$usuario = $reg['nm_user'];
	$tpUser = $reg['tp_user'];

	}

	if ($tpUser == "adm"){
	$_SESSION['nome'] = $usuario ;
	$_SESSION['tipo'] = $tpUser;
	header('location: sisBenAdm');
	}
	}else
	if ($con2->num_rows > 0) {

	while($reg = $con2->fetch_array()){

	$usuario = $reg['nm_prefeitura'];
	$tpUser = $reg['tp_user'];

	}

	if ($tpUser == "pref"){
	$_SESSION['nome'] = $usuario ;
	$_SESSION['tipo'] = $tpUser;
	header('location: sisBenPrefeitura');
	}
	}
	else
	if ($con3->num_rows > 0) {

	while($reg = $con3->fetch_array()){

	$usuario = $reg['nm_assistenteSocial'];
	$tpUser = $reg['tp_user'];

	}

	if ($tpUser == "assist"){
	$_SESSION['nome'] = $usuario ;
	$_SESSION['tipo'] = $tpUser;
	header('location: sisBenAssistente');
	}
	}else
	if ($con4->num_rows > 0) {

	while($reg = $con4->fetch_array()){

	$usuario = $reg['id_usuario'];
	$tpUser = $reg['tp_user'];

	}

	if ($tpUser == "user"){
	$_SESSION['nome'] = $usuario ;
	$_SESSION['tipo'] = $tpUser;
	header('location: readCadastro?idUsuario='.$usuario.'');
	}
	}else{
	unset($_SESSION['nome']);
	$_SESSION['erro'] = '<script type="text/javascript">alert("Usuário/CPF ou senha inválidos")</script>';
	header('location: index');
	}

$link->close();
?>
<?php
$host       = 'localhost';
$user       = 'root';
$password   = '123';
$db         = 'bd_sisben';

$link = new Mysqli($host, $user, $password, $db);
if($link->connect_error)
	die('Erro de conexão');
?>
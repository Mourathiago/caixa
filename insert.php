<?php

session_start();

if (!isset($_SESSION['user_login']) || $_SESSION['user_login'] !== true) {
    header("Location: entrar.php");
}

function __autoload($classe){
	require_once 'classes/'.$classe.'.class.php';
}

	$userid = $_SESSION['user_id'];
	$solicitante = $_POST['solicitante'];
	$requisicao = $_POST['requisicao'];
	$motivo = $_POST['motivo'];

	$cadastro = new cadastro();

	$cadastro -> setSolicitante($solicitante);
	$cadastro -> setRequisicao($requisicao);
	$cadastro -> setMotivo($motivo);
	$cadastro -> setUserid($userid);

	try {
		$cadastro -> create();
		header("Location: index.php");
	} catch (Exception $e) {
		echo $e;
	}
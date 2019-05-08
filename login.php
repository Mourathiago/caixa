<?php

	function __autoload($classe){

    	require_once 'classes/'.$classe.'.class.php';

  	}

	$login = $_POST['login'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM user WHERE login_user = :login AND senha_user = :password";
	$stmt = db::prepare($sql);
	$stmt -> bindParam(':login', $login, PDO::PARAM_STR);
	$stmt -> bindParam(':password', $password, PDO::PARAM_STR);
	$stmt -> execute();

	if ($stmt -> rowCount() == 0){

		header("Location: entrar.php");
		
	}

	foreach ($stmt as $key => $value) {

		session_start();

		$_SESSION['user_login'] = true;
		$_SESSION['user_id'] = $value['userid'];
		$_SESSION['user_nome'] = $value['nome_user'];
		$_SESSION['user_nvl'] = $value['nvl_user'];

		header("Location: index.php");
	}
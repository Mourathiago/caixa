<?php

 	session_start();

 	$_SESSION['user_login'] = false;

 	session_destroy();

 	header("Location: entrar.php");
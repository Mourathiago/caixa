<?php
	session_start();

	if ($_SESSION['user_login'] == true and $_SESSION['user_nvl'] == 1) {

    	header("Location: index.php");

  	}

	function __autoload($classe){

    	require_once 'classes/'.$classe.'.class.php';

  	}

?>
<!DOCTYPE html>
	<html>

	<head>
		<title>Login</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	</head>

	<body>

	<div class="row">
		<div class="col s12">
		</div>
	</div>

	<div class="row">
		<div class="col s12">
		</div>
	</div>

	<div class="row">
		<div class="col s12">
		</div>
	</div>

	<div class="row">
		<div class="col s12">
		</div>
	</div>

	<div class="row">
		<div class="col s12">
		</div>
	</div>

<div class="row">
		<div class="col s12">
		</div>
	</div>

<div class="row">
		<div class="col s12">
		</div>
	</div>


	<div class="row">
		<div class="col s6 m4 offset-m4">
		  <div class="card green darken-2">
		    <div class="card-content white-text">
		    	<div class="row">
		    		<div class="col offset-s5 center-align">
				      	<span class="card-title">Infranet</span>
				      	<span class="card-title">Entrar</span>
				    </div>
		      	</div>
		      	<form method="post" action="login.php">
		      		<div class="input-field col s12">
						<label>Login: </label></br>
						<input type="text" name="login"></br>
					</div>
					<div class="input-field col s12">
						<label>Senha: </label></br>
						<input type="password" name="password"></br>
					</div>
					<div class="row">
						<div class="col offset-s10">
							<button class="btn waves-effect waves-light" type="submit">Entrar</button>
						</div>
					</div>
				</form>
		    </div>
		  </div>
		</div>
	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

	</body>

	</html>
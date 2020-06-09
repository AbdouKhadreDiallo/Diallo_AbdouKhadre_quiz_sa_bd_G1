<?php
include('../data/connectionBdd.php');

if (isset($_POST['connecter'])) 
{ 
	$login =  $_POST['login'];
	$password = $_POST['password'];
	if (!empty($login) && !empty($password)) 
	{
		$utilisateurs = connexion($login,$password);
		if ($utilisateurs) {
			echo $utilisateurs;
		}else{
			echo "incorrect";
		}
	}
	else
	{
		echo "empty";
	}
}




<?php
	include 'server.php';
	$bdd = getConnexion();
	$id=$_POST['id'];
	$sql = "DELETE FROM utilisateurs WHERE id=$id";
	if ($bdd->query($sql) == true) {
		echo "updated";
	} 
	else {
		echo $id;
	}
?>

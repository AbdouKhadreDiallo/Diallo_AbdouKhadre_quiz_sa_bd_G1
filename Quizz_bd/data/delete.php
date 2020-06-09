<?php
	include 'config.php';
	$id=$_POST['id'];
	$sql = "DELETE FROM utilisateurs WHERE id=$id";
	if (mysqli_query($con, $sql)) {
		echo "deleted";
	} 
	else {
		echo $id;
	}
	mysqli_close($con);
?>

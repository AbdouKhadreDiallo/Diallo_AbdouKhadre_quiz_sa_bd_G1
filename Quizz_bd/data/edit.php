<?php

// include('config.php');
include('server.php');
$bdd = getConnexion();
$id = $_POST['id'];
$text = $_POST['text'];
$column_name = $_POST['column_name'];

$sql = "UPDATE utilisateurs SET $column_name = '$text' WHERE id = $id";
if ($bdd->query($sql) == true) {
    echo "updated";
} 
// $result = mysqli_query($con, $sql);
// if ($result) {
//     echo 'updated';
// }

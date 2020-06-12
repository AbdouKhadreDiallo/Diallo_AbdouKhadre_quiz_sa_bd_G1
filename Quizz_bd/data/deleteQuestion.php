<?php

    include('server.php');
    $bdd = getConnexion();

    $id = $_POST['id'];
    $sql = "DELETE from question WHERE question_id = $id";
    if ($bdd->query($sql) == true) {
        echo "deleted";
    } 
    

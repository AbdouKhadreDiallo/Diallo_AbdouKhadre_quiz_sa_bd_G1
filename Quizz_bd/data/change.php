<?php

    require_once('server.php');
    $conn = getConnexion();
    if (isset($_POST['action'])) {
        if ($_POST["action"]=='change_status') {
            $status='';
            if (isset($_POST['statut']) && $_POST['statut']=='active') {
          
             $status='inactive';
            }else{
             $status='active';
            }
            // $query = $conn -> prepare("UPDATE utilisateurs set statut =".$status."WHERE id=".$id);
            // $resultat = $query->execute();
            $query='UPDATE utilisateurs SET statut=:statut WHERE id=:id';
            $statement=$conn->prepare($query);
            $statement->execute(array(
             ':statut'  => $status,
             ':id'  =>$_POST['id']));
            $result=$statement->fetchAll();
            if (isset($result)) {
             echo '<div class="alert alert-success">user status has been set to<strong>'.$status.'</strong></div>';
            }
           }
          
    }
    
    
<?php

// inscription.php

function insertion($prenom,$nom,$login,$profil,$password,$filename,$score=0){
    include_once('./traitement/fonctions.php');
    include_once('server.php');
    $conn = getConnexion();
    $query = $conn->prepare('INSERT INTO utilisateurs(prenom, nom,login,profil, password,avatar,score) VALUES (?,?,?,?,?,?,?)');
    $result = $query->execute(array($nom,$prenom,$login,$profil,$password,$filename,$score));
    if ($result) {
        connection($login,$password);
    }
}


function createQuestion($libelle, $nombrePoint,$questionType,$reponsePossible, $tabReponse){
    include_once('server.php');
    $conn = getConnexion();
    $query = $conn->query ('INSERT INTO question (question_id,Libelle, score,Type,reponsePossible, bonneReponse) VALUES (?,?,?,?,?,?)');
    $result = $query->execute(array(null,$libelle,$nombrePoint,$questionType,$reponsePossible,$tabReponse));
}
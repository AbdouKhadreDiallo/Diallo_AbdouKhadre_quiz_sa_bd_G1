<?php
function sqlquery(){
    include_once('server.php');
    $conn = getConnexion();
    $sqlQuery = $conn->query("SELECT * FROM utilisateurs where profil = 'joueur' ");
    $perPage = 5;
    $totalRecords =$sqlQuery->fetchColumn();
    // $totalRecords = mysqli_num_rows($result);
    $totalPages = ceil($totalRecords/$perPage);
    return $totalPages;
}


// Scroll.php
function scroll($start,$limit){
    include_once('server.php');
    $conn = getConnexion();
    $query = $conn->query("SELECT * FROM question ORDER BY question_id ASC LIMIT ".$start.", ".$limit."");
    $result =$query->fetch();
    return $result;
}

// questions.php
$question = "SELECT * FROM question";
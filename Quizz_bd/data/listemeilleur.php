<?php
    require_once('server.php');
    $conn = getConnexion();
    $sqlQuery = $conn->query ("SELECT * FROM utilisateurs where profil = 'joueur' ORDER BY score DESC Limit 5");
    $row =$sqlQuery->fetchAll();

    echo json_encode($row);

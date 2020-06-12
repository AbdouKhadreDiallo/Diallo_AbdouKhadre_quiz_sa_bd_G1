<?php
include "config.php";
include "connectionBdd.php";
/* Getting post data */
$rowid = $_POST['rowid'];
$rowperpage = $_POST['rowperpage'];

/* Count total number of rows */
$query = "SELECT count(*) as allcount FROM utilisateurs where profil = 'joueur'";
$result = mysqli_query($con,$query);
$fetchresult = mysqli_fetch_array($result);
$allcount = $fetchresult['allcount'];

/* Selecting rows */
$query = "SELECT * FROM utilisateurs where profil = 'joueur' ORDER BY score DESC LIMIT ".$rowid.",".$rowperpage;

$result = mysqli_query($con,$query);

$employee_arr = array();
$employee_arr[] = array("allcount" => $allcount);

while($row = mysqli_fetch_array($result)){
    $id = $row['id'];
    $empid = $row['prenom'];
    $empname = $row['nom'];
    $salary = $row['score'];
    if ($row['statut'] == 1) {
        $statut ='Active';
    }else{
        $statut = 'Inactive';
    }
    $login = $row['login'];
    

    $employee_arr[] = array("id" => $id,"prenom" => $empid,"nom" => $empname,"score" => $salary,"statut" => $statut,"login" => $login);
}

/* encoding array to json format */
echo json_encode($employee_arr);

if (isset($_POST['delete'])) {
    $conn = getConnexion();
    $id = $_GET['id'];
    $count=$conn->prepare("DELETE FROM utilisateurs WHERE id=" . $id);
    $count->execute();
    exit();
}
<?php

include('server.php');
$conn = getConnexion();
$data = $conn->query("SELECT * FROM utilisateurs")->fetchAll();
// print_r($data);
// and somewhere later:
foreach ($data as $r) {
    $rows[] = $r;
}
// print_r($rows);
// $sql = "SELECT * FROM utilisateurs";
// if ($bdd->query($sql) == true) {
//     echo "updated";
// }
// $result = mysqli_query($conn, $query);
// $rows = array();
// while($r = mysqli_fetch_array($result)) {
//     $rows[] = $r;
// }
$rows =  json_encode($rows);
echo $rows;

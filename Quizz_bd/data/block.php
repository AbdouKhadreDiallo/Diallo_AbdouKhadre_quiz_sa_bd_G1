<?php
include "config.php";
$request = $_POST['request'];
// Enable/Disable user
if($request == 1){
  $active = $_POST['active'];
  // $active = 0;
  $login = $_POST['login'];
  // $login = 'lil';

  $return_val = "";
  if($active == 0){
    $active = 1;
    $return_val = "Active";
  }else{
    $active = 0;
    $return_val = "Inactive";
  }

  // Update active value
  $sql = "UPDATE utilisateurs SET statut=".$active." WHERE login='".$login."'";
  if (mysqli_query($con,$sql)) {
    echo $return_val;
  };

  
  // exit;
}
<?php
// $conn =  mysqli_connect("mysql-abdukhadre.alwaysdata.net", "207747", "A@kd77111", "abdukhadre_quizz"); 
// $conn = mysqli_connect("localhost", "root", "", "quizz");
// $conn = new PDO('mysql:host=localhost;dbname=quizz','root','');
function getConnexion()
 {
     $objetPDO="";
     try
     {
       $objetPDO =new PDO( 'mysql:host=localhost;port=3308;dbname=quizz','root','');
        $objetPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        return $objetPDO;
     }
     catch(PDOException $e)
     {
         die('quelques chose d anormal');
     }
 }

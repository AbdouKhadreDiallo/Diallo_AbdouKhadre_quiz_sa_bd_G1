<?php
session_start();
  $bdd = new PDO('mysql:host=localhost;port=3308;dbname=quizz','root','');
//   var_dump($bdd);
//fonction de connexion
function connexion($login,$password){
    global $bdd;$user="";
    $profil = "";
    $query  = $bdd->prepare('SELECT * FROM utilisateurs WHERE login =? AND password=?');
    $query->execute(array($login,$password));
    $result = $query->fetch();
    if($result){
        $_SESSION['statut'] = "login";
        $_SESSION['user'] = $result;
        if($result['profil'] == "admin"){
            $_SESSION['user'] = $result;
            $user = "admin";
        }else{
            $user = "joueur";
        }
    }
    return $user;
}
function is_connect(){
    if (!isset($_SESSION['statut'])) {
        header("location:index.php");
    }
}
function deconection(){
    unset($_SESSION['user']);
    
    session_destroy();
}

function registerUser($prenom,$nom,$login,$profil,$password,$score = 0,$statut=1){
    global $bdd;
    $test = "";
    $query = $bdd->prepare('INSERT INTO utilisateurs(id,prenom,nom,login,profil,password,score,statut) VALUES (null,?,?,?,?,?,?,?)');
    $result = $query -> execute(array($prenom,$nom,$login,$profil,$password,$score,$statut));
    if ($result==1) {
        if ($profil == 'admin') {
            $test = "admin";
        }
        else{
            $test=  "joueur";
        }
    }
    return $test;

}

function createQuestion($libelle, $nombrePoint,$questionType,$reponsePossible, $tabReponse){
    global $conn;
    $query = $conn->query ('INSERT INTO question (question_id,Libelle, score,Type,reponsePossible, bonneReponse) VALUES (?,?,?,?,?,?)');
    $result = $query->execute(array(null,$libelle,$nombrePoint,$questionType,$reponsePossible,$tabReponse));
    if ($result) {
        echo "enregistre";
    }
}

// tester si le login existe deja
function ifLoginIsIn($login)
{
    global $bdd;
    $test = false;
    $query = $bdd->query('SELECT * FROM utilisateurs');
    while($result = $query->fetch())
    {
        if ($login == $result['login']) 
        {
           $test = true;
        }
    }
    return $test;
}
function image($image){
    $format_autorises = [
        'image/png',
        'image/jpg',
        'image/jpeg'
    ];
    if (in_array($image['type'], $format_autorises)) {
        $array = explode('.', $image['name']);
        $filename = date('YmdHis') . "." . $array[sizeof($array) - 1];
        move_uploaded_file($image['tmp_name'], './public/images/' . $filename);
    }
    return $filename;

}

function notMatch($pwd1,$pwd2){
    if ($pwd1 != $pwd2) {
        return true;
    }
}
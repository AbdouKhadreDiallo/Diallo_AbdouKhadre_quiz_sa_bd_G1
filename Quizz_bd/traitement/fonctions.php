<?php
    
    include_once('./data/server.php');
    $conn = getConnexion();
    function connection($login,$password){
        global $conn;
        $query  = $conn->prepare('SELECT * FROM utilisateurs WHERE login =? AND password=?');
        $query->execute(array($login,$password));
        $result = $query->fetch();
        if ($result) {
            $_SESSION['statut'] = "login";
            $_SESSION['prenom'] = $result['prenom'];
            $_SESSION['nom'] = $result['nom'];
            $_SESSION['score'] = $result['score'];
            $_SESSION['avatar'] = $result['avatar'];
            if ($result['profil'] == "admin") {
                return "accueil";
            }
            else{
                return "jeux";
            }
        }
        
        return "error";
    }
    function testLoginUnique($login)
    {
        global $conn;
        $test = false;
        $query = $conn->query('SELECT * FROM utilisateurs');
        while($result = $query->fetch())
        {
            if ($login == $result['login']) 
            {
               $test = true;
            }
        }
        return $test;
    }
    function deconection(){
        unset($_SESSION['prenom']);
        unset($_SESSION['nom']);
        unset($_SESSION['avatar']);
        unset($_SESSION['statut']);
        session_destroy();
    }

    function is_connect(){
    if (!isset($_SESSION['statut'])) {
        header("location:index.php");
    }
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
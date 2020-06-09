<?php
function is_connect(){
    if (!isset($_SESSION['statut'])) {
        header("location:index.php");
    }
}
function deconection(){
    unset($_SESSION['prenom']);
    unset($_SESSION['nom']);
    unset($_SESSION['avatar']);
    unset($_SESSION['statut']);
    session_destroy();
}
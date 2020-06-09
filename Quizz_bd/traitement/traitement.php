
<?php
include('../data/connectionBdd.php');
// inscription admin/joueur


$prenom = "";
$nom = "";
$login = "";
$filename="";

if (isset($_POST['register'])) {
	$prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $login = $_POST['login'];
        if (isset($_SESSION['user'])) {
            $profil = "admin";
            $score = null;
        }
        else{
            $profil = "joueur";
            $score = 0;
        }
        $password = $_POST['password'];
        $password_confirm = $_POST['password_confirm'];
		// $filename = image($_FILES['photo']);
		
		if (empty($prenom) || empty($nom) || empty($login) || empty($password) || empty($password_confirm)) {
			echo 'vide';
		}
		else if (ifLoginIsIn($login)) {
			echo "existe";
		}
		elseif (notMatch($password,$password_confirm)) {
			echo "not match";
		}
		else{
			$saved = registerUser($prenom,$nom,$login,$profil,$password,$score);
			echo $saved;
		}
}
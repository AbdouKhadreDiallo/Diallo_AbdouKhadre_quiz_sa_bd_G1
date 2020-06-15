<?php
  define("WEBROOT","http://localhost/Quizz_bd");
//   include './data/connectionBdd.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="./public/css/quizz.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <script src="./public/js/script.js"></script>
	<script src="./public/js/simple-bootstrap-paginator.js"></script>
	<script src="./public/js/router.js"></script>
    <!-- <script src="./public/js/pagination.js"></script> -->
    <!-- <script src="./public/js/router.js"></script> -->

    <title>Quizz App</title>
  </head>
  <body>
    <div class="content" id="pages">
		<?php
			if (isset($_GET['action'])) {
				$page = $_GET['action'];

				if ($page == "admin") {
					// if (is_connect()) {
						if (isset($_GET['page'])) {
							$p = $_GET['page'];
							if ($p == "showQuestion") {
								require_once('./pages/listeQuestion.php');
							}
							elseif ($p == 'addAdmin') {
								require_once('./pages/inscription.php');
							}
							elseif ($p == 'showPlayers') {
								require_once('./pages/listeJoueur.php');
							}
							elseif ($p == 'addQuestion') {
								require_once('./pages/creationQuestion.php');
							}
							elseif ($p == 'dashboard') {
								require_once('./pages/dashboard.php');
							}
						}
						else{
							require_once('./pages/accueil.php');
						}
					// }
					// else{
					// 	require_once('./pages/connexion.php');
					// }
				}
				elseif ($page == "joueur") {
					// if (!is_connect()) {
						require_once('./pages/jeux.php');
					// }
					// else{
					// 	require_once('./pages/connexion.php');
					// }
					
				}
			}
			else {
				require_once('./pages/connexion.php');
			}
		?>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
  </body>
</html>

<script src="./public/js/inscription.js"></script>
<!-- <script src="./public/js/deconnexion.js"></script> -->
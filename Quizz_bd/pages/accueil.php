<?php
   include('../data/connectionBdd.php');
    is_connect();
        $src = './public/images/'.$_SESSION['user']['avatar'];
?>

<div class="accueil-left float-left">
    <div class="accueil-logo">
        <div class="logo" id="accueil-logo"></div>
        <div class="app-title" id="accueil-app-title">ODC QUIZZ APP</div>
    </div>
    <div class="accueil-avatar">
        <div class="accueil-avatar-circle" style="background-image: url(<?php echo $src;  ?> ); background-size: cover"></div>
        <div class="accueil-user-informations">
            <?php if (isset($_SESSION['user'])) {
                echo $_SESSION['user']['prenom'];
            } ?> <br><?php if (isset($_SESSION['user'])) {
                echo $_SESSION['user']['nom'];
            } ?>
        </div>
    </div>

    <div class="accueil-icone"></div>
        <a id="listeQuestion">
            <div class="liens">
                <div class="items">
                    <div class="icone-navigation"> <img src="./public/icones/ic-liste.png" alt="" srcset=""> </div>
                    <div class="accueil-navigation-text"> <p>Liste Question</p> </div>
                </div>
            </div>
        </a>
        <a id="ajoutAdmin">
            <div class="liens">
                <div class="items">
                    <div class="icone-navigation"> <img src="./public/icones/ic-ajout.png" alt="" srcset=""> </div>
                    <div class="accueil-navigation-text"> <p>Ajouter Admin</p> </div>
                </div>
            </div>
        </a>
        <a id="listeJoueur">
            <div class="liens">
                <div class="items">
                    <div class="icone-navigation"> <img src="./public/icones/ic-liste.png" alt="" srcset=""> </div>
                    <div class="accueil-navigation-text"> <p>Liste Joueur</p> </div>
                </div>
            </div>
        </a>
        <a id="ajoutQuestion">
            <div class="liens">
                <div class="items">
                    <div class="icone-navigation"> <img src="./public/icones/ic-ajout.png" alt="" srcset=""> </div>
                    <div class="accueil-navigation-text"> <p>Ajouter Question</p> </div>
                </div>
            </div>
        </a>
        <a id="dashboard">
            <div class="liens">
                <div class="items">
                    <div class="icone-navigation"> <img src="./public/icones/ic-liste.PNG" alt="" srcset=""> </div>
                    <div class="accueil-navigation-text"> <p>Dashboard</p> </div>
                </div>
            </div>
        </a>
    </div>
    <div class="accueil-right">
        <div class="accueil-right-header">
            <p>CRÉER ET PARAMÉRTER VOS QUIZZ</p>
            <div class="button-deconnection">
                <a class="btn btn-info btn-lg" id="decon">
                <span class="glyphicon glyphicon-log-out">Log out</span> 
            </a>
            </div>
        </div>
        <div class="toto"></div>
        <?php

        // if (isset($_GET['block'])) {
        //    if ($_GET['block']=="creationadmin") {
        //         include("./pages/inscription.php");
        //    }
        //    if ($_GET['block']=="listequestion") {
        //         include("./pages/listeQuestion.php");
        //    }
        //    if ($_GET['block']=="listejoueur") {
        //         include("./pages/listeJoueur.php");
        //     }
        //     if ($_GET['block']=="question") {
        //         include("./pages/creationQuestion.php");
        //     }
        //     if ($_GET['block']=="dashboard") {
        //         include("./pages/dashboard.php");
        //     }
        // }
        // else {
        //     include("./pages/inscription.php");
        // }
        
            
    ?>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.toto').load("http://localhost/sonatel%20Academy/Quizz_bd/pages/listeQuestion.php");
    })
    $('#listeQuestion').click(function()  {
        $('.toto').load("http://localhost/sonatel%20Academy/Quizz_bd/pages/listeQuestion.php");
    });
    $('#ajoutAdmin').click(function()  {
        $('.toto').load("http://localhost/sonatel%20Academy/Quizz_bd/pages/inscription.php");
    });
    $('#listeJoueur').click(function()  {
        $('.toto').load("http://localhost/sonatel%20Academy/Quizz_bd/pages/listejoueur.php");
    });
    $('#ajoutQuestion').click(function()  {
        $('.toto').load("http://localhost/sonatel%20Academy/Quizz_bd/pages/creationQuestion.php");
    });
    $('#dashboard').click(function()  {
        $('.toto').load("http://localhost/sonatel%20Academy/Quizz_bd/pages/dashboard.php");
    });
    $('#decon').click(function() {
        $('#pages').load("http://localhost/sonatel%20Academy/Quizz_bd/pages/logout.php");
    });
   
</script>


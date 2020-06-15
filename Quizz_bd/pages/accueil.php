<?php
   include('./data/connectionBdd.php');
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
        <a class="navigation-link active" lien ="index.php?action=admin&page=showQuestion">
            <div class="liens">
                <div class="items">
                    <div class="icone-navigation"> <img src="./public/icones/ic-liste.png" alt="" srcset=""> </div>
                    <div class="accueil-navigation-text"> <p>Liste Question</p> </div>
                </div>
            </div>
        </a>
        <a class="navigation-link" lien ="index.php?action=admin&page=addAdmin">
            <div class="liens">
                <div class="items">
                    <div class="icone-navigation"> <img src="./public/icones/ic-ajout.png" alt="" srcset=""> </div>
                    <div class="accueil-navigation-text"> <p>Ajouter Admin</p> </div>
                </div>
            </div>
        </a>
        <a class="navigation-link" lien ="index.php?action=admin&page=showPlayers">
            <div class="liens">
                <div class="items">
                    <div class="icone-navigation"> <img src="./public/icones/ic-liste.png" alt="" srcset=""> </div>
                    <div class="accueil-navigation-text"> <p>Liste Joueur</p> </div>
                </div>
            </div>
        </a>
        <a class="navigation-link" lien ="index.php?action=admin&page=addQuestion">
            <div class="liens">
                <div class="items">
                    <div class="icone-navigation"> <img src="./public/icones/ic-ajout.png" alt="" srcset=""> </div>
                    <div class="accueil-navigation-text"> <p>Ajouter Question</p> </div>
                </div>
            </div>
        </a>
        <a class="navigation-link" lien ="index.php?action=admin&page=dashboard">
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
        <div class="toto"> <?php include 'listeQuestion.php';  ?> </div>
        
    </div>
</div>
<script>
    $(".navigation-link").on("click", function(){
        //alert('ok');
        $lien_encour = $(this);
        const url = $lien_encour.attr('lien');
        const $container = $(".toto");
        $container.html("");
        $container.load(`${url}`);
    })
   
</script>


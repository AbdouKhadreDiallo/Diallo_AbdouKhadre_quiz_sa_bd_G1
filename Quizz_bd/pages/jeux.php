<?php
// is_connect();
session_start();


?>
<style>
    table {
    border-radius: 1em;
    width: 100%;
    font-size: 1em
}

.question-show {
    display: inline-block;
}

th,
td {
    color: grey;
    padding: .25em 1em;
    text-align: left
}
#defaultOpen {
    float: left;
    width: 50%;
    color: white;
}
.tab>button{
    width: 50%;
    border-radius: 0;
    
}

</style>
<div class="joueur-left float-left">
    <div class="joueur-informations">
        <div class="quizz-app-header">
            <div class="logo" id="accueil-logo"></div>
            <div class="app-title" id="accueil-app-title">ODC QUIZZ APP</div>
        </div>
        <div class="joueur-avatar">
            <div class="joueur-avatar-circle" style="background-image: url(<?php echo $src;  ?> ); background-size: cover"></div>
            <div class="accueil-user-informations">
                <?php if (isset($_SESSION['user'])) {
                    echo $_SESSION['user']['prenom'];
                } ?> <br><?php if (isset($_SESSION['user'])) {
                                echo $_SESSION['user']['nom'];
                            } ?>
            </div>

        </div>
    </div>
    <div>
        <div class="tab">
            <button class="tablinks" onclick="showInfos(event,'top-score')" id="defaultOpen"> <?php echo "Top Score"; ?> </button>
            <button class="tablinks" onclick="showInfos(event, 'meilleurScore')"> Mon meilleur Score</button>
        </div>
        <div id="top-score" class="tabcontent">
            <table>
                <thead>
                    <th>Prenom</th>
                    <th>Nom</th>
                    <th>Score</th>
                </thead>
                <tbody id="tBodyUsers">
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                </tbody>
            </table>
        </div>
        <div id="meilleurScore" class="tabcontent">
            <table>
                <thead>
                    <th>Prenom</th>
                    <th>Nom</th>
                    <th>Score</th>
                </thead>
                <tbody>
                    <td> <?php echo $_SESSION['user']['prenom'] ?> </td>
                    <td> <?php echo $_SESSION['user']['nom'] ?> </td>
                    <td> <?php echo $_SESSION['user']['score'] ?> </td>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="joueur-right float-right">
    <div class="joueur-header-right">
        <div class="joueur-header-right-text">
            BIENVENUE SUR LA PLATEFORME DE JEU DE QUIZZ <br>
            JOUER ET TESTER VOTRE NIVEAU DE CULTURE GÉNÉRALE
            <a href="index.php?statut=logout" class="btn btn-info btn-lg" id="decon">
                <span class="glyphicon glyphicon-log-out"></span> Log out
            </a>
        </div>

    </div>


</div>

<script src="./public/js/jeux.js"></script>
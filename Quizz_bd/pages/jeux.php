<?php
   include('./data/connectionBdd.php');
   include './data/server.php';
    is_connect();
    if (isset($_SESSION['user'])) {
        $src = './public/images/'.$_SESSION['user']['avatar'];
    }
    $id = $_SESSION['user']['id'];
    $bdd = getConnexion();
    $nombre = $bdd->query("SELECT nombreParJeu FROM nombre where id_nombre =1")->fetch();
    $nombre = (int)$nombre[0];
    $questionParPage = 1;
    $nombrePages = ceil($nombre / $questionParPage);
    // var_dump($nombrePages);

    if (isset($_POST['btn'])) {
        
        if (isset($_POST['position'])) {
            
            $position = intval($_POST['position']);
            $_SESSION['question'][$position]['answer'] = answerPlayer($position);
            $_SESSION['tab'][] = $_SESSION['question'][$position]['answer'];
            $position++;
            if ($position == $nombre) {
                $position = $nombre- 1;
            //     if ($_SESSION['user']['score'] < score($_SESSION['question'])) {
            //         $score = score($_SESSION['question']);
            //     }
            //     else {
            //         $score = $_SESSION['user']['score'];
            //     }
            }
            // $sql = "UPDATE utilisateurs SET score = '$score' WHERE id = $id";
            // $bdd -> query($sql);
        }
    } else {
        $position = 0;
    }
    function answerPlayer($position)
{
    $answerPlayer = array();
    if (!empty($_POST['result'])) {
        $answerPlayer = $_POST['result'];
    }
    return $answerPlayer;
}
$debut = ($position - 1) * $questionParPage;
if (isset($_POST['btn-precedent'])) {
    $position = intval($_POST['position']);
    if ($position) {
        $position--;
        if ($position < 0) {
            $position = 0;
            $prev = 'none';
        }
    }
}
if (isset($_POST['end'])) {
    $position = intval($_POST['position']);
    var_dump($_SESSION['user']['score']);
    $_SESSION['question'][$position]['answer'] = answerPlayer($position);
    if ($_SESSION['user']['score'] < score($_SESSION['question'])) {
        $score = score($_SESSION['question']);
    }
    else {
        $score = $_SESSION['user']['score'];
    }
    $sql = "UPDATE utilisateurs SET score = '$score' WHERE id = $id";
    $bdd -> query($sql);
    var_dump($_SESSION['user']['score']);
}

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
.questiondisplay{
    position: relative;
    left: 5%;
    top: 2%;
    width:  90%;
    border: 1px solid #949696;
    border-radius: 10px/20px;
    height: 400px;
}
.joueur-header-right {
    height: 200px;
    width: 100%;
    background: #EAE9E9;
}
#topPlayers-container{
    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
    height: 420px;
}
.libelleContainer{
    background: #EAE9E9;
    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
    height: 120px;
    width: 90%;
    position: relative;
    left: 5%;
    top: 2%;
}
#lib-style{
    text-align: center;
    position: relative;
    top: 20%;
}
li{
        list-style: none;
        margin-left: 10px
    }
    .prev {
        display: <?= $prev ?>;
        align-self: flex-start;
        color: white;
        background-color: #3addd6;
        margin-top: 30px;
        border-radius: 5px;
        border: none;
        width: 120px;
        height: 35px;
        /* margin-left: 5px; */
        margin-bottom: 5px
    }
    .next {
        display: <?= $next ?>;
        float: right;

        margin-right: 60px;
        color: white;
        background-color: #3addd6;
        margin-top: 30px;
        border-radius: 5px;
        border: none;
        width: 120px;
        height: 35px;
        margin-bottom: 5px
            /* position: relative;
        top: 10px;
        left: 60%; */

    }

    .end {
        display: <?= $end ?>;
        margin-right: 10px;
        float: right;
        color: white;
        background-color: red;
        margin-top: 30px;
        border-radius: 5px;
        border: none;
        width: 90px;
        height: 30px;
        margin-bottom: 5px;
        position: absolute;
        left: 86%;
        top: 53%;
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
    <div id="topPlayers-container">
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

    <div class="questiondisplay">
        <div class="libelleContainer">
            <div id="lib-style">
                <strong>Question<?php echo $position+1 ?>/<?php echo $nombre ?></strong>
                <p><?php echo $_SESSION['question'][$position]['Libelle']; ?></p>
                <p><?php echo $_SESSION['question'][$position]['score'].' pts'; ?></p>
            </div>
            <div class="response-display">
                <form method="post">
                    <input type="hidden" name="" value="<?php echo $nombre?>" id="limit">
                    <input type="hidden" value="<?php echo $_SESSION['question'][$position]['Type'] ?>" id="type">
                    <input type="hidden" name="position" value="<?php echo $position; ?>" id="position">
                    
                    <div class="affiche-response">
                        <?php
                            $tab = explode(',', $_SESSION['question'][$position]['reponsePossible']);
                            for ($i=$debut; $i < ($debut + $questionParPage); $i++) { 
                                // reponse multiple
                                if ($_SESSION['question'][$position]['Type'] == 'multiple') {
                                    for ($j=0; $j < count(explode(',', $_SESSION['question'][$position]['reponsePossible'])); $j++) { 
                                        if (!empty($_SESSION['question'][$position]['answer']) && in_array('result' . $j, $_SESSION['question'][$position]['answer'])) { ?>
                                        
                                            <li>
                                                <input type="checkbox" checked name="result[]" value="result<?= $j ?>">
                                                <?php echo $tab[$j] ?>
                                            </li><?php
                                        } else { ?>
    
                                            <li>
                                                <input type="checkbox" name="result[]" value="result<?= $j ?>">
                                                <?php echo $tab[$j]; ?>
                                            </li><?php
                                        }
                                        
                                    }
                                }
                                // question simple
                                elseif ($_SESSION['question'][$position]['Type'] == "simple") {
                                    for ($j=0; $j < count(explode(',', $_SESSION['question'][$position]['reponsePossible'])); $j++){
                                        if (!empty($_SESSION['question'][$position]['answer']) && in_array($j, $_SESSION['question'][$position]['answer'])) { ?>
                                            
                                            <li>
                                                <input type="radio" checked name="result[]" value="<?php echo $j ?>">
                                                <?php echo $tab[$j]; ?>
                                            </li><?php
                                            
                                                } else { ?>
    
                                            <li>
                                                <input type="radio" name="result[]" value="<?php echo $j ?>">
                                                <?php echo $tab[$j]; ?>
                                            </li><?php

                                        }
                                    }
                                }
                                else {
                                    for ($j=0; $j < count(explode(',', $_SESSION['question'][$position]['reponsePossible'])); $j++) {
                                        if (!empty($_SESSION['question'][$position]['answer'])) {
                                            strtolower($_SESSION['question'][$position]['answer']);
                                            ?>
                                    <li>
                                        <input type="text" class="form-rep" name="result" value="<?php echo strtolower($_SESSION['question'][$position]['answer']); ?>">
                                    </li><?php
                                        } else {
                                            ?>
                                    <li>
                                        <input type="text" name="result" error="error">
                                        <span id="error"></span>
                                    </li><?php
                                    
                                        }
                                    }
                                }
                            }
                        ?>
                    </div>
                    <input type="submit" name="btn-precedent" class="prev" id="prev" value="precedent" >
                    <input type="submit" class="next" name="btn" class="btn-suiv-joueur" value="next" id="next">
                    <input type="submit" class="next" name="btn" class="btn-suiv-joueur" value="Terminer" id="end">
                    <!-- <input type="submit" value="Quitter" name="end" class="end"> -->
                </form>
            </div>
        </div>
    </div>
</div>
<script src="./public/js/jeux.js"></script>
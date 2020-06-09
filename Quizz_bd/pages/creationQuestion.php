<?php
$libelleError = '';
$libelle = '';
$nomdePointError = '';
$questionType = '';
$reponsePossible = '';
if (isset($_POST['btn_submit'])) {

    $tabError = [];

    // traque des erreurs
    if (empty($_POST['libelle'])) {
        $libelleError = "ce champs est obligatiore";
        $tabError[] = $libelleError;
    } else {
        $libelle = $_POST['libelle'];
    }
    if (empty($_POST['nombrePoint']) || $_POST['nombrePoint'] < 1) {
        $nomdePointError = 'ce champs est obligatiore et doit etre superieur à 1';
        $tabError[] = $nomdePointError;
    } else {
        $nombrePoint = $_POST['nombrePoint'];
    }
    if (empty($_POST['QuestionType'])) {
        $questionTypeError = 'ce champs est obligatoire';
        $tabError[] = $questionTypeError;
    } else {
        $questionType = $_POST['QuestionType'];
    }
    if (empty($_POST['ReponseMultiple'])) {
        $reponsePossibleError = 'ce champs est obligatoire';
        $tabError[] = $reponsePossibleError;
    } else {
        $reponsePossible = $_POST['ReponseMultiple'];
    }
    

    // si ya d'erreurs on ajoute le tout dans le fichier json
    if (empty($tabError)) {
        $n = count($reponsePossible);
        if ($questionType == "multiple") {
            
            for ($i = 1; $i <= $n; $i++) {
                if (!empty($_POST['multipleChoice' . $i])) {
                    $tabReponse[] = $reponsePossible[$i - 1];
                }
            }
            $reponsePossible = implode(',', $reponsePossible);
            $tabReponse = implode(',', $tabReponse);
        } elseif ($questionType == "text") {
            $tabReponse = strtolower($reponsePossible[0]);
        } elseif ($questionType == "simple") {
            
            for ($i = 1; $i <= $n; $i++) {
                if ($_POST['reponse'] == $i) {
                    $tabReponse = $reponsePossible[$i - 1];
                }
            }
            $reponsePossible = implode(',', $reponsePossible);
        }   
        include_once('./data/insertion.php');
        createQuestion($libelle,$nombrePoint,$questionType,$reponsePossible,$tabReponse);
    }
}
?>

<link rel="stylesheet" href="./public/css/addquestion.css">

<div class="right">
    <div class="list-joueur-header-text">
        <p>Paramétrer vos questions</p>
        <hr>
    </div>
    <div class="creationQuestion-body">
        <form method="post" id="form-connexion">
            <div class="input-form-question">
                <label for="">Question</label>
                <input type="text" name="libelle" id="like-textarea" class="form-control-question" error='error-12' value="">
                <div class="error-form" id="error-12">  </div>
            </div>
            <div class="input-form-question" id="input-form-second-question">
                <label for="">Nbre de points</label>
                <input type="number" name="nombrePoint" id="number-specificies" class="form-control-question" error='error-13'>
                <div class="error-form" id="error-13"></div>
            </div>
            <div class="input-form-question selection-input" id="input-form-second-question">
                <div id="selection-input">
                    <label for="">Type de Question</label>
                    <select name="QuestionType" id="selection-dropdown" class="form-control-question">
                        <option value="">Donnez le type de réponse</option>
                        <option value="text">Text</option>
                        <option value="simple">Choix Simple</option>
                        <option value="multiple">Choix multiple</option>
                    </select>
                </div>
                <div class="error-form" id="error-1"></div>
            </div>
            <a href="javascript:void(0);" id="add-question" title="Add field">
                    <div id="fg"></div>
                </a>
            <div id="type-reponse">

            </div>
            <div class="input-form-admin input-form-user">
                <button type="submit" name="btn_submit" class="btn-form-admin btn-form-user" id="btcheck">Enregistrer</button>

            </div>
        </form>
    </div>
</div>
<script src="./public/js/generation.js"></script>
<style>
    
</style>
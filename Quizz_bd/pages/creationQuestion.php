<?php
    // include('./tratement/Question.php');
?>

<link rel="stylesheet" href="./public/css/addquestion.css">

<div class="right">
    <div class="list-joueur-header-text">
        <p>Paramétrer vos questions</p>
        <hr>
    </div>
    <div class="creationQuestion-body">
        <form method="post" id="form-connexion" action="Javascript:void(0);">
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
                    <select name="QuestionType" id="selection-dropdown" class="form-control-question typeKestion">
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
<script src="./public/js/question.js"></script>
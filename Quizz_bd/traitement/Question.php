<?php
include('../data/connectionBdd.php');
// inscription admin/joueur
    global $bdd;


    // traque des erreur
        $nombrePoint = $_POST['nombrePoint'];
        $libelle = $_POST['libelle'];
        $questionType = $_POST['QuestionType'];
        $reponsePossible = $_POST['ReponseMultiple'];
    
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
            $reponsePossible = implode(',', $reponsePossible);
        } elseif ($questionType == "simple") {
            
            for ($i = 1; $i <= $n; $i++) {
                if ($_POST['reponse'] == $i) {
                    $tabReponse = $reponsePossible[$i - 1];
                }
            }
            $reponsePossible = implode(',', $reponsePossible);
        }
        if (empty($libelle)) {
            echo 'remplir la question';
        }
        elseif (empty($nombrePoint)) {
            echo 'point';
        }
        elseif (empty($questionType)) {
            echo 'donner le type';
        }
        elseif (empty($tabReponse)) {
            echo "donner une reponse";
        }
        else {
            $dataQuestion = [
                "question" => $libelle,
                "score" => $nombrePoint,
                "type" => $questionType,
                "all" => $reponsePossible,
                "good" => $tabReponse
            ];
            $sql = 'INSERT INTO question (question_id,Libelle, score,Type,reponsePossible, bonneReponse) VALUES (?,?,?,?,?,?)';
            $result = $bdd -> prepare($sql);
            $result->execute(array(null,$libelle,$nombrePoint,$questionType,$reponsePossible,$tabReponse));
            echo 'ajouter';
        }
        // echo $saved;

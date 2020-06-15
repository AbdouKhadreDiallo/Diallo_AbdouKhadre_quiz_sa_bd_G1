<style>
        *{
            margin: 0;

        }
        .question-content input {
            margin-left: 25px;
        }
        .question-show {
            display: inline-block;
        }
        .text {
            height: 20px;
            text-align: center;
            font-size: 10px;
            font-weight: bold;
            width: auto;
        }
        .prev{
            display: <?= $prev ?>;
            align-self: flex-start;
        }
        .next{
            display: <?= $next ?>;
            float: right;
            margin-right: 10px;
            /* position: relative;
            top: 10px;
            left: 60%; */

        }
        .next>button,.prev>button{
            color: white;
            background-color: #3addd6;
            border: none;
            width: 120px;
            height: 35px;
        }
        .question-content>h3{
            color: #818181;
        }
        /* .paginate-zone{
            position: relative;
            top: 105px;
        } */
        span{
            color: red;
            font-size: 20px;
        }
        .all{
          width: 100%;
          margin-top: 20px;
          margin-left: 20px;
        }
        #questionListe{
          width: 70%;
          float: left;
        }
        #delete{
          float: right;
          position: relative;
          top: 50%;
        }
        .text{
          height: 40px;
          width: 70%;
        }
    </style>
<?php
if (isset($_POST["limit"], $_POST["start"])) {
    
include('server.php');
$conn = getConnexion();
$query = $conn-> query("SELECT * FROM question ORDER BY question_id ASC LIMIT ".$_POST["start"].", ".$_POST["limit"]."");

 while($row = $query->fetch())
 {
   ?>
   <div class="all" id=" <?php echo $row['question_id'] ?> ">
    <div id="questionListe">
      <h3> o) <?php echo $row['Libelle']; ?> </h3>
      <?php
      foreach (explode(',', $row['reponsePossible']) as $key => $value){
        if ($row['Type'] == 'text') {
          echo '<input type="text" class="form-control text" value="',$row['bonneReponse'],'" disabled>';

        }
        elseif ($row['Type'] == 'multiple') {
          if (in_array($value, explode(',', $row['bonneReponse']))) {
            echo '<input type="checkbox" checked disabled> <h4 class="question-show">',$value,'</h4><br/>';
          }
          else {
            echo '<input type="checkbox" disabled> <h4 class="question-show">',$value,'</h4><br/>';
          }

        }
        elseif ($row['Type'] == 'simple') {
          if ($value == $row['bonneReponse']) {
            echo '<input type="radio" checked disabled> <h4 class="question-show">',$value,'</h4><br/>';
          }
          else {
            echo '<input type="radio"  disabled> <h4 class="question-show">',$value,'</h4><br/>';
          }

        }
      }
      ?>
      </div>
     
        <?php echo '<button id =',$row['question_id'],' class = "delete"> Delete </button>';   ?>
     
    </div>
    <?php
  //  echo "<hr>";
 }
}


?>

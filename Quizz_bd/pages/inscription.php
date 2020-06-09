
<?php
session_start();
var_dump($_SESSION['user']);
if (isset($_SESSION['user'])) {
    
    ?>
    <link rel="stylesheet" href="./public/css/admin.css">
    <?php
}
else{
    ?>
    <link rel="stylesheet" href="./public/css/quizz.css">
    <?php
}
?>

<div class="connexion-container admin-connexion-container">
<div class="add-admin">
            <p>Ajouter un admin</p>
            <hr>
        </div>
    <div class="col-5 connexion-left admin-connexion-left">
        <div class="connexion-header">
            <div class="logo"></div>
            <div class="app-title">ODC QUIZZ APP</div>
        </div>
        <div class="connexion-description mt-5">  
            Welcome to the QUIZZ game platform Play
            and test your level of general knowledge
        </div>
    </div>
    <div class="col-7 connexion-right admin-connexion-right">
        <div class="header-redirection admin-header-redirection">
            déjà membre ? <a href="index.php"> connectez-vous</a>
        </div>
        
        <div class="inscription-form admin-inscription-form">
            <form action="Javascript:void(0);" method="post" class="ml-5" id="form-connexion" enctype="multipart/form-data">
                
                <legend>Sign up to QUIZZ APP</legend>
                <div class="form-group">
                    <label for="">Prenom</label>
                    <input type="text" class="form-control col-7" error="error-8" id="prenom" name="prenom"  placeholder="Prenom">
                    <div class="error-form" id="error-8"></div>
                </div>
                <div class="form-group">
                    <label for="">Nom</label>
                    <input type="text" class="form-control col-7"  error="error-9" id="nom" name="nom" placeholder="Nom">
                    <div class="error-form" id="error-9"></div>
                </div>
                <div class="form-group">
                    <label for="">Login</label>
                    <input type="text" class="form-control col-7"  error="error-3" id="login" name="login" placeholder="Login">
                    <div class="error-form" id="error-3"></div>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control col-7" error="error-4" id="password" name="password"  placeholder="Password">
                    <div class="error-form" id="error-4"></div>
                </div>
                <div class="form-group">
                    <label for="">Confirm Password</label>
                    <input type="password" class="form-control col-7"  error="error-5" id="password_confirm" name="password_confirm" placeholder="Confirm Password">
                    <div class="error-form" id="error-5"></div>
                </div>
                <div class="form-group">
                    <label for="">avatar</label>
                    <label for="file-upload" class="custom-file-upload">
                        Choisir un fichier
                    </label>
                    <input name="photo" id="file-upload" error="error-25" type="file"/>
                    <div class="error-form" id="error-25"></div>
                </div>
                <div class="form-group">
                    <input type="submit" name="register" id="register" value="Submit">
                </div>
               
            </form>
        </div>
    </div>
</div>
<script src="./public/js/inputValidation.js"></script>
<script src="./public/js/inscription.js"></script>

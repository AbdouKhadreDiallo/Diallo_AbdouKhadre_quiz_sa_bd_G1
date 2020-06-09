
<div class="connexion-container">
    <div class="col-5 connexion-left">
        <div class="connexion-header">
            <div class="logo"></div>
            <div class="app-title">ODC QUIZZ APP</div>
        </div>
        <div class="connexion-description mt-5">  
            Welcome to the QUIZZ game platform Play
            and test your level of general knowledge
        </div>
    </div>
    <div class="col-7 connexion-right">
        <div class="header-redirection">
        vous n'avez pas de compte ? <a id="lien-inscrption"> inscrivez-vous</a>
        </div>
        <div class="connexion-form">
            <form method="POST" role="form" class="ml-5" id="form-connexion" action="Javascript:void(0);">
                
                <legend>Sign in to QUIZZ APP</legend>
                <div class="form-group">
                    <label for="">Login</label>
                    <input type="text" class="form-control col-7" id="login" error="error-1" placeholder="Login" name="login">
                    <div class="error-form" id="error-1"></div>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" error="error-3" class="form-control col-7" id="password" placeholder="Password" name="password">
                    <div class="error-form" id="error-3"> <?php if (!empty($error)) {
                        echo $error;
                    } ?> </div>
                </div>
                <button type="submit" id="btn-connexion" name="connecter" class="btn btn-primary">Submit</button>
            </form>
            
        </div>
    </div>
</div>
<script>
    $('#lien-inscrption').click(function()  {
        $('#pages').load("pages/inscription.php");
    });
</script>



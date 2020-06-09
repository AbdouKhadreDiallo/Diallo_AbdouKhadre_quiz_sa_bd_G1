$(document).ready(function() {
    //alert('ok');
    $(document).on('click', '#btn-connexion', function(e) {

        var login = $('#login').val();
        var password = $('#password').val();

        $.ajax({
            type: 'POST',
            url: 'http://localhost/sonatel%20Academy/Quizz_bd/traitement/TraitementConnexion.php',
            async: false,
            data: {
                'connecter': 1,
                'login': login,
                'password': password,
            },

            success: function(response) {

                if (response == "empty") {
                    $('#error-3').html('tout les champs sont  obligatoire');
                } else if (response == "incorrect") {
                    $('#error-3').html('login ou mot de passe incorrecte');
                    // $('#pages').load(`index.php?page=${response}`);
                } else if (response == "admin") {
                    $('#pages').load("pages/accueil.php");
                } else {
                    $('#pages').load("pages/jeux.php");
                }
            }
        })
    });
});
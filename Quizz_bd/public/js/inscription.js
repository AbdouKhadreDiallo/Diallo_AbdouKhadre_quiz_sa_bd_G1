$(document).ready(function() {
    //alert('yes');
    $(document).on('click', '#register', function(e) {
        alert('clicked');
        var nom = $('#nom').val();
        var prenom = $('#prenom').val();
        var login = $('#login').val();
        var password = $('#password').val();
        var password_confirm = $('#password_confirm').val();
        var image = $('#file-upload').val();

        $.ajax({
            type: 'POST',
            url: 'http://localhost/sonatel%20Academy/Quizz_bd/traitement/traitement.php',
            data: {
                'register': 1,
                'prenom': prenom,
                'nom': nom,
                'login': login,
                'password': password,
                'password_confirm': password_confirm,
                'image': image
            },

            success: function(response) {
                alert(response);
                if (response == "vide") {
                    $('#error-25').html('tout les champs sont  obligatoire');
                } else if (response == "existe") {
                    $('#error-25').html('login deja pris');
                    // $('#pages').load(`index.php?page=${response}`);
                } else if (response == "not match") {
                    $('#error-25').html('les deux mots de passe ne correspondent pas');
                } else if (response == "admin") {
                    $('#pages').load("pages/accueil.php");
                } else if (response == "joueur") {
                    $('#pages').load("pages/jeux.php");

                }
            }
        })
    });
});
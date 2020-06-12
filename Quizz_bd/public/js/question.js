$(document).ready(function() {
    // alert('ready');
    $(document).on('click', '#btcheck', function(e) {
        // alert("ok");
        let myform = $('#form-connexion').serializeArray();
        console.log(myform);

        $.ajax({

            type: 'POST',
            url: 'http://localhost/sonatel%20Academy/Quizz_bd/traitement/Question.php',
            data: myform,

            success: function(response) {
                alert(response);
                console.log(response);
            }
        })

    });
});
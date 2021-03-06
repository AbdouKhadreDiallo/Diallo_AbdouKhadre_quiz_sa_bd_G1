
    $(document).ready(function() {

var limit = 5;
var start = 0;
var action = 'inactive';

function load_country_data(limit, start) {
    $.ajax({
        url: "./data/scroll.php",
        method: "POST",
        data: { limit: limit, start: start },
        cache: false,
        success: function(data) {
            $('#load_data').append(data);
            if (data == '') {
                $('#load_data_message').html("<button type='button' class='btn btn-info'>No Data Found</button>");
                action = 'active';
            } else {
                //$('#load_data_message').html("<button type='button' class='btn btn-warning'>Please Wait....</button>");
                action = "inactive";
            }
        }
    });
}

if (action == 'inactive') {
    action = 'active';
    load_country_data(limit, start);
}
$(window).scroll(function() {
    if ($(window).scrollTop() + $(window).height() > $("#load_data").height() && action == 'inactive') {
        action = 'active';
        start = start + limit;
        setTimeout(function() {
            load_country_data(limit, start);
        }, 1000);
    }
});
$(document).on("click", ".delete", function() {
        var $ele = $(this).parent().parent();

        // alert(id);
        $.ajax({
            url: 'http://localhost/sonatel%20Academy/Quizz_bd/data/deleteQuestion.php',
            type: "POST",
            cache: false,
            data: {
                id: $(this).closest('div').attr('id')
            },

            success: function(dataResult) {
                alert(dataResult);
                if (dataResult == "deleted") {
                    $ele.fadeOut().remove();
                    // getData();
                    load_country_data(limit, start);
                }

            }
        });
    });
});

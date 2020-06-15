function showInfos(evt, affiche) {
    var i, tabcontent, tablinks;


    tabcontent = document.getElementsByClassName("tabcontent");
    for (let i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    tablinks = document.getElementsByClassName("tablinks");
    for (let i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace("active", "");

    }
    document.getElementById(affiche).style.display = "block";
    evt.currentTarget.className += "active";
    evt.currentTarget.style.color = "#3addd6"
}
document.getElementById("defaultOpen").click();

//     document.getElementById('checked');
// var position = document.getElementById('position').value;
// var limit = document.getElementById('limit').value;
// if (position == 0) {
//     document.getElementById('prev').disabled="true";
//     document.getElementById('prev').style.backgroundColor ='#636363';
// }

// document.getElementById('end').style.display = "none";
// // alert(position);

// if (position == limit-1) {
//     document.getElementById('end').style.display = "inline";
//     document.getElementById('next').style.display = "none";
// }
// function showScore(){
//     document.getElementById('meilleur-score').style.display = "block"
// }
// $.ajax({
//         url: "http://localhost/sonatel%20Academy/Quizz_bd/data/listemeilleur.php",
//         method: "GET",
//         dataType: 'json',
//         success: function(data) {
//           console.log(typeof(data));
//           var html_to_append = '';
//           $.each(data, function(i, item) {
//             html_to_append +=
//             '<div class="col-3 mb-3"><div class="text-uppercase"><p>' +
//             item.prenom + 
//             '<div class="col-3 mb-3"><div class="ext-uppercase"><p>' +
//             item.nom +
//             '</p></div><p class="company">' +
//             item.score +
//             '</p></div>';
//           });
//           $("#tBodyUsers").html(html_to_append);
//         },
//         error: function() {
//           console.log(data);
//         }
//       });
$.ajax({
    url: 'http://localhost/sonatel%20Academy/Quizz_bd/data/listemeilleur.php',
    dataType: 'json',
    success: function(data) {
        for (var i = 0; i < data.length; i++) {
            var row = $('<tr><td>' + data[i].prenom + '</td><td>' + data[i].nom + '</td><td>' + data[i].score + '</td></tr>');
            $('#tBodyUsers').append(row);
        }
    }
});

var position = document.getElementById('position').value;
var limit = document.getElementById('limit').value;
if (position == 0) {
    document.getElementById('prev').disabled="true";
    document.getElementById('prev').style.backgroundColor ='#636363';
}

document.getElementById('end').style.display = "none";
// alert(position);
 
if (position == limit-1) {
    document.getElementById('end').style.display = "inline";
    document.getElementById('next').style.display = "none";
}
function showScore(){
    document.getElementById('meilleur-score').style.display = "block"
}
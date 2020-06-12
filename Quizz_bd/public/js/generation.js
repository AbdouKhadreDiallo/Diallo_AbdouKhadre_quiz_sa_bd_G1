// mettre le premier select en display none
// let selectionDropdown = document.getElementById("selection-dropdown");
// let selectionOptions = selectionDropdown.getElementsByTagName("option");
// selectionOptions[0].disabled = true;

// generation des inputs

(function() {
    var selectionDropdown = document.getElementById("selection-dropdown");
    var typeQuestion = document.getElementById('selection-dropdown');
    var counter = 0;
    var counterOne = 0;
    var counterTwo = 0;
    var btn = document.getElementById('add-question');
    var question = document.getElementById('type-reponse');

    // fonction à display si le choix est multiple
    var choixMultiple = function() {
        counter++;
        var div = document.createElement("div");
        var label = document.createElement("label");
        var newtexte = document.createTextNode("Réponse " + counter);
        var input = document.createElement("input");
        var img = document.createElement('img');
        var divError = document.createElement('div');
        divError.setAttribute('class', 'error-form');
        divError.id = 'error-' + counter;
        var checkbox = document.createElement('input');
        div.id = 'todelete' + counter;
        div.setAttribute('class', 'input-form-question');
        label.appendChild(newtexte);
        input.id = 'generated-input';
        input.type = 'text';
        input.setAttribute('error', 'error-' + counter);
        checkbox.type = 'checkbox';
        checkbox.name = 'multipleChoice' + counter;
        input.name = 'ReponseMultiple[]';
        img.src = './public/icones/ic-supprimer.png';
        img.setAttribute("onclick", "document.getElementById('todelete" + counter + "').innerHTML=''");
        img.id = "sup";
        div.appendChild(label);
        div.appendChild(input);
        div.appendChild(checkbox);
        div.appendChild(img);
        div.appendChild(divError);
        question.appendChild(div);

        //validation checkbox
        $(function() {
            $("#btcheck").click(function() {
                var checked = $("input[type=checkbox]:checked").length;
                if (checked < 1) {
                    alert("veuillez entrer une reponse.");
                    return false;
                }
            });
        });
    };


    // fonction à display si le choix est simple
    // var counter = 0;
    var choixSimple = function() {
        counterTwo++;
        var div = document.createElement("div");
        var label = document.createElement("label");
        var newtexte = document.createTextNode("Réponse " + counterTwo);
        var input = document.createElement("input");
        var img = document.createElement('img');
        var radio = document.createElement('input');

        var divError = document.createElement('div');
        divError.setAttribute('class', 'error-form');
        divError.id = 'error-' + counterTwo;

        div.id = 'todelete' + counterTwo;
        label.appendChild(newtexte);
        input.id = 'generated-input';
        div.setAttribute('class', 'input-form-question');
        input.setAttribute('error', 'error-' + counterTwo);
        input.type = 'text';
        radio.type = 'radio';
        radio.name = "reponse";
        radio.value = counterTwo;
        input.name = 'ReponseMultiple[]';
        img.src = './public/icones/ic-supprimer.png';
        img.setAttribute("onclick", "document.getElementById('todelete" + counterTwo + "').innerHTML=''");
        div.appendChild(label);
        div.appendChild(input);
        div.appendChild(radio);
        div.appendChild(img);
        div.appendChild(divError);
        question.appendChild(div);

        // validatio radio
        $(document).ready(function() {
            $("#btcheck").click(function() {
                var radioValue = $("input[type='radio']:checked").val();
                if (!radioValue) {
                    alert("veuillez entrer une reponse");
                    return false;
                }
            });
        });

    };
    // fonction à display si le choix est texte


    var choixTexte = function() {
        counterOne++;
        var div = document.createElement("div");
        var label = document.createElement("label");
        var newtexte = document.createTextNode("Reponse");
        var input = document.createElement("input");
        var divError = document.createElement('div');
        divError.setAttribute('class', 'error-form');
        input.setAttribute('error', 'error-25');
        divError.id = 'error-25';
        div.setAttribute('class', 'input-form-question');
        label.appendChild(newtexte);
        input.id = 'generated-input';
        input.type = 'text';
        input.name = 'ReponseMultiple[]';
        div.appendChild(label);
        div.appendChild(input);
        div.appendChild(divError);
        question.appendChild(div);
    };


    // l'evenement sur le bouton clik
    btn.addEventListener('click', function() {
        if (selectionDropdown.value == 'multiple') {
            choixMultiple();
        } else if (selectionDropdown.value == 'simple') {
            choixSimple();
        } else if (selectionDropdown.value == 'text') {
            choixTexte();
            // document.getElementById('fg').style.display = "none";
            btn.style.display = "none";
        }

    }.bind(this));
    selectionDropdown.addEventListener('change', function() {
        document.getElementById('type-reponse').innerHTML = '';
        document.getElementById('add-question').style.display = 'inline';
    });

    return false
})();


// const inputs = document.getElementsByTagName("input");
// for (input of inputs) {
//     input.addEventListener("keyup", function(e) {
//         if (e.target.hasAttribute("error")) {
//             var idDivError = e.target.getAttribute("error");
//             document.getElementById(idDivError).innerHTML = ""
//         }
//     })
// }
// document.getElementById("form-connexion").addEventListener("submit", function(e) {
//     const inputs = document.getElementsByTagName("input");
//     var error = false;
//     for (input of inputs) {
//         if (input.hasAttribute("error")) {
//             var idDivError = input.getAttribute("error");
//             if (!input.value) {
//                 document.getElementById(idDivError).innerText = "Ce champs est obligatoire"
//                 error = true
//             }
//         }
//     }
//     if (error) {
//         e.preventDefault();
//         return false;
//     }

// })
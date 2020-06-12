    // Total number of rows visible at a time
    var rowperpage = 5;

    $(document).ready(function() {
        getData();

        $("#but_prev").click(function() {
            var rowid = Number($("#txt_rowid").val());
            var allcount = Number($("#txt_allcount").val());
            rowid -= rowperpage;
            if (rowid < 0) {
                rowid = 0;
            }
            $("#txt_rowid").val(rowid);
            getData();
        });

        $("#but_next").click(function() {
            var rowid = Number($("#txt_rowid").val());
            var allcount = Number($("#txt_allcount").val());
            rowid += rowperpage;
            if (rowid <= allcount) {
                $("#txt_rowid").val(rowid);
                getData();
            }

        });
    });
    /* requesting data */
    function getData() {
        var rowid = $("#txt_rowid").val();
        var allcount = $("#txt_allcount").val();

        $.ajax({
            url: 'http://localhost/sonatel%20Academy/Quizz_bd/data/pagination.php',
            type: 'post',
            data: { rowid: rowid, rowperpage: rowperpage },
            dataType: 'json',
            success: function(response) {
                createTablerow(response);
            }
        });

    }
    /* Create Table */
    function createTablerow(data) {

        var dataLen = data.length;

        $("#emp_table tr:not(:first)").remove();

        for (var i = 0; i < dataLen; i++) {
            if (i == 0) {
                var allcount = data[i]['allcount'];
                $("#txt_allcount").val(allcount);
            } else {
                var empid = data[i]['prenom'];
                var empname = data[i]['nom'];
                var salary = data[i]['score'];
                var login = data[i]['login'];
                var statut = data[i]['statut'];
                var id = data[i]['id'];
                var btn = "<button class='active' id='active_" + login + "'>" + statut + "</button>";

                $("#emp_table").append("<tr id=" + id + "></tr>");
                $("#" + id).append("<td class='prenom' align='center' data-id1="+id+" contenteditable>" + empid + "</td>");
                $("#" + id).append("<td align='left' class='nom' data-id2="+id+" contenteditable>" + empname + "</td>");
                $("#" + id).append("<td align='center'>" + salary + "</td>");
                $("#" + id).append("<td align='center'>" + btn + "</td>");
                $("#" + id).append("<td align='center'> <button id=" + id + " class='delete' name='delete'>Delete</button> </td>");
            }
        }
    }


    $(document).on("click", ".delete", function() {
        var $ele = $(this).parent().parent();

        // alert(id);
        $.ajax({
            url: 'http://localhost/sonatel%20Academy/Quizz_bd/data/delete.php',
            type: "POST",
            cache: false,
            data: {
                id: $(this).closest('tr').attr('id')
            },

            success: function(dataResult) {
                alert(dataResult);
                if (dataResult == "deleted") {
                    $ele.fadeOut().remove();
                    // getData();
                }

            }
        });
    });
    $(document).on("click", ".active", function() {
        // alert("ok");
        var id = this.id;
        var split_id = id.split("_");
        var login = split_id[1];
        // console.log(login);

        var activeText = $(this).text();

        // Get active state
        var active = 0;
        if (activeText == "Active") {
            active = 1;
        } else {
            active = 0;
        }

        // AJAX request
        $.ajax({
            url: 'http://localhost/sonatel%20Academy/Quizz_bd/data/block.php',
            type: 'post',
            data: { login: login, active: active, request: 1 },
            success: function(response) {
                alert(response);
                $("#" + id).html(response);
                getData();
            }
        });
    });
    // editer
    function edit_data(id,text,column_name){
        $.ajax({
            url: 'http://localhost/sonatel%20Academy/Quizz_bd/data/edit.php',
            method: "POST",
            data : {id: id, text:text, column_name: column_name},
            success: function(data){
                alert(data);
            }
        });
    }
    $(document).on('blur', '.prenom', function(){  
        var id = $(this).data("id1");  
        var prenom = $(this).text();  
        edit_data(id, prenom, "prenom"); 
        getData(); 
   });

   $(document).on('blur', '.nom', function(){  
    var id = $(this).data("id2");  
    var nom = $(this).text();  
    edit_data(id,nom, "nom");  
    getData();
});
      

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
                var statut = data[i]['statut'];
                var id = data[i]['id'];

                $("#emp_table").append("<tr id=" + id + "></tr>");
                $("#" + id).append("<td align='center'>" + empid + "</td>");
                $("#" + id).append("<td align='left'>" + empname + "</td>");
                $("#" + id).append("<td align='center'>" + salary + "</td>");
                $("#" + id).append("<td align='center'>" + statut + "</td>");
                $("#" + id).append("<td align='center'> Action </td>");
                $("#" + id).append("<td align='center'> <button id" + id + " class='delete' name='delete'>Delete</button> </td>");
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
                    getData();
                }

            }
        });
    });
<?php
include('../data/select.php');
$totalPages =sqlquery();
var_dump($totalPages);
?>
<style>
    #emp_table {
    border:3px solid lavender;
    border-radius:3px;
}
.editMode{
 border: 1px solid black;
}

/* Table header */
.tr_header{
    background-color:dodgerblue;
}
.tr_header th{
    color:white;
    padding:10px 0px;
    letter-spacing: 1px;
}

/* Table rows and columns */
#emp_table td{
    padding:10px;
}
#emp_table tr:nth-child(even){
    background-color:grey;
    color:black;
}
.button{
    border-radius:3px;
    border:0px;
    background-color:mediumpurple;
    color:white;
    padding:10px 20px;
    letter-spacing: 1px;
}

</style>
<div class="right">
    <div class="list-joueur-header-text">
        <p>Liste joueur</p>
        <hr>
    </div>
    <div class="liste-body">
        <span id="message"></span>
        <div class="row">
            <table width="100%" id="emp_table" border="0">
                <tr class="tr_header">
                    <th>Prenom</th>
                    <th>nom</th>
                    <th>Score</th>
                    <th>Action</th>
                    <th>Delete</th>
                </tr>
            </table>

            <div id="div_pagination">
                <input type="hidden" id="txt_rowid" value="0">
                <input type="hidden" id="txt_allcount" value="0">
                <input type="button" class="button" value="Previous" id="but_prev" />
                <input type="button" class="button" value="Next" id="but_next" />
            </div>
            
        </div>  
        
    </div>
</div>
<script src="./public/js/pagination.js"></script>
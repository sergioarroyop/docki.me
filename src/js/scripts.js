//$(document).ready(function() {
//$("#switch").click(function(){
//    $("#Expand").toggleClass("col-3").promise().done(function(){
//        $(".hidden").toggle();
//    });
//    $("#Expand").toggleClass("text-center");
//    $("#Linklist").toggleClass("pl-2");
//    $("#Content").toggleClass("col-11");
//  });
//});

$(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();
    $('i').tooltip();
    $('i').tooltip();
    $('i').tooltip();
    $('i').tooltip();

});


/*---------------- BY RAFITA -------------------*/
/************************************************/

$(document).ready(function () {

    // Open navbarSide when button is clicked
    $('#navbarSideButton').on('click', function () {
        $('#navbarSide').addClass('reveal');
        $('.overlay').show();
    });

    // Close navbarSide when the outside of menu is clicked
    $('.overlay').on('click', function () {
        $('#navbarSide').removeClass('reveal');
        $('.overlay').hide();
    });

});

/*-------------Funciones Form Cont------------*/

function bind() {
    var bind = document.getElementById("checkbind");
    var divbind = document.getElementById("divbind");
    if (bind.checked == true) {
        divbind.style.display = "block";
    } else {
        divbind.style.display = "none";
    }
}

function vol() {
    var vol = document.getElementById("checkvol");
    var divvol = document.getElementById("divvol");
    if (vol.checked == true) {
        divvol.style.display = "block";
    } else {
        divvol.style.display = "none";
    }
}



/*--------------Funciones label------------------*/

//$(document).ready(function () {
//
//    var cont = 0;
//
//    $('#newLabel').click(function (a) {
//        a.preventDefault();
//        var entrykv = "<div id='kvparent" + (cont) + "' class='input-group col-12 col-md-6 mb-2'><div class='input-group-prepend'><div class='input-group-text'>Key</div></div><input type='text' class='form-control' id='key" + (cont) + "' placeholder='key'><div class='input-group-prepend'><div class='input-group-text'>Value</div></div><input type='text' class='form-control' id='value" + (cont) + "' placeholder='Value'><button id='delLabel' class='btn btn-danger '><i class='fas fa-minus'></i></button></div>"
//        $('#kvEntries').append(entrykv);
//        cont++;
//    });
//
//    $("#delLabel").click(function (e) {
//        e.preventDefault();
//        $('#kvEntries').remove();
//        cont--;
//    });
//});

$(document).ready(function() {    
    var cont = 1;
    $('#newLabel').click(function(a){
            a.preventDefault();
            cont++;
            $('#kvEntries').append("<div id='kvparent" + (cont) + "' class='input-group col-12 col-md-6 mb-2'><div class='input-group-prepend'><div class='input-group-text'>Key</div></div><input type='text' class='form-control' id='key" + (cont) + "' name='key[]' placeholder='key'><div class='input-group-prepend'><div class='input-group-text'>Value</div></div><input type='text' class='form-control' id='value" + (cont) + "' name='value[]' placeholder='Value'><button id='delLabel' class='btn btn-danger '><i class='fas fa-minus'></i></button></div>");
    });
    
    $('#kvEntries').on("click","#delLabel", function(e){
        $(this).parent('div').remove();
         e.stopPropagation();
        cont--;
    })
});

/*-------------Function radio ------------------------*/

    $(function () {
        $("input[name='scheduling']").click(function () {
            if ($("#replicated").is(":checked")) {
                $("#replicated2").show();
            } else {
                $("#replicated2").hide();
            }
        });
    });


/*--------------Table Refresh Containers--------------*/

//$(document).ready(function () {
//
//    function TableRefresh() {
//        $(".table").load("containers.php .table");
//    }
//
//    $("#TableRefresh").on("click", TableRefresh);
//
//});

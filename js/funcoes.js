function stringDia(){
    var semana = document.getElementsByName("semana");
    var trampa=null;
    var first = true;
    for (var i=0; i < semana.length; i++){  
        if (semana[i].checked){
            if (first) {
                trampa = semana[i].value;
                first = false;
            } else {
                trampa = trampa + "," + semana[i].value;
            }
        }
        if (trampa == null) {
            trampa = "";
        }
    }
    document.getElementById("hide_d").value = trampa;
}



function stringMateria(){
    var materia = document.getElementsByName("materia");
    var trampa=null;
    var first = true;
    for (var i=0; i < materia.length; i++){  
        if (materia[i].checked){
            if (first) {
                trampa = materia[i].value;
                first = false;
            } else {
                trampa = trampa + "," + materia[i].value;
            }
        }
        if (trampa == null) {
            trampa = "";
        }
    }
    document.getElementById("hide_m").value = trampa;
}

jQuery(function ($) {
    $('#confirm-dialog input.confirm, #confirm-dialog a.confirm').click(function (e) {
        e.preventDefault();

        // example of calling the confirm function
        // you must use a callback function to perform the "yes" action
        confirm("Tem certeza que deseja excluir?", function () {
            window.location.href = "delete_prof.php";
        });
    });
});

function confirm(message, callback) {
    $("#confirm").modal({
        closeHTML: "<a href='#' title='Close' class='modal-close'>x</a>",
        position: ["20%",],
        overlayId: "confirm-overlay",
        containerId: "confirm-container", 
        onShow: function (dialog) {
            var modal = this;

            $(".message", dialog.data[0]).append(message);

            // if the user clicks "yes"
            $(".yes", dialog.data[0]).click(function () {
                // call the callback
                if ($.isFunction(callback)) {
                    callback.apply();
                }
                // close the dialog
                modal.close(); // or $.modal.close();
            });
        }
    });
}

jQuery(function ($) {
    $(".basic").click(function () {
        $("#basic-modal-content").modal({
            escClose: true,
            opacity: 85
        });
    });
});

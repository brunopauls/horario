//Cria a string dos dias
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

//Cria a string dos dias
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

//Ve qual foi o excluir(professor/materia/turmas/etc) chamado
jQuery(function (e) {
<<<<<<< HEAD
	$('#confirm-dialog a.materia').click(function (e) {
=======
    $('#confirm-dialog a.materia').click(function (e) {
>>>>>>> ee06ff00648d13a865813e6457327a7a055ba223
		e.preventDefault();
		confirm("Tem certeza que deseja excluir?", function () {
			window.location.href = "delete_mat.php";
		});
	});
    $('#confirm-dialog a.professor').click(function (e) {
		e.preventDefault();
		confirm("Tem certeza que deseja excluir?", function () {
			window.location.href = "delete_prof.php";
		});
	});
});

//Faz aparecer a mensagem de confirmação
function confirm(message, callback) {
    $("#confirm").modal({
    	escClose: true,
    	opacity: 35,
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

//Faz aparecer o formulario de adicionar algo
jQuery(function ($) {
    $(".basic").click(function () {
        $("#basic-modal-content").modal({
            escClose: true,
            opacity: 85
        });
    });
});

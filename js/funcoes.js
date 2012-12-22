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

function msgConfirmProf(nome, sobrenome) {
	confirm("Tem certeza que deseja excluir?", function () {
			window.location.href = "delete_line_prof.php?nome="+nome+"&"+"sobrenome="+sobrenome;
	});
}

function msgConfirmMat(nome) {
	confirm("Tem certeza que deseja excluir?", function () {
			window.location.href = "delete_line_mat.php?nome="+nome;
	});
}

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

//Faz aparecer o formulario de adicionar
function adicionar() {
	$("#basic-modal-content").modal({
        escClose: true,
        opacity: 85
    });
}

//Faz aparecer o formulario de editar professor
function editProf(nome, sobrenome) {
	$("#basic-modal-content #nome").attr('value', nome);
	$("#basic-modal-content #sobrenome").attr('value', sobrenome);
	$("#basic-modal-content").modal({
        escClose: true,
        opacity: 85
    });
}

//Faz aparecer o formulario de editar materia
function editMat(nome) {
	$("#basic-modal-content #nome").attr('value', nome);
	$("#basic-modal-content").modal({
        escClose: true,
        opacity: 85
    });
}
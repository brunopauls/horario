// Cria a string dos dias
function stringMake(tipo){
    var vetor;
    if (tipo == "dias") {
        vetor = document.getElementsByName("semana");
        finalStrig = document.getElementById("hide_d");
    } else if (tipo == "materia") {
        vetor = document.getElementsByName("materia");
        finalStrig = document.getElementById("hide_m");
    }
    var string=null;
    var first = true;
    for (var i=0; i < vetor.length; i++){  
        if (vetor[i].checked){
            if (first) {
                string = vetor[i].value;
                first = false;
            } else {
                string = string + "," + vetor[i].value;
            }
        }
        if (string == null) {
            string = "";
        }
    }
    finalStrig.value = string;
}

// Faz aparecer a mensagem de exclusão e direciona pra página correta
function msgConfirm(tipo, id) {
    $('#msgConfirm').modal('show');
    var temp = '#'+id;
    temp = $(temp+' td');
    $('#msgConfirm').on('shown', function () {
        $('#bot-yes').on('click', function () {
            if (tipo == "prof") {
                // Pega os dados para a exclusão
                var temp = '#'+id;
                temp = $(temp+' td');
                var nome = temp[1].innerHTML;
                var sobrenome = temp[2].innerHTML;
                // Vai pra pagina de exclusão
                window.location.href = "delete_line_prof.php?nome="+nome+"&"+"sobrenome="+sobrenome;
            } else if (tipo == "mat") {
                var temp = '#'+id;
                temp = $(temp+' td');
                var nome = temp[1].innerHTML;
                window.location.href = "delete_line_mat.php?nome="+nome;
            } else if (tipo == "turma") {
                var temp = '#'+id;
                temp = $(temp+' td');
                var nome = temp[1].innerHTML;
                window.location.href = "delete_line_trm.php?nome="+nome;
            }
        });
    });
}

// Faz aparecer o formulario
function appearWindow(tipo, whosend, id) {
    if(tipo == "add") {
        $('#formAdd').modal('show');
    } else if (tipo == "edit") {
        if (whosend == "prof") {
            // Pega o id/codigo p/ alterar as coisas depois
            var temp = '#'+id;
            temp = $(temp+' td');
            // Seta o nome
            var nome = temp[1].innerHTML;
            $('#formAdd input[name=nome]').attr('value', nome);
            // Seta o sobrenome
            var sobrenome = temp[2].innerHTML;
            $('#formAdd input[name=sobrenome]').attr('value', sobrenome);
            // Da o check das materias
            var j = 0;
            $('input:text#hide_m').attr('value', temp[3].innerHTML);
            var materias = temp[3].innerHTML.split(',');
            var vetorMat = $('input[name=materia]:checkbox');
            for (var i = 0; i < vetorMat.length; i++) {
                console.log(vetorMat[i], i);
                console.log(vetorMat[i].value+'=='+materias[j]);
                if(vetorMat[i].value == materias[j]){
                    vetorMat[i].checked = true;
                    j++;
                }
            };
            // Da o check dos dias
            $('input:text#hide_d').attr('value', temp[4].innerHTML);
            var dias = temp[4].innerHTML.split(',');
            var vetorDia = $('input[name=semana]:checkbox');
            for (var i = 0; i < vetorDia.length; i++) {
                if (dias.indexOf((i+1).toString()) >= 0) {
                    vetorDia[i].checked=true;
                }
            };
        } else if (whosend == "mat") {
            // Pega o id/codigo p/ alterar as coisas depois
            var temp = '#'+id;
            temp = $(temp+' td');
            // Seta o nome
            var nome = temp[1].innerHTML;
            $('#formAdd input[name=nome]').attr('value', nome);
        } else if (whosend == "turma") {
            // Pega o id/codigo p/ alterar as coisas depois
            var temp = '#'+id;
            temp = $(temp+' td');
            // Seta o nome
            var nome = temp[1].innerHTML;
            $('#formAdd input[name=nome]').attr('value', nome);
        }
        // Aqui chama o php pra editar
        $('#formAdd').modal('show');
        $('#formAdd').on('shown', function () {
            $('.btn btn-primary').on('click', function () {
                if (whosend == "prof") {
                    console.log("Professor tentou editar!")
                } else if (whosend == "mat") {
                    console.log("Materia tentou editar!")
                } else if (whosend == "turma") {
                    console.log("Turma tentou editar!")
                }
            });
        });
    }
    // Apos sair limpa o modal!
    $('#formAdd').on('hidden', function () {
        $('#formAdd input:text').attr('value', "");
        var vetor = $('input:checkbox');
        for (var i = 0; i < vetor.length; i++) {
            if (vetor[i].checked) {
                vetor[i].checked=false;
            }
        };
    });
}
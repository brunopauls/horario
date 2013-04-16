<html>
	<head>
		<!--<meta http-equiv="refresh" content="1; URL=gerador.php"> -->
		<title>Horario Escolar</title>
		<link rel="stylesheet" type='text/css' href='css/confirm.css' media='screen'>
		<link rel="stylesheet" type='text/css' href='css/bootstrap.css' media='screen'>
		<link rel="stylesheet" type='text/css' href='css/style.css' media='screen'>
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/funcoes.js"></script>
		<script type="text/javascript" src="js/bootstrap.js"></script>
	</head>
	<body>
<?php


	$con = require_once "config.php";
	$num_turmas = 7; //busca no banco o numero de turmas;
	$aulas_dia = 6; //busca no banco o numero de aulas por dia;
	$dias_semana = 5; //busca no banco o numero de dias por semana;
	$i = 0;
	$dias = array("Segunda","Terca","Quarta","Quinta","Sexta");


	$result = mysql_query("select count(1) FROM Professores");
	$num_professores = mysql_fetch_array($result);
	$num_professores = $num_professores[0];
	echo "Professores: " . $num_professores . '<br>';

	$result = mysql_query("select count(1) FROM Materias");
	$num_materias = mysql_fetch_array($result);
	$num_materias = $num_materias[0];
	echo "Materias: " . $num_materias . '<br>';


	$result = mysql_query("SELECT count(1) FROM Turmas");
	$num_turmas = mysql_fetch_array($result);
	$num_turmas = $num_turmas[0];
	echo "Turmas: " . $num_turmas . '<br>';

	$result = mysql_query("SELECT * FROM Materias");
	$i = 1;
	while($row = mysql_fetch_array($result)){
		$array_materias[$i] = $row['Nome'];
		$i++;
	}

	$result = mysql_query("SELECT * FROM Turmas");
	$i = 1;
	while($row = mysql_fetch_array($result)){
		$array_turmas[$i] = $row['Nome'];
		$i++;
	}

	$i = 0;
	while ($i < 1) { //roda todo o programa 10 vezes
		for ($j=0; $j < $dias_semana; $j++) {

			echo '<table class="tabela"><tr>';
			for ($i=1; $i <= $num_turmas; $i++) { 
				echo '<th>' . $array_turmas[$i] . '</th>';
			}

			echo '</tr>';

			echo $dias[$j] . '<br>';
			for ($k=0; $k < $aulas_dia; $k++) { 
				for ($l=0; $l < $num_turmas; $l++) { 
					do{
						$matriz[$j][$k][$l] = rand(1,$num_materias);
					}while(!verifica($matriz[$j][$k][$l], $j, $k, $l));
					//}while($i > 90);
				}
			}
			for ($k=0; $k < $aulas_dia; $k++) {
				echo '<tr>';
				for ($l=0; $l < $num_turmas; $l++) {
					
					echo '<td>' . $array_materias[ $matriz[$j][$k][$l] ] . '</td>';// .' - ' . $l . ' ' . $k . " : ";
					
				}
				echo '<tr>';
			}
		}
		$i++;
	}
	mysql_close($con);


	function verifica($materia, $dia, $aula, $turma)
	{
		//verifica se professor que de $materia pra $turma da aula no $dia;
		//
		return 1;
	}	

?>


</body>
<html>
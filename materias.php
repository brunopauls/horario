<!doctype html>
<html>
	<head>
		<title>Horario Escolar</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link type='text/css' href='css/basic.css' rel='stylesheet' media='screen'>
		<link type='text/css' href='css/confirm.css' rel='stylesheet' media='screen'>
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type='text/javascript' src='js/jquery.simplemodal.js'></script>
		<script type="text/javascript" src="js/funcoes.js"></script>
	</head>
	<body >
		<div id="wrapper">
			<div id="header"></div>
			<div id="menu">
				<ul id="nav">
					<a href="index.html"><li>Home</li></a>
					<a href="professores.php"><li>Professores</li></a>
					<a href="turmas.html"><li>Turmas</li></a>
					<a href="materias.php"><li>Materias</li></a>
					<a href="horarios.html"><li>Horario</li></a>
				</ul>
			</div>
			<div id="content">
				<div class="col-un">
					<?php
						$con = mysql_connect("localhost:3306","root","-");
						if (!$con){
			  				die('Could not connect: ' . mysql_error());
			  			}

						mysql_select_db("my_db", $con);

						echo '<table id="tabela">
						<tr>
							<th>Nome</th>
							<th>Opcoes</th>
						</tr>';
						
						$result = mysql_query("SELECT * FROM Materias");

						while($row = mysql_fetch_array($result)){
							echo '<tr>';
							echo '<td>' . $row['Nome'] . '</td>';
							echo '<td><a href="#">Editar</a> | <a href="#" class="confirm">Excluir</a></td>';
							echo "</tr>";
							
						}

						echo '</table>';
						echo '<button id="botao" class="basic">Adicionar nova materia!</button>';
				
					?>

						<form id="basic-modal-content" name="myForm" action="insert_mat.php" method="post">
							<label for="nome">Nome</label><br>
							<input type="text" id="nome" name="nome"><br><br>
							<input type="submit" id="botaoForm" value="Adicionar">
						</form>
					</div>
					<!-- preload the images -->
					<div style='display:none'> 
						<img src='css/x.png' alt='' />
					</div>
				</div>
			</div>
		</div>
	</body>

	<script type="text/javascript">
		$(".basic").click(function () {
			$("#basic-modal-content").modal({
				escClose: true,
				opacity: 85
			});
		});
	</script>

<?
msql_close($con);
?>
</html>
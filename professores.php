<!doctype html>
<html>
	<head>
		<title>Horario Escolar</title>
		<link rel="stylesheet" type="text/css" href="css/style.css" media='screen'>
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
						$con = mysql_connect("localhost:3306","root","tboa33ox");
						if (!$con){
			  				die('Could not connect: ' . mysql_error());
			  			}

						mysql_select_db("my_db", $con);

						echo '<table class="tabela" id="confirm-dialog">
						<tr>
							<th>Nome</th>
							<th>Sobrenome</th>
							<th>Materia(s)</th>
							<th>Dia(s)</th>
							<th>Opcoes</th>
						</tr>';
						
						$result = mysql_query("SELECT * FROM Professores");

						while($row = mysql_fetch_array($result)){
							echo '<tr>';

							echo '<td>' . $row['Nome'] . '</td>';
							echo '<td>' . $row['Sobrenome'] . '</td>';
							echo '<td>' . $row['Materias'] . '</td>';
							echo '<td>' . $row['Dias'] . '</td>';
							echo '<td><a href="#">Editar</a> | <a href="#" class="confirm" id="' . $row['Nome'] . ' ' . $row['Sobrenome'] .'">Excluir</a></td>';
							echo "</tr>";
							
						}

						echo '</table>';
						echo '<button id="botao" class="basic">Adicionar novo professor!</button>';
				
					?>

						<form id="basic-modal-content" name="myForm" action="insert_prof.php" method="post">
							<label for="nome">Nome</label><br>
							<input type="text" id="nome" name="nome"><br><br>
							<label for="sobrenome">Sobrenome</label><br>
							<input type="text" id="sobrenome" name="sobrenome"><br><br>
							<input type="checkbox" id="seg" name="semana" value="1" onclick="stringDia()"><label for="seg">Segunda</label><br>
							<input type="checkbox" id="ter" name="semana" value="2" onclick="stringDia()"><label for="ter">Terca</label><br>
							<input type="checkbox" id="qua" name="semana" value="3" onclick="stringDia()"><label for="qua">Quarta</label><br>
							<input type="checkbox" id="qui" name="semana" value="4" onclick="stringDia()"><label for="qui">Quinta</label><br>
							<input type="checkbox" id="sex" name="semana" value="5" onclick="stringDia()"><label for="sex">Sexta</label><br>
							<br>Materias:<br>
							<?
								$result = mysql_query("SELECT * FROM Materias");
								while($row = mysql_fetch_array($result)){
									echo '<input type="checkbox" id="' . $row['Nome'] . '" name="materia" value="' . $row['Nome'] . '" onclick="stringMateria()"><label for="' . $row['Nome'] . '">' . $row['Nome'] . '</label><br>';				
								}
							?>
							<input type="text" id="hide_m" name="materias" value=""><br>
							<input type="text" id="hide_d" name="dias" value=""><br>
							<input type="submit" id="botaoForm" value="Adicionar">
						</form>
						                    
					</div>
					<!-- Mensagem de confirmação de exclusão -->
					<div id="confirm">
                        <div class="header"><span>Confirmar</span></div>
                        <div class="message"></div>
                        <div class="buttons">
                            <div class="no simplemodal-close">Nao</div><div class="yes">Sim</div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</body>


<?
msql_close($con);
?>
</html>

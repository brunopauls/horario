<!doctype html>
<html>
	<head>
		<title>Horario Escolar</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body >
		<div id="wrapper">
			<div id="header"></div>
			<div id="nav">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="professores.php">Professores</a></li>
					<li><a href="turmas.php">Turmas</a></li>
					<li><a href="materias.php">Materias</a></li>
				</ul>
			</div>
			<div id="content">
				<div class="col">
					<form action="insert.php" method="post">
						<table border="0">
							<tr>
								<td>Nome:</td><td><input type="text" name="nome" value="Bruno Francesco"></td>
							</tr>
							<tr>
								<td>Sobrenome:</td><td><input type="text" name="sobrenome" value="Pauls"></td>
							</tr>
							<tr>
								<td>Dias:</td><td><input type="text" name="dias" value="1,2,3"></td>
							</tr>
						</table>
						<input type="submit" value="Adicionar"><br/><br/>
					</form>
					<form action="delete.php" method="post">
						<input type="submit" value="Zerar Tabela"><br/>
					</form>
				</div>
				<div class="col">
					<?php
						$con = mysql_connect("localhost:3306","root","tboa33ox");
						if (!$con){
			  				die('Could not connect: ' . mysql_error());
			  			}

						mysql_select_db("my_db", $con);

						
						$result = mysql_query("SELECT * FROM Professores");
						$i = 1;
						while($row = mysql_fetch_array($result)){
							echo $i . ": " . $row['Nome'] . " " . $row['Sobrenome'];
							echo "<br />";
							$i++;
						}

			  			msql_close($con);
					?>
			</div>
		</div>
	</body>
<html>
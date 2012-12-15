<html>
	<head>
		<meta http-equiv="refresh" content="0.0001; URL=materias.php">
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<?php
			//conecta ao banco
			$con = mysql_connect("localhost:3306","root","tboa33ox");
			if (!$con){
				die('Could not connect: ' . mysql_error());
			}

			//seleciona o database "my_db"
			mysql_select_db("my_db", $con);

			//Deleta a tabela Professores inteira (Esvaziar Tabela não quer funcionar)
			mysql_query("DROP TABLE Materias");

			//Recria a Tabela
			$sql = "CREATE TABLE Materias
			( 
				materiaID int NOT NULL AUTO_INCREMENT, 
				PRIMARY KEY(materiaID),
				Nome varchar(20)
			)";
			if (mysql_query($sql,$con)){
				echo "Criou Tabela";
			}
			else {
				echo "Error creating table: " . mysql_error();
			}

			//fecha a conexão
			mysql_close($con);
		?>
	</body>
</html>


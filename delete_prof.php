<html>
	<head>
		<meta http-equiv="refresh" content="0.0001; URL=professores.php">
	</head>
	<body>
		<?php
			//Abre a conexão
			$con = require_once "config.php";

			//Deleta a tabela Professores inteira (Esvaziar Tabela não quer funcionar)
			mysql_query("DROP TABLE Professores");

			//Recria a Tabela
			$sql = "CREATE TABLE Professores
			( 
				professorID int NOT NULL AUTO_INCREMENT, 
				PRIMARY KEY(professorID),
				Nome varchar(15),
				Sobrenome varchar(15),
				Materias varchar(60),
				Dias varchar(10)
			)";
			if (mysql_query($sql,$con)){
				echo "Criou Tabela";
			}
			else {
				echo "Error creating table: " . mysql_error();
			}

			//Fecha a conexão
			mysql_close($con);
		?>
	</body>
</html>
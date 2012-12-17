<html>
	<head>
		<meta http-equiv="refresh" content="0.0001; URL=materias.php">
	</head>
	<body>
		<?php
			//Abre a conexão
			$con = require_once "config.php";

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

			//Fecha a conexão
			mysql_close($con);
		?>
	</body>
</html>


<html>
	<head>
		<meta http-equiv="refresh" content="0.0001; URL=turmas.php">
	</head>
	<body>
		<?php
			// Abre a conexão
			$con = require_once "config.php";

			//Deleta a tabela Professores inteira
			mysql_query("DROP TABLE Turmas");

			//Recria a Tabela
			$sql = "CREATE TABLE Turmas
			( 
				turmaID int NOT NULL AUTO_INCREMENT, 
				PRIMARY KEY(turmaID),
				Nome varchar(20)
			)";
			if (mysql_query($sql,$con)){
				echo "Criou Tabela";
			}
			else {
				echo "Error creating table: " . mysql_error();
			}

			// Fecha a conexão
			mysql_close($con);
		?>
	</body>
</html>
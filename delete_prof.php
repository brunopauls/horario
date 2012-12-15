<html>
	<head>
		<meta http-equiv="refresh" content="0.0001; URL=professores.php">
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

			//fecha a conexão
			mysql_close($con);
		?>
	</body>
</html>


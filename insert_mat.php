<html>
	<head>
		<meta http-equiv="refresh" content="10; URL=materias.php">
	</head>
	<body>
		<?php
			//Abre a conexão
			$con = require_once "config.php";

			$sql="INSERT INTO Materias (Nome)
			VALUES ('$_POST[nome]')";
			
			echo "$_POST[nome]";
			
			if (!mysql_query($sql,$con)){
			  die('Error: ' . mysql_error());
			}
			
			//Insere Nova coluna na Tabela TURMAS, 

			$sql="ALTER TABLE Turmas ADD " . "$_POST[nome]" . " varchar(30) ";
			
			echo "$_POST[nome]";
			
			if (!mysql_query($sql,$con)){
			  die('Error: ' . mysql_error());
			}

			//Fecha a conexão
			mysql_close($con);
		?>
	</body>
</html>


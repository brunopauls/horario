<html>
	<head>
		<meta http-equiv="refresh" content="0.00001; URL=materias.php">
	</head>
	<body>
		<?php
			//Abre a conexão
			$con = require_once "config.php";

			if (!mysql_query("DELETE From Materias where Nome = '$_GET[nome]'")){
				echo "Error deleting line: " . mysql_error();
			}

			$sql="ALTER TABLE Turmas DROP COLUMN " . "$_GET[nome]";

			if (!mysql_query($sql,$con)){
			  die('Error: ' . mysql_error());
			}

			//Fecha a conexão
			mysql_close($con);
		?>
	</body>
</html>

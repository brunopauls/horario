<html>
	<head>
		<meta http-equiv="refresh" content="0.00001; URL=materias.php">
	</head>
	<body>
		<?php
			//Abre a conexão
			$con = require_once "config.php";

			if (!mysql_query("DELETE From Materias where Nome = '$_POST[nome]'")){
				echo "Error deleting line: " . mysql_error();
			}

			//Fecha a conexão
			mysql_close($con);
		?>
	</body>
</html>
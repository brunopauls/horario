<html>
	<head>
		<meta http-equiv="refresh" content="0.00001; URL=turmas.php">
	</head>
	<body>
		<?php
			//Abre a conexão
			$con = require_once "config.php";

			if (!mysql_query("DELETE From Turmas where Nome = '$_GET[nome]'")){
				echo "Error deleting line: " . mysql_error();
			}

			//Fecha a conexão
			mysql_close($con);
		?>
	</body>
</html>
<html>
	<head>
		<meta http-equiv="refresh" content="0.00001; URL=professores.php">
	</head>
	<body>
		<?php
			//Abre a conexão
			$con = require_once "config.php";

			if (!mysql_query("DELETE From Professores where Nome = '$_POST[nome]' AND Sobrenome = '$_POST[sobrenome]'")){
				echo "Error deleting line: " . mysql_error();
			}

			//Fecha a conexão
			mysql_close($con);
		?>
	</body>
</html>
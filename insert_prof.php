<html>
	<head>
		<meta http-equiv="refresh" content="0.0001; URL=professores.php">
	</head>
	<body>
		<?php
			$con = require_once "config.php";

			$sql="INSERT INTO Professores (Nome, Sobrenome, Materias, Dias)
				VALUES ('$_POST[nome]','$_POST[sobrenome]', '$_POST[materias]','$_POST[dias]')";

			echo "$_POST[nome]" . "$_POST[sobrenome]" . "$_POST[materias]" . "$_POST[dias]";

			if (!mysql_query($sql,$con)){
				die('Error: ' . mysql_error());
			}
			
			mysql_close($con);
		?>
	</body>
</html>
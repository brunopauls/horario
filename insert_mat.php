<html>
	<head>
		<meta http-equiv="refresh" content="0.0001; URL=materias.php">
	</head>
	<body>
		<?php
			$con = require_once "config.php";

			$sql="INSERT INTO Materias (Nome)
			VALUES ('$_POST[nome]')";

			echo "$_POST[nome]";

			if (!mysql_query($sql,$con)){
			  die('Error: ' . mysql_error());
			}
			
			mysql_close($con);
		?>
	</body>
</html>
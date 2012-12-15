<html>
	<head>
		<meta http-equiv="refresh" content="0.0001; URL=professores.php">
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>

	<body>
		<?php
			$con = mysql_connect("localhost:3306","root","tboa33ox");
			if (!$con){
				die('Could not connect: ' . mysql_error());
			}

			mysql_select_db("my_db", $con);

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
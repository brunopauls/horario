<!--
<div id="menu">
	<ul id="nav">
		<a href="index.php"><li>Home</li></a>
		<a href="professores.php"><li>Professores</li></a>
		<a href="materias.php"><li>Materias</li></a>
		<a href="turmas.php"><li>Turmas</li></a>
		<a href="gerador.php"><li id="direita"></li><img src="css/gear2.png"></a>
	</ul>
	<ul>
		
	</ul>
</div>
-->
<?php
	if ($_SERVER["PHP_SELF"] == "/horario/index.php")
		echo '<div id="menu"><ul id="nav"><a href="index.php"><li><b>Home</b></li></a><a href="professores.php"><li>Professores</li></a><a href="materias.php"><li>Materias</li></a><a href="turmas.php"><li>Turmas</li></a><a href="gerador.php"><li id="direita"></li><img src="css/gear2.png"></a></ul></div>';
	else if ($_SERVER["PHP_SELF"] == "/horario/turmas.php")
		echo '<div id="menu"><ul id="nav"><a href="index.php"><li>Home</li></a><a href="professores.php"><li>Professores</li></a><a href="materias.php"><li>Materias</li></a><a href="turmas.php"><li><b>Turmas</b></li></a><a href="gerador.php"><li id="direita"></li><img src="css/gear2.png"></a></ul></div>';
	else if ($_SERVER["PHP_SELF"] == "/horario/materias.php")
		echo '<div id="menu"><ul id="nav"><a href="index.php"><li>Home</li></a><a href="professores.php"><li>Professores</li></a><a href="materias.php"><li><b>Materias</b></li></a><a href="turmas.php"><li>Turmas</li></a><a href="gerador.php"><li id="direita"></li><img src="css/gear2.png"></a></ul></div>';
	else if ($_SERVER["PHP_SELF"] == "/horario/professores.php")
		echo '<div id="menu"><ul id="nav"><a href="index.php"><li>Home</li></a><a href="professores.php"><li><b>Professores</b></li></a><a href="materias.php"><li>Materias</li></a><a href="turmas.php"><li>Turmas</li></a><a href="gerador.php"><li id="direita"></li><img src="css/gear2.png"></a></ul></div>';
?>
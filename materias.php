<!doctype html>
<html>
	<head>
		<title>Horario Escolar</title>
		<link rel="stylesheet" type="text/css" href="css/style.css" media='screen'>
		<link rel="stylesheet" type='text/css' href='css/basic.css' media='screen'>
		<link rel="stylesheet" type='text/css' href='css/confirm.css' media='screen'>
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type='text/javascript' src='js/jquery.simplemodal.js'></script>
		<script type="text/javascript" src="js/funcoes.js"></script>
	</head>
	<body >
		<div id="wrapper">
			<div id="header"></div>
			<?php
				$con = require_once "menu.php";
			?>
			<div id="content">
				<div class="col-un">
					<!-- Imprime a tabela das materias existentes -->
					<?php
						$con = require_once "config.php";

						echo '<table class="tabela" id="confirm-dialog">
						<tr>
							<th>Nome</th>
							<th>Opcoes</th>
						</tr>';
						
						$result = mysql_query("SELECT * FROM Materias");

						while($row = mysql_fetch_array($result)){
							echo '<tr>';
							echo '<td>' . $row['Nome'] . '</td>';
							echo '<td><a href="#" onclick="editMat(\''. $row['Nome'] . '\')">Editar</a> | <a href="#" onclick="msgConfirmMat(\''. $row['Nome'] . '\')">Excluir</a></td>';
							echo "</tr>";
						}

						echo '</table>';
						echo '<button id="botao" onclick="adicionar()">Adicionar nova materia</button>';
					?>
					<!-- Formulario p/ adicionar materia -->
					<form id="basic-modal-content" name="myForm" action="insert_mat.php" method="post">
						<label for="nome">Nome</label><br>
						<input type="text" id="nome" name="nome"><br><br>
						<input type="submit" id="botaoForm" value="Adicionar">
					</form>
					<!-- Mensagem de confirmação de exclusão -->
					<div id="confirm">
                        <div class="header"><span>Confirmar</span></div>
                        <div class="message"></div>
                        <div class="buttons">
                            <div class="no simplemodal-close">Nao</div><div class="yes">Sim</div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</body>
	<?php
		msql_close($con);
	?>
</html>


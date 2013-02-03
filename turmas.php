<!doctype html>
<html>
	<head>
		<title>Horario Escolar</title>
		<link rel="stylesheet" type='text/css' href='css/confirm.css' media='screen'>
		<link rel="stylesheet" type='text/css' href='css/bootstrap.css' media='screen'>
		<link rel="stylesheet" type='text/css' href='css/style.css' media='screen'>
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/funcoes.js"></script>
		<script type="text/javascript" src="js/bootstrap.js"></script>
	</head>
	<body >
		<div id="wrapper">
			<div id="header"></div>
			<?php
				require_once "menu.php";
			?>
			<div id="content">
				<div class="col-un">
					<!-- Imprime a tabela das materias existentes -->
					<?php
						$con = require_once "config.php";

						echo '<table class="tabela">
						<tr>
							<th>#</th>
							<th>Nome</th>
							<th>Opcoes</th>
						</tr>';
						
						$result = mysql_query("SELECT * FROM Turmas");
						$i = 0;
						while($row = mysql_fetch_array($result)){
							echo '<tr id="codigo-' . $i . '">';
							echo '<td>' . $i . '</td>';
							echo '<td>' . $row['Nome'] . '</td>';
							echo '<td><a href="#" onclick="appearWindow(\'edit\', \'turma\', \'codigo-'. $i .'\')">Editar</a> | <a href="#" onclick="msgConfirm(\'turma\', \'codigo-'. $i .'\')">Excluir</a></td>';
							echo "</tr>";
							$i++;
						}
						
						echo '</table>';
						echo '<a onclick="appearWindow(\'add\', null, null)" role="button" class="btn">Adicionar nova turma!</a>';
					?>

					<!-- Formulario p/ adicionar materia -->
					<form name="myForm" action="insert_trm.php" method="post">
						<div id="formAdd" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="formAdicionar" aria-hidden="true">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
								<h3 id="formAdicionar">Formulario</h3>
							</div>
						    <div class="modal-body">
									<label for="nome">Nome</label>
									<input type="text" id="nome" name="nome" maxlength="20" required>
						    </div>
							<div class="modal-footer">
								<button type="submit" class="btn btn-primary">Adicionar</button>
								<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
							</div>
					    </div>
					</form>
					<!-- Mensagem de confirmação de exclusão -->
					<div id="msgConfirm" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="msgExcluir" aria-hidden="true">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
							<h3 id="msgExcluir">Confirmacao</h3>
						</div>
					    <div class="modal-body">
					    	<p>Voce tem certeza que deseja excluir?</p>
					    </div>
						<div class="modal-footer">
							<button id="bot-yes" class="btn btn-primary">Sim</button>
							<button class="btn" data-dismiss="modal" aria-hidden="true">Nao</button>		
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
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
					<!-- Imprime a tabela dos professores existentes -->
					<?php
						$con = require_once "config.php";

						echo '<table class="tabela">
						<tr>
							<th>#</th>
							<th>Nome</th>
							<th>Sobrenome</th>
							<th>Materia(s)</th>
							<th>Dia(s)</th>
							<th>Opcoes</th>
						</tr>';
						
						$result = mysql_query("SELECT * FROM Professores");
						$i = 0;
						while($row = mysql_fetch_array($result)){
							echo '<tr id="codigo-' . $i . '">';
							echo '<td>' . $i . '</td>';
							echo '<td>' . $row['Nome'] . '</td>';
							echo '<td>' . $row['Sobrenome'] . '</td>';
							echo '<td>' . $row['Materias'] . '</td>';
							echo '<td>' . $row['Dias'] . '</td>';
							echo '<td><a href="#" onclick="appearWindow(\'edit\', \'prof\', \'codigo-'. $i .'\')">Editar</a> | <a href="#msgConfirm" onclick="msgConfirm(\'prof\', \'codigo-'. $i .'\')">Excluir</a></td>';
							echo "</tr>";
							$i++;
						}

						echo '</table>';
						echo '<a onclick="appearWindow(\'add\', null, null)" role="button" class="btn">Adicionar novo professor!</a>';
					?>
					
					<!-- Formulario p/ adicionar professor -->
					<form name="myForm" action="insert_prof.php" method="post" autocomplete="off">
						<div id="formAdd" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="formAdicionar" aria-hidden="true">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
								<h3 id="formAdicionar">Formulario</h3>
							</div>
						    <div class="modal-body">
									<label for="nome">Nome</label>
									<input type="text" id="nome" name="nome" maxlength="15" required>
									<label for="sobrenome">Sobrenome</label>
									<input type="text" id="sobrenome" name="sobrenome" maxlength="15" required><br>
									<label class="checkbox inline">
										<input type="checkbox" name="semana" value="1" onclick="stringMake('dias')"> Segunda
									</label>
									<label class="checkbox inline">
										<input type="checkbox" name="semana" value="2" onclick="stringMake('dias')"> Terca
									</label>
									<label class="checkbox inline">
										<input type="checkbox" name="semana" value="3" onclick="stringMake('dias')"> Quarta
									</label>
									<label class="checkbox inline">
										<input type="checkbox" name="semana" value="4" onclick="stringMake('dias')"> Quinta
									</label>
									<label class="checkbox inline">
										<input type="checkbox" name="semana" value="5" onclick="stringMake('dias')"> Sexta
									</label><br>
									<!-- Imprime lista de materias disponiveis -->
									<br>Materias:<br>
									<?php
										$result = mysql_query("SELECT * FROM Materias");
										$i = 1;
										$k = 5;
										echo '<table>';
										echo '<tr>';
										while($row = mysql_fetch_array($result)){
											$j = $i % 5;
											if ($i == $k) {
												echo '</tr>';
											} else {
												echo 	'<td class="grade-form-tab"><label class="checkbox inline">
														<input type="checkbox" id="' . $row['Nome'] . '" name="materia" value="' . $row['Nome'] . '" onclick="stringMake(\'materia\')"> '. $row['Nome'] .'
													</label></td>';
											}			
											if ($j == 0) {
												$k = $i + 5;
												echo '<tr>';
											}
											$i++;
										}
										echo '</table>';
									?>
									<input type="text" id="hide_m" name="materias" value=""><br>
									<input type="text" id="hide_d" name="dias" value=""><br>
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
	<?
		msql_close($con);
	?>
</html>
<!-- TODO: Falta colocar os= nome, values e outros paramatros nos inputs -->
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="css/bootstrap.css">
		<!-- <link rel="stylesheet" href="css/style.css"> --> 
		<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
	</head>
<body>	
	<div class="container col-xs-12 col-sm-12 col-md-10 col-lg-10">
		 
							<ul class="nav nav-pills">
								<!-- 'botao' link para a listagem -->
								<li class="active"><a data-toggle="pill" href="#list">Listar todas</a></li>
								<!-- 'botao' link para novo registro -->
								<li><a data-toggle="pill" href="#new">Cadastrar</a></li>
							
							</ul>
					
					<!-- Dentro dessa div vai o conteúdo que os botões acima exibem ou omitem -->
				<div class="tab-content">

						<!-- Aqui é a Listagem dos Itens -->
						<div id="list" class="tab-pane fade in active">
							<div style="margin-top: 25px;">
								<table id="TurnoTable" class="table table-striped">
								 	<thead>
										<tr>
											<th><center>Nome</th>
											<th><center>Qtd Aulas</th>
											<th><center>Horario de entrada</th>
											<th><center>Horario de saida</th>
											<th><center>Status</th>
											<th><center>Ação</th>
										</tr>
									</thead>
									<!-- Aqui é onde popula a tabela com os dados que vem do backend, onde cada view vai configurar de acordo.-->
									<tbody>
										<?php foreach ($turnos as $turno) { ?>
											<?= ($turno['status'] ? '<tr>' : '<tr class="danger">') ?>
												<td><center><?= $turno['nomeTurno']; ?></td>
												<td><center><?= $turno['qtdAula']; ?></td>
												<td><center><?= $turno['inicio']; ?></td>
												<td><center><?= $turno['fim']; ?></td>
												<td><center><?php if ($turno['status']): echo "Ativo";
												else: echo "Inativo";
												endif; ?></td>
											<td><center>
											
												<?php if ($turno['status']): ?>
													<!-- Esse button editar vai chamar o outro tab-pane editar, não está direcionado pois os dados que ele tenta passar estão com problema, se deixar apeanas o data-toggle= pill e o href editar vai chamar o tabpane -->
													<button type="button"  data-toggle="pill" href="#editar" class="btn btn-warning" title="Editar" data-toggle="modal" data-target="#exampleModal" data-whatevernomeTurno="<?= $turno['nomeTurno']; ?>" data-whateverid="<?= $turno['id']; ?>" data-whateverqtdAula="<?= $turno['qtdAula']; ?>"  data-whateverinicio="<?= $turno['inicio']; ?>" data-whateverfim="<?= $turno['fim']; ?>"><span class="glyphicon glyphicon-pencil"></span></button>
													<button onClick="exclude(<?= $turno['id'] ?>);" type="button" class="btn btn-danger" title="Desativar"><span class="glyphicon glyphicon-remove"></span></button>
												<?php else : ?>
													<button onClick="able(<?= $turno['id'] ?>)" type="button" class="btn btn-success delete" title="Ativar"><span class="glyphicon glyphicon-ok"></span></button>
												<?php endif; ?>
											</td>
											</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
					<div id="new" class="tab-pane fade">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12">
								<form method="post">
										<div class="col-xs-12 col-sm-12 col-md-12 form-group">
											<div class="col-xs-12 col-sm-12 col-md-12" style="height: 40px;"></div>
												<label>Nome:</label>
												<input class="form-control" placeholder="Nome" required maxlength="20">
												<?= form_error('nome_turno') ?>
												<button id="btnAdd" class="btn btn-primary btn-success add-field" style="background: green; ">+ Adicionar Aula</button>
										</div>
										
											<div id="copi" class="col-xs-2 col-sm-2 col-md-2 form-group">
												<label >Horario de entrada:</label>
												<input class="form-control" type="time">
											</div>
											<div id="copi2" class="col-xs-2 col-sm-2 col-md-2 form-group">
												<label >Horario de saida:</label>
												<input class="form-control" type="time">
											</div>
																		
										<div class="col-xs-12 col-sm-12 col-md-12 form-group">
											<button type="submit" class="btn btn-primary btn-lg active" >Cadastrar</button>
										</div>

								</form>
						</div>
					
					</div>
					</div>
					<!-- o tabpane Editar que vai ser chamado quando clicar em editar (está substituindo o modal), precisa testar se com o JS do modal vai ser possivel popular essa view, caso não
					seja pensar em outra alternativa para evitar recarregar toda a pagina novamente ao direcionar para uma editar.php-->
					<div id="editar" class="tab-pane fade">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12">
								<form method="post">
										<div class="col-xs-12 col-sm-12 col-md-12 form-group">
											<div class="col-xs-12 col-sm-12 col-md-12" style="height: 40px;"></div>
												<label>Nome:</label>
												<input class="form-control" placeholder="Nome" required maxlength="20">
												<?= form_error('nome_turno') ?>
										</div>
											<div class="col-xs-2 col-sm-2 col-md-2 form-group">
												<label>Quantidade de aulas:</label>
												<input class="form-control"  placeholder="Informe a quantidade" required maxlength="3">
											</div>
										
											<div class="col-xs-2 col-sm-2 col-md-2 form-group">
												<label >Horario de entrada:</label>
												<input class="form-control" type="time">
											</div>
											<div class="col-xs-2 col-sm-2 col-md-2 form-group">
												<label >Horario de saida:</label>
												<input class="form-control" type="time">
											</div>
							</div>
										<div class="col-xs-12 col-sm-12 col-md-12 form-group">
											<button type="submit" class="btn btn-primary btn-lg active" >Confirmar</button>
										</div>

								</form>
						</div>
					
					</div>
					
				</div>
		</div>
</body>
</html>		   

<!DOCTYPE html>
<html lang="en">

<head>
	<title>RS Soluções</title>
	<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

	<link rel="stylesheet" href="<?=base_url('vendor/css.m/estilo.css');?>">

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!--<script src="<?php echo base_url() ?>scripts/fullcalendar/fullcalendar.js"></script>
    <script src="<?php echo base_url() ?>scripts/fullcalendar/locale/pt-br"></script>-->
	<link rel="stylesheet" href="<?php echo base_url() ?>scripts/fullcalendar/fullcalendar.min.css" />
	<script src="<?php echo base_url() ?>scripts/fullcalendar/lib/moment.min.js"></script>

	<!-- Font Awesome JS -->
	<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
		integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous">
	</script>
	<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
		integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous">
	</script>


</head>

<body>
    <!-- Menu Lateral -->
	<div class="wrapper bg-light">
		<nav id="sidebar" class="">
			<div class="sidebar">
				<h2>RS Soluções</h2>
			</div>
			<ul class="list-unstyled components">
				<p>Opções</p>
				<li class="active">
					<a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false"
						class="dropdown-toggle">Contas</a>
					<ul class="collapse list-unstyled" id="homeSubmenu">
						<li>
							<a class="" href="<?=base_url('calendar/index');?>">Calendário</a>
						</li>
						<li>
							<a class="" href="<?=base_url('supervisor/contaspagar');?>">Contas a Pagar</a>
						</li>
					</ul>
				</li>
				<li>
					<a class="" href="<?=base_url('supervisor/convenio');?>">Lista de Convênios</a>
				</li>
				<li>
					<a href="<?=base_url('supervisor/boletospagos');?>" class="">Boletos Pagos</a>
				</li>
			</ul>
        </nav>
        
        <!-- Barra de Navegação Horizontal -->
		<div class="container-fluid">
			<div class="card">
				<div class="col-md-12">
					<nav class="navbar navbar-expand-lg navbar-light bg-light">
						<div class="container-fluid">

							<button type="button" id="sidebarCollapse" class="btn btn-primary">
								<i class="fas fa-align-left"></i>
								<span></span>
							</button>
							<div class="navbar-right navbar-collapse" id="navbarSupportedContent">
								<ul class="nav navbar-nav ml-auto">
									<li class="nav-item active">
										<a class="nav-link">Olá <?=$this->session->userdata('nome');?></a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="<?=base_url('#');?>">Sair</a>
									</li>
								</ul>
							</div>
						</div>
					</nav>

					<div id="calendar">

                    <!--Modal Adicionar Evento -->
						<div class="modal fade" id="addModal" tabindex="-1" role="dialog"
							aria-labelledby="myModalLabel">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal"
											aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title" id="myModalLabel">Adicionar Evento ao Calendário</h4>
									</div>
									<div class="modal-body">
										<?php echo form_open(site_url("calendar/add_event"), array("class" => "form-horizontal")) ?>
										<div class="form-group">
											<label for="p-in" class="col-md-4 label-heading">Nome do Evento</label>
											<div class="col-md-8 ui-front">
												<input type="text" class="form-control" name="name" value="" required>
											</div>
										</div>
                                           
										<div class="form-group">
											<label for="p-in" class="col-md-4 label-heading">Descrição</label>
											<div class="col-md-6 ui-front">
												<input type="text" class="form-control" name="description">
											</div>
										</div>
										<div class="form-group">
											<label for="p-in" class="col-md-4 label-heading">Data de Início</label>
											<div class="col-md-8">
												<input type="text" class="form-control" name="start_date">
											</div>
											</div>
											<div class="form-group">
												<label for="p-in" class="col-md-4 label-heading">Data Final</label>
												<div class="col-md-8">
													<input placeholder="Data Final" type="text" class="form-control" name="end_date">
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">Sair</button>
												<input type="submit" class="btn btn-primary" value="Adicionar Evento">
												<?php echo form_close() ?>
											</div>
											</div>
											</div>
											</div>
                                    </div>
                        <!-- Modal Editar Evento -->
						<div class="modal fade" id="editModal" tabindex="-1" role="dialog"
							aria-labelledby="myModalLabel">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal"
											aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title" id="myModalLabel">Editar Evento</h4>
									</div>
									<div class="modal-body">
										<?php echo form_open(site_url("calendar/edit_event"), array("class" => "form-horizontal")) ?>
										<div class="form-group">
											<label for="p-in" class="col-md-4 label-heading">Nome do Evento</label>
											<div class="col-md-8 ui-front">
												<input type="text" class="form-control" name="name" value="" id="name">
											</div>
										</div>
										<div class="form-group">
											<label for="p-in" class="col-md-4 label-heading">Descrição</label>
											<div class="col-md-8 ui-front">
												<input type="text" class="form-control" name="description"
													id="description">
											</div>
										</div>
										<div class="form-group">
											<label for="p-in" class="col-md-4 label-heading">Data de Início</label>
											<div class="col-md-8">
												<input type="text" class="form-control" name="start_date"
													id="start_date">
											</div>
										</div>
										<div class="form-group">
											<label for="p-in" class="col-md-4 label-heading">Data Final</label>
											<div class="col-md-8">
												<input type="text" class="form-control" name="end_date" id="end_date">
											</div>
										</div>
										<div class="form-group">
											<label for="p-in" class="col-md-4 label-heading">Apagar Evento</label>
											<div class="col-md-8">
												<input type="checkbox" name="delete" value="1">
											</div>
										</div>
										<input type="hidden" name="eventid" id="event_id" value="0" />
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default"
											data-dismiss="modal">Sair</button>
										<input type="submit" class="btn btn-primary" value="Atualizar Evento">
										<?php echo form_close() ?>
									</div>
								</div>
							</div>
						</div>
					</div>
                </div>
                
                <!-- Função do Calendário -->
				<script type="text/javascript">
					$(document).ready(function () {

						var date_last_clicked = null;

						$('#calendar').fullCalendar({
							eventSources: [{
								events: function (start, end, timezone, callback) {
									$.ajax({
										url: '<?php echo base_url() ?>calendar/get_events',
										dataType: 'json',
										data: {
											// our hypothetical feed requires UNIX timestamps
											start: start.unix(),
											end: end.unix()
										},
										success: function (msg) {
											var events = msg.events;
											callback(events);
										}
									});
								}
							}, ],
							dayClick: function (date, jsEvent, view) {
								date_last_clicked = $(this);
								$(this).css('background-color', '#bed7f3');
								$('#addModal').modal();
							},
							eventClick: function (event, jsEvent, view) {
								$('#name').val(event.title);
								$('#description').val(event.description);
								$('#start_date').val(moment(event.start).format('YYYY/MM/DD HH:mm'));
								if (event.end) {
									$('#end_date').val(moment(event.end).format('YYYY/MM/DD HH:mm'));
								} else {
									$('#end_date').val(moment(event.start).format('YYYY/MM/DD HH:mm'));
								}
								$('#event_id').val(event.id);
								$('#editModal').modal();
							},
						});
					});
                </script>
			
                <script rel="stylesheet" type="text/javascript" src="<?php echo base_url() ?>scripts/fullcalendar/fullcalendar.js"></script> 
                <script rel="stylesheet" type="text/javascript" src="<?php echo base_url() ?>scripts/fullcalendar/locale/pt-br.js"></script>


                <!-- Função Rolamento do Menu -->
				<script type="text/javascript">
					$(document).ready(function () {
						$('#sidebarCollapse').on('click', function () {
							$('#sidebar').toggleClass('active');
						});
					});
				</script>

				<script type="text/javascript">
                	$(function () {
                		$('#calendar').fullCalendar({
                	});
					});
				</script>
				
				<!--Modal Adicionar Evento 
						<div class="modal fade" id="addModal" tabindex="-1" role="dialog"
							aria-labelledby="myModalLabel">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal"
											aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title" id="myModalLabel">Adicionar Evento ao Calendário</h4>
									</div>
									<div class="modal-body">
									<?php echo form_open(site_url("calendar/add_event"), array("class" => "form-horizontal")) ?>
										<div class="form-group col-md-6">
												<label for="inputseg">Beneficiado</label>
												<select id="inputseg" class="form-control" required>
													<option selected>Light</option>
													<option>Banco</option>
													<option>Funcionário</option>
												</select>
                                             </div>
											 <div class="form-group">
												<label for="p-in" class="col-md-4 label-heading">Data de Vencimento</label>
												<div class="col-md-6">
													<input placeholder="AAAA-MM-DD HH:MM" type="text" class="form-control" name="start_date" required>
												</div>
											</div>
										<div class="form-group col-md-6">
												<label for="inputseg">Status</label>
												<select id="inputseg" class="form-control" required>
													<option selected>Escolher...</option>
													<option>Em aberto</option>
													<option>Vencida</option>
												</select>
                                             </div>
										<div class="form-group">
											<label for="p-in" class="col-md-4 label-heading">Valor</label>
											<div class="col-md-6">
												<input type="text" class="form-control" name="description" required>
											</div>
											</div>
											<div class="form-group col-md-6">
												<label for="inputseg">Segmento</label>
												<select id="inputseg" class="form-control">
													<option selected>Escolher...</option>
													<option>Acordo Jurídico</option>
													<option>Imposto</option>
													<option>Folha</option>
												</select>
                                             </div>
											<div class="form-group">
											<label for="p-in" class="col-md-4 label-heading">Obsrevações</label>
											<div class="col-md-6 ui-front">
                                            <textarea class="form-control" id="exampleFormControlTextarea1" name="end_date" rows="3"></textarea>
											</div>
										</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">Sair</button>
												<input type="submit" class="btn btn-primary" value="Adicionar Evento">
												<?php echo form_close() ?>
											</div>
											</div>
											</div>
											</div>-->
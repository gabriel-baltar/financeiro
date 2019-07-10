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
				<li>
					<a class="" href="<?=base_url('calendar/index');?>">Calendário</a>
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

						<!--Modal Adicionar Evento-->
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
											<label for="id_beneficiario">Beneficiario</label>
											<select id="id_beneficiario" name="id_beneficiario" class="form-control"
												required>
												<?php foreach($beneficiario as $b){; ?>
												<option value="<?=$b->id;?>"><?=$b->beneficiario;?></option>
												<?php }; ?>
											</select>
										</div>
										<div class="form-group">
											<label for="vencimento" class="col-md-4 label-heading">Data de
												Vencimento</label>
											<div class="col-md-6">
												<input placeholder="DD-MM-AAAA" type="text" class="form-control"
													name="vencimento" id="vencimento" data-mask="00/00/0000" required>
											</div>
										</div>
										<div class="form-group col-md-6">
											<label for="status">Status</label>
											<select id="id_status" name="id_status" class="form-control" required>
												<?php foreach($status as $s){; ?>
												<option value="<?=$s->id;?>"><?=$s->status;?></option>
												<?php }; ?>
											</select>
										</div>
										<div class="form-group">
											<label for="valor" class="col-md-4 label-heading">Valor</label>
											<div class="col-md-6">
												<input type="text" class="money form-control" name="valor" id="valor"
													placeholder="R$ 0.000,00" reverse="true" required>
											</div>
										</div>
										<div class="form-group col-md-6">
											<label for="segmento">Segmento</label>
											<select id="id_segmento" name="id_segmento" class="form-control">
												<?php foreach($segmento as $m){; ?>
												<option value="<?=$m->id;?>"><?=$m->segmento;?></option>
												<?php };?>
											</select>
										</div>
										<div class="form-group">
											<label for="p-in" class="col-md-4 label-heading">Obsrevações</label>
											<div class="col-md-6 ui-front">
												<textarea class="form-control" id="obs" name="obs" rows="3"></textarea>
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default"
												data-dismiss="modal">Sair</button>
											<input type="submit" onclick="formataValor('2.500,99')"
												class="btn btn-primary" value="Adicionar Evento">
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
										<div class="form-group col-md-6">
											<label for="beneficiario">Beneficiario</label>
											<select id="beneficiario" name="beneficiario" class="form-control" required>
												<?php foreach($beneficiario as $b){; ?>
												<option value="<?=$b->id;?>"><?=$b->beneficiario;?></option>
												<?php }; ?>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label for="p-in" class="col-md-4 label-heading">Data de Vencimento</label>
										<div class="col-md-6">
											<input type="text" name="vencimento" class="form-control date"
												id="vencimento" data-mask="00/00/0000" required>
										</div>
									</div>
									<div class="form-group col-md-6">
										<label for="id_status">Status</label>
										<select id="id_status" name="id_status" class="form-control" required>
											<?php foreach($status as $s){; ?>
											<option value="<?=$s->id;?>"><?=$s->status;?></option>
											<?php }; ?>
										</select>
										<div class="form-group">
											<label for="valor" class="col-md-4 label-heading">Valor em R$</label>
											<div class="col-md-6">
												<input type="text" class="form-control money" name="valor" id="valor"
													required>
											</div>
										</div>
										<div class="form-group col-md-6">
											<label for="id_segmento">Segmento</label>
											<select id="id_segmento" name="id_segmento" class="form-control">
												<?php foreach($segmento as $m){; ?>
												<option value="<?=$m->id;?>"><?=$m->segmento;?></option>
												<?php };?>
											</select>
										</div>
										<div class="form-group">
											<label for="p-in" class="col-md-4 label-heading">Obsrevações</label>
											<div class="col-md-6 ui-front">
												<textarea class="form-control" id="obs" name="obs" rows="3"></textarea>
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default"
												data-dismiss="modal">Sair</button>
											<input type="submit" class="btn btn-primary" value="Adicionar Evento">
											<?php echo form_close() ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<script rel="stylesheet" type="text/javascript"
						src="<?php echo base_url() ?>scripts/fullcalendar/fullcalendar.js"></script>
					<script rel="stylesheet" type="text/javascript"
						src="<?php echo base_url() ?>scripts/fullcalendar/locale/pt-br.js"></script>
					<script rel="stylesheet" type="text/javascript"
						src="<?php echo base_url() ?>vendor/js/jquery.mask.js"></script>

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
									//$(this).css('background-color', '#bed7f3');
									$('#addModal').modal();
								},
								eventClick: function (event, jsEvent, view) {
									$('#valor').val(event.valor);
									$('#vencimento').val(event.vencimento);
									$('#obs').val(event.obs);
									$('#start_date').val(moment(event.start).format('YYYY/MM/DD HH:mm'));
									if (event.end) {
										$('#end_date').val(moment(event.end).format('YYYY/MM/DD HH:mm'));
									} else {
										$('#end_date').val(moment(event.start).format('YYYY/MM/DD HH:mm'));
									}
									$('#event_id').val(event.id);
									$('#editModal').modal();
									console.log(event);
								},
							});
						});
					</script>

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
							$('#calendar').fullCalendar({});
						});
					</script>

					<script type="text/javascript">
						$(document).ready(function () {
							$('.date').mask('00/00/0000');
							$('.time').mask('00:00:00');
							$('.date_time').mask('00/00/0000 00:00:00');
							$('.cep').mask('00000-000');
							$('.phone').mask('0000-0000');
							$('.phone_with_ddd').mask('(00) 0000-0000');
							$('.phone_us').mask('(000) 000-0000');
							$('.mixed').mask('AAA 000-S0S');
							$('.cpf').mask('000.000.000-00', {
								reverse: true
							});
							$('.cnpj').mask('00.000.000/0000-00', {
								reverse: true
							});
							$('.money').mask('000.000.000.000.000,00', {
								reverse: true
							});
							$('.money2').mask("#.##0,00", {
								reverse: true
							});
							$('.ip_address').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
								translation: {
									'Z': {
										pattern: /[0-9]/,
										optional: true
									}
								}
							});
							$('.ip_address').mask('099.099.099.099');
							$('.percent').mask('##0,00%', {
								reverse: true
							});
							$('.clear-if-not-match').mask("00/00/0000", {
								clearIfNotMatch: true
							});
							$('.placeholder').mask("00/00/0000", {
								placeholder: "__/__/____"
							});
							$('.fallback').mask("00r00r0000", {
								translation: {
									'r': {
										pattern: /[\/]/,
										fallback: '/'
									},
									placeholder: "__/__/____"
								}
							});
							$('.selectonfocus').mask("00/00/0000", {
								selectOnFocus: true
							});
						});
					</script>
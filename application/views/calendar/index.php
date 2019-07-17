<!DOCTYPE html>
<html lang="pt-br">

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
					<!--Modais-->
					<?php echo require('modal_add.php');?> 
					<?php echo require('modal_edit.php');?>					
					<!--Modais-->

						<!--Calendario Brasileiro-->
						<script rel="stylesheet" type="text/javascript" src="<?php echo base_url() ?>scripts/fullcalendar/fullcalendar.js"></script>
						<script rel="stylesheet" type="text/javascript" src="<?php echo base_url() ?>scripts/fullcalendar/locale/pt-br.js"></script>
						<script rel="stylesheet" type="text/javascript" src="<?php echo base_url() ?>vendor/js/jquery.mask.js"></script>


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
										document.getElementById("add_data").value = date.format('YYYY-MM-DD HH:MM:SS');
										//var dt = document.getElementById("add_data").value;
										//console.log(dt);
										$('#addModal').modal();
									},
									eventClick: function (event, jsEvent, view) {
										$('#valor').val(event.valor);
										$('#vencimento').val(event.vencimento);
										$('#obs').val(event.obs);
										$('#id').val(event.id);
										$('#editModal').modal();
										console.log(event);
									},
									eventLimit: true									
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
								$('.ip_address').mask('089.089.089.089');
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

							document.querySelector("#delete").addEventListener("click", function(){
								if(document.querySelector("#delete").checked){
									document.getElementById("btn").value = "Deletar Registro";	
								}else{
									document.getElementById("btn").value = "Atualizar Registro";

								}
							})
						</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<div class="container">
	<div class="card">
		<h3 class="card-header text-dark bg-light">
			Relatórios
		</h3>
		<div class="container">
			<div class="row mt-5">
				<div class="col-sm-6">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Lucro Líquido</h5>
							<canvas id="primeiroGrafico"></canvas>
							<script>
								var primeiroGrafico = document.getElementById('primeiroGrafico').getContext('2d');
								var chart = new Chart(primeiroGrafico, {
									type: 'line',
									data: {
										labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun'],

										datasets: [{
											label: 'Fluxo Caixa Mensal',
											data: [480000, 250000, 480000, 500000, 470000, 1000000],

											borderColor: "#0000ff"
										}]
									}
								});

							</script>
						</div>
					</div>
				</div>
				<div class="col-sm-6 mt-5 mb-5">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Fluxo do Lucro Bruto</h5>
							<canvas id="segundoGrafico"></canvas>
							<script>
								var segundoGrafico = document.getElementById('segundoGrafico').getContext('2d');
								var chart = new Chart(segundoGrafico, {
									type: 'line',
									data: {
										labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun'],
										datasets: [{
											label: 'Fluxo Caixa Mensal',
											data: [480000, 1850000, 980000, 980000, 870000, 2000000],

											borderColor: "#0000ff"
										}]
									}
								});

							</script>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-6">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Fluxo do lucro líquido</h5>
							<canvas id="terceiroGrafico"></canvas>
							<script>
								var terceiroGrafico = document.getElementById('terceiroGrafico').getContext('2d');
								var chart = new Chart(terceiroGrafico, {
									type: 'line',
									data: {
										labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun'],

										datasets: [{
											label: 'Fluxo Caixa Mensal',
											data: [180000, 850000, 380000, 980000, 870000, 2000000],

											borderColor: "#0000ff"
										}]
									}
								});

							</script>
						</div>
					</div>
				</div>
				<div class="col-sm-6 mb-5">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Contas a Receber do Mês</h5>
							<canvas id="quartografico"></canvas>
							<script>
								var quartografico = document.getElementById('quartografico').getContext('2d');
								var chart = new Chart(quartografico, {
									type: 'line',
									data: {
										labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun'],

										datasets: [{
											label: 'Fluxo Caixa Mensal',
											data: [900000, 350000, 1000000, 650000, 870000, 1000000],

											borderColor: "#0000ff"
										}]
									}
								});

							</script>
						</div>
					</div>
				</div>
			</div>


		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
		integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
		integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
	</script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
		integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
	</script>

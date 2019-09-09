<div class="container">
	<div class="card">
		<h3 class="card-header text-dark bg-light">
			Boletos a Vencer
			</h3>
		<div class="container">

<<<<<<< HEAD
		<form>
		<form method="post" class="col-8 offset-2" action="<?=base_url("supervisor/procuraBoletosAVencer");?>">
			<h3 class="text-center mt-5">Buscar por Data</h3>
			<div class="row mb-5 mt-5">
				<div class="col ml-5">
				<div class="col-4">
					<label for="inputInicio">Data Início</label>
					<input type="text" class="form-control col-md-9" placeholder="Data Início">
					<input type="date" class="form-control" name="inicio" placeholder="Data Início">
				</div>
				<div class="col">
				<div class="col-4">
					<label for="inputFim">Data Fim</label>
					<input type="text" class="form-control col-md-9" placeholder="Data Fim">
=======
		<form method="post" class="col-8 offset-2" action="<?=base_url("supervisor/procuraBoletosAVencer");?>">
			<h3 class="text-center mt-5">Buscar por Data</h3>
			<div class="row mb-5 mt-5">
				<div class="col-4">
					<label for="inputInicio">Data Início</label>
					<input type="date" class="form-control" name="inicio" placeholder="Data Início">
				</div>
				<div class="col-4">
					<label for="inputFim">Data Fim</label>
>>>>>>> eb25f9b2cc328f492d6756dbf2907845e4bbf339
					<input type="date" class="form-control" name="fim" placeholder="Data Fim">
				</div>
				<div class="col-4">
					<label>&nbsp</label>
					<button type="submit" class="form-control btn btn-success">Buscar</button>	
				</div>		
			</div>

		</form>


			<div class="row">
			<?php if(isset($boletos)){ ;?>
				<table class="table table-hover row-12">
					<thead>
						<tr>

						</tr>
					</thead>
					<tbody>

						<?php foreach($boletos as $b){; ?>
						<tr>
							<td><?=$b->codigo_de_barras;?></td>

						<?php };?>
					</tbody>
				</table>
			<?php } ;?>
			</div>
		</div>


<div class="container">
	<div class="card">
		<h3 class="card-header text-dark bg-light">
			Boletos Pagos
			</h3>
		<div class="container">
<<<<<<< HEAD
			<h3 class="text-center mt-5">Buscar por Data</h3>

		<!--<form action="<?=base_url('supervisor/resultado/')?>" method="post">

		<form method="post" class="col-8 offset-2" action="<?=base_url("supervisor/procuraBoletosPagos");?>">
			<h3 class="text-center mt-5">Buscar por Data</h3>
			<div class="row mb-5 mt-5">
				<div class="col ml-5">
				<div class="col-4">
					<label for="inputInicio">Data Início</label>
					<input type="text" type="search" name="buscainicio" id="buscainicio" class="form-control col-md-9" placeholder="Data Início">
					<input type="date" class="form-control" name="inicio" placeholder="Data Início">
				</div>
				<div class="col">
				<div class="col-4">
					<label for="inputFim">Data Fim</label>
					<input type="text" type="search" name="buscafim" id="buscafim" class="form-control col-md-9" placeholder="Data Fim">
=======
		
		<form method="post" class="col-8 offset-2" action="<?=base_url("supervisor/procuraBoletosPagos");?>">
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

<<<<<<< HEAD
			<form class="form-inline mt-3 mb-5" action="<?=base_url('supervisor/resultado/')?>" method="post">
                <input class="form-control mr-sm-2" type="search" name="busca" id="busca" placeholder="Data Ínicio" aria-label="Pesquisar">
                <button class="btn btn-primary my-2 my-sm-0" type="submit">Pesquisar</button>
            </form>
		</form>

			<div class="row">
				<table id="listar" class="table table-hover row-12">
=======
		</form>

			<div class="row">
>>>>>>> eb25f9b2cc328f492d6756dbf2907845e4bbf339
			<?php if(isset($boletos)){ ;?>
				<table class="table table-hover row-12">
					<thead>
						<tr>
							<th scope="col">Código De Barras</th>
							<th scope="col">Beneficiário</th>
							<th scope="col">Status</th>
							<th scope="col">Segmento</th>
							<th scope="col">Valor</th>
						</tr>
					</thead>
					<tbody>

						<?php foreach($boletos as $b){; ?>
						<tr>
							<td><?=$b->codigo_de_barras;?></td>
							<td><?=$b->beneficiario;?></td>
							<td><?=$b->status;?></td>
							<td><?=$b->segmento;?></td>
							<td><?=$b->valor;?></td>
						</tr>
						<?php };?>
					</tbody>
				</table>
			<?php } ;?>
			</div>
		</div>


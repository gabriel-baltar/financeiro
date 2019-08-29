<div class="container">
	<div class="card">
		<h3 class="card-header text-dark bg-light">
			Boletos Pagos
		</h3>
		<div class="container">
			<h3 class="text-center mt-5">Buscar por Data</h3>
				
			<form>
			<div class="form-row mt-5">
				<div class="form-group col-md-6">
				<label for="datestart">Data Início</label>
				<input type="text" name="datestart" class="form-control" id="datestart" placeholder="DD/MM/AAAA">
				</div>
				<div class="form-group col-md-6">
				<label for="dateend">Data Fim</label>
				<input type="text" name="dateend" class="form-control" id="dateend" placeholder="DD/MM/AAAA">
				</div>
			</div>
  				<button type="button" class="btn btn-primary mb-5 mt-2">Pesquisar</button>
			</form>

			<div class="row">
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
			</div>
			<nav aria-label="Navegação de página exemplo" class="d-flex justify-content-center">
				<ul class="pagination">
					<li class="page-item"><a class="page-link text-dark" href="#">Anterior</a></li>
					<li class="page-item"><a class="page-link text-dark" href="#">1</a></li>
					<li class="page-item"><a class="page-link text-dark" href="#">2</a></li>
					<li class="page-item"><a class="page-link text-dark" href="#">3</a></li>
					<li class="page-item"><a class="page-link text-dark" href="#">Próximo</a></li>
				</ul>
			</nav>
		</div>


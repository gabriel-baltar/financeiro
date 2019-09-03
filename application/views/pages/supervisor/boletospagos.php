
<div class="container">
	<div class="card">
		<h3 class="card-header text-dark bg-light">
			Boletos Pagos
		</h3>
		<div class="container">
			<h3 class="text-center mt-5">Buscar por Data</h3>

		<!--<form action="<?=base_url('supervisor/resultado/')?>" method="post">
			<h3 class="text-center mt-5">Buscar por Data</h3>
			<div class="row mb-5 mt-5">
				<div class="col ml-5">
					<label for="inputInicio">Data Início</label>
					<input type="text" type="search" name="buscainicio" id="buscainicio" class="form-control col-md-9" placeholder="Data Início">
				</div>
				<div class="col">
					<label for="inputFim">Data Fim</label>
					<input type="text" type="search" name="buscafim" id="buscafim" class="form-control col-md-9" placeholder="Data Fim">
				</div>
			</div>
			<button class="btn btn-primary btn-sm mb-5 ml-5" type="submit">Pesquisar</button>
		</form>-->

			<form class="form-inline mt-3 mb-5" action="<?=base_url('supervisor/resultado/')?>" method="post">
                <input class="form-control mr-sm-2" type="search" name="busca" id="busca" placeholder="Data Ínicio" aria-label="Pesquisar">
                <button class="btn btn-primary my-2 my-sm-0" type="submit">Pesquisar</button>
            </form>

			<div class="row">
				<table id="listar" class="table table-hover row-12">
					<thead>
						<tr>
							<th scope="col">Código De Barras</th>
							<th scope="col">Beneficiário</th>
							<th scope="col">Status</th>
							<th scope="col">Segmento</th>
							<th scope="col">Valor</th>
							<th scope="col">Data Ínicio</th>
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
							<td><?=$b->start;?></td>
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



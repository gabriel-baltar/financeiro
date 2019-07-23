<div class="container">
	<div class="card">
		<h3 class="card-header text-dark bg-light">
			Boletos Vencidos
		</h3>
		<div class="container">
			<div class="row m-4">
				<table class="table table-hover">
					<thead>
						<tr>
							<th scope="col">Beneficiário</th>
							<th scope="col">Status</th>
							<th scope="col">Segmento</th>
							<th scope="col">Valor</th>
							<th scope="col">Código De Barras</th>
						</tr>
					</thead>
					<tbody>
					<?php foreach($boletos as $b){; ?>
						<tr>
							<th><?=$b->beneficiario;?></th>
							<td><?=$b->status;?></td>
							<td><?=$b->segmento;?></td>
							<td><?=$b->valor;?></td>
							<td><?=$b->codigo_de_barras;?></td>
						</tr>
					<?php };?>
					</tbody>
				</table>
			</div>
		</div>
<div class="container">
	<div class="card">
		<h3 class="card-header text-dark bg-light">
			Lista de Convênios
		</h3>
		<div class="container">
			<div class="row">
			<table class="table table-hover">
				<thead>
					<tr>
						<th scope="col">Nome da Empresa</th>
						<th scope="col">Porcentagem do Desconto</th>
						<th scope="col">Telefone</th>
						<th scope="col">Status</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($convenio as $co){;?>
					<tr>
						<th><?=$co->empresa;?> </th>
						<td><?=$co->porcentagem;?></td>
						<td><?=$co->telefone;?></td>
						<td><?=$co->status;?></td>
					</tr>
					<?php } ;?>
				</tbody>
			</table>
			</div>
		</div>
	</div>
</div>

<!--<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
	aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-body mt-4">
				<h4>Processo Realizado:</h4>
				<hr>
			</div>
			<div class="row m-4">
				<div class="col">
					<label for="inputseg">Nome da Empresa</label>
					<input type="text" class="form-control" placeholder="Nome da Empresa" disabled>
				</div>
				<div class="col">
					<label for="inputporcen">Porcentagem</label>
					<input type="text" class="form-control" placeholder="Porcentagem" disabled>
				</div>
			</div>

			<div class="row m-4">
				<div class="col">
					<label for="inputseg">Pessoal Responsável</label>
					<input type="text" class="form-control" placeholder="Pessoal Responsável" disabled>
				</div>
				<div class="col">
					<label for="inputporcen">Telefone</label>
					<input type="text" class="form-control" placeholder="Telefone" disabled>
				</div>
			</div>

			<div class="row m-4">
				<div class="col">
					<label for="inputseg">E-mail</label>
					<input type="text" class="form-control" placeholder="E-mail" disabled>
				</div>
				<div class="col">
					<label for="inputporcen">Duração do Contrato</label>
					<input type="text" class="form-control" placeholder="Duração do Contrato" disabled>
				</div>
			</div>
			<div class="row m-4">
				<div class="col-md-6">
					<label for="inputseg">Tipo de Serviço</label>
					<input type="text" class="form-control" placeholder="Tipos de Serviço" disabled>
				</div>
				<div class="form-group col-md-6">
					<label for="exampleFormControlTextarea1">Observações</label>
					<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
						placeholder="Observações" disabled></textarea>
				</div>
					<div class="form-group ml-3">
						<button type="submit" class="btn btn-primary">Visualizar Contrato</button>
					</div>
			</div>

			</form>
		</div>
	</div>
</div>-->

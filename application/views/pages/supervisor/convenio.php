<div class="container">

	<?php if($this->session->flashdata('msg-sucesso')){ ;?>
	<div class="alert alert-success alert-dismissible fade show" role="alert">
		<?=$this->session->flashdata('msg-sucesso');?>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<?php } ;?>
	<form method="post" action="<?=base_url("supervisor/adicionarConvenio");?>">
		<div class="card">
			<h3 class="card-header text-dark bg-light">
				Adicionar Convênios
			</h3>
			<div class="container">
				<div class="row m-4">
					<div class="col-md-5">
						<label for="name">Nome da Empresa</label>
						<select class="form-control" name="name" id="name">
							<?php foreach($nome as $empresa){ ;?>
							<option value="<?=$empresa->id;?>"><?=$empresa->empresa;?></option>
							<?php };?>
						</select>
					</div>
					<div class="row m-3">
						<button type="button" data-toggle="modal" data-target=".bd-example-modal-lg"
							class="form-control btn btn-primary btn-sm mt-3"><i class="fas fa-plus"></i></button>
					</div>
					<div class="col">
						<label for="porcentagem">Porcentagem</label>
						<input type="text" class="form-control" name="porcentagem" id="porcentagem"
							placeholder="Porcentagem" required>
					</div>
				</div>


				<div class="row m-4">
					<div class="col-md-5">
						<label for="service">Tipo de Serviço</label>
						<select class="form-control" id="service" name="service">
							<?php foreach($servicos as $servico){ ;?>
							<option value="<?=$servico->id;?>"><?=$servico->tipo;?></option>
							<?php } ;?>
						</select>
					</div>

					<div class="form-group  m-2 ml-3">
						<button type="button" data-toggle="modal" data-target=".bd-example-modal-sm2"
							class="form-control btn btn-primary btn-sm mt-4"><i class="fas fa-plus"></i></button>
					</div>

					<div class="form-group col-md-6 ml-4">
						<label for="obs">Observações</label>
						<textarea class="form-control" name="obs" id="obs" rows="3" placeholder="Observações"
							required></textarea>
					</div>

					<div class="form-group ml-3">
						<label for="contrato">Adicionar Contrato</label>
						<input type="file" class="form-control-file" id="contrato">
					</div>

				</div>

				<button type="submit" class="btn btn-primary ml-5 mb-3">Enviar</button>

			</div>
		</div>
	</form>
</div>

<div class="container mt-5">
	<div class="card">

		<div class="container">
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
	</div>
</div>

<!-- MODAL ADICIONAR EMPRESA -->
<form method="post" action="<?=base_url('supervisor/adicionarempresa');?>">
	<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
		aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title col-md-12" id="exampleModalLabel">Adicionar Empresa</h5>
				</div>
				<div class="row m-3">
					<div class="col col-md-6 mt-2">
						<label for="inputname">Nome</label>
						<input type="text" class="form-control" name="inputname" id="inputname" placeholder="Nome"
							required>
					</div>
					<div class="col col-md-6 mt-2">
						<label for="inputphone">Telefone</label>
						<input type="text" class="form-control" name="inputphone" id="inputphone" placeholder="Telefone"
							required>
					</div>
					<div class="col col-md-6 mt-2">
						<label for="inputcontract">Tempo de Contrato</label>
						<input type="text" class="form-control" name="inputcontract" id="inputcontract"
							placeholder="Tempo de Contrato" required>
					</div>
					<div class="col col-md-6 mt-2">
						<label for="inputemail">E-mail</label>
						<input type="email" class="form-control" name="inputemail" id="inputemail" placeholder="E-mail"
							required>
					</div>
					<div class="col col-md-6 mt-2">
						<label for="inputresponsavel">Responsável</label>
						<input type="text" class="form-control" name="inputresponsavel" id="inputresponsavel"
							placeholder="Responsável" required>
					</div>
				</div>
				<div class="form-group row m-1 mb-3">
					<div class="col-md-10">
						<button type="submit" class="btn btn-primary">Adicionar</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>






<!-- MODAL ADICIONAR TIPOS DE SERVIÇOS -->
<form method="post" action="<?=base_url('supervisor/adicionarServico');?>">
	<div class="modal fade bd-example-modal-sm2" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel2"
		aria-hidden="true">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title col-md-12" id="exampleModalLabel2">Adicionar Serviço</h5>
				</div>
				<div class="form-group col-md-12 mt-2">
					<label for="inputservice">Adicionar Serviço</label>
					<input type="service" class="form-control" name="inputservice" id="inputservice"
						placeholder="Adicionar Serviço" required>
				</div>
				<div class="form-group row m-1 mb-3">
					<div class="col-md-10">
						<button type="submit" class="btn btn-primary">Adicionar</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>

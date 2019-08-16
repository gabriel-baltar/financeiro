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
				Contas a Receber
			</h3>
			<div class="container">
				<div class="row m-4">
					<div class="col-md-6">
                    <label for="segment">Segmento</label>
						<input type="text" class="form-control" name="segment" id="segment"
							placeholder="Segmento" required>
					</div>
					<div class="col">
						<label for="porcentagem">Porcentagem</label>
						<input type="text" class="form-control" name="porcentagem" id="porcentagem"
							placeholder="Porcentagem" required>
					</div>
				</div>
				<div class="row m-4">
					<div class="col-md-6">
                    <label for="value">Valor</label>
						<input type="text" class="form-control" name="value" id="value"
							placeholder="Valor" required>
					</div>
					<div class="form-group col-md-6">
					<label for="data">Data</label>
						<input type="text" class="form-control" name="data" id="data"
							placeholder="Porcentagem" required>
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
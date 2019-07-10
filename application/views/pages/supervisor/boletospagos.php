<div class="container">
	<div class="card">
		<h3 class="card-header text-dark bg-light">
			Boletos Pagos
		</h3>
		<div class="container">
			<div class="row m-4">
				<div class="col">
					<label for="inputfavorecido">Favorecido</label>
					<input type="text" class="form-control" placeholder="Favorecido" required>
				</div>
				<div class="col">
					<label for="inputdate">Data de Emissão</label>
					<input type="text" class="form-control date" placeholder="DD-MM-AAAA" data-mask="00/00/0000"
						required>
				</div>
			</div>
			<div class="row m-4">
				<div class="col">
					<label for="inputseg">Data de Vencimento</label>
					<input type="text" class="form-control" placeholder="DD-MM-AAAA" data-mask="00/00/0000" required>
				</div>
				<div class="col">
					<label for="inputstatus">Código de Barra</label>
					<input type="text" class="form-control" placeholder="Código de Barra">
				</div>
			</div>

			<div class="row m-4">
				<div class="col-md-3">
					<label for="valor">Valor a Pagar</label>
					<input type="text" class="form-control money" placeholder="R$ 0.000,00" reverse="true" required>
				</div>
			</div>
			<button type="submit" class="btn btn-primary ml-5 mb-3">Enviar</button>
			</form>
		</div>
	</div>
</div>
</div>

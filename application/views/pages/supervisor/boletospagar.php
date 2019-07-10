<div class="container">
	<div class="card">
		<h3 class="card-header text-dark bg-light">
			Boletos a Pagar
		</h3>
		<div class="container">
			<div class="row m-4">
				<div class="col">
					<label for="inputfavorecido">Favorecido</label>
					<input type="text" class="form-control" placeholder="Favorecido" required>
				</div>
				<div class="col">
					<label for="inputdate">Data de Emissão</label>
					<input type="text" class="form-control" placeholder="Data de Emissão" required>
				</div>
			</div>
			<div class="row m-4">
				<div class="col">
					<label for="inputseg">Data de Vencimento</label>
					<input type="text" placeholder="DD-MM-AAAA" data-mask="00/00/0000" class="form-control" required>
				</div>
				<div class="col">
					<label for="inputstatus">Código de Barra</label>
					<input type="text" class="form-control" placeholder="Código de Barra" required>
				</div>
			</div>

			<div class="row m-4">
				<div class="col-md-3">
					<label for="inputseg">Valor a Pagar</label>
					<input type="text" class="form-control" placeholder=" R$ 000, 00" required>
				</div>
			</div>
			<button type="submit" class="btn btn-primary ml-5 mb-3">Enviar</button>
			</form>
		</div>
	</div>
</div>
</div>
</div>

<script rel="stylesheet" type="text/javascript" src="<?php echo base_url() ?>vendor/js/jquery.mask.js"></script>

<script type="text/javascript">
						$(document).ready(function () {
							$('.date').mask('00/00/0000');
							$('.time').mask('00:00:00');
							$('.date_time').mask('00/00/0000 00:00:00');
							$('.cep').mask('00000-000');
							$('.phone').mask('0000-0000');
							$('.phone_with_ddd').mask('(00) 0000-0000');
							$('.phone_us').mask('(000) 000-0000');
							$('.mixed').mask('AAA 000-S0S');
							$('.cpf').mask('000.000.000-00', {
								reverse: true
							});
							$('.cnpj').mask('00.000.000/0000-00', {
								reverse: true
							});
							$('.money').mask('000.000.000.000.000,00', {
								reverse: true
							});
							$('.money2').mask("#.##0,00", {
								reverse: true
							});
							$('.ip_address').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
								translation: {
									'Z': {
										pattern: /[0-9]/,
										optional: true
									}
								}
							});
							$('.ip_address').mask('099.099.099.099');
							$('.percent').mask('##0,00%', {
								reverse: true
							});
							$('.clear-if-not-match').mask("00/00/0000", {
								clearIfNotMatch: true
							});
							$('.placeholder').mask("00/00/0000", {
								placeholder: "__/__/____"
							});
							$('.fallback').mask("00r00r0000", {
								translation: {
									'r': {
										pattern: /[\/]/,
										fallback: '/'
									},
									placeholder: "__/__/____"
								}
							});
							$('.selectonfocus').mask("00/00/0000", {
								selectOnFocus: true
							});
						});
					</script>
</body>

</html>
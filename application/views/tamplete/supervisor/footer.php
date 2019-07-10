<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
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

<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
	integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous">
</script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
	integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous">
</script>

<script type="text/javascript">
	$(document).ready(function () {
		$('#sidebarCollapse').on('click', function () {
			$('#sidebar').toggleClass('active');
		});
	});
</script>
</body>

</html>
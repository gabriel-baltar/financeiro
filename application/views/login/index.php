<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Login RS Soluções</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link href="<?=base_url('vendor/images/icons/favicon.ico');?>" rel="icon" type="image/png"/>
<!--===============================================================================================-->
	<link  href="<?=base_url('vendor/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css">
<!--===============================================================================================-->
	<link href="<?=base_url('vendor/fonts/font-awesome-4.7.0/css/font-awesome.min.css');?>" rel="stylesheet" type="text/css">
<!--===============================================================================================-->
	<link href="<?=base_url('vendor/fonts/Linearicons-Free-v1.0.0/icon-font.min.css');?>" rel="stylesheet" type="text/css">
<!--===============================================================================================-->
	<link href="<?=base_url('vendor/animate/animate.css');?>" rel="stylesheet" type="text/css">
<!--===============================================================================================-->	
	<link href="<?=base_url('vendor/css-hamburgers/hamburgers.min.css');?>" rel="stylesheet" type="text/css">
<!--===============================================================================================-->
	<link href="<?=base_url('vendor/animsition/css/animsition.min.css');?>" rel="stylesheet" type="text/css">
<!--===============================================================================================-->
	<link href="<?=base_url('vendor/select2/select2.min.css');?>" rel="stylesheet" type="text/css">
<!--===============================================================================================-->	
	<link href="<?=base_url('vendor/daterangepicker/daterangepicker.css');?>" rel="stylesheet" type="text/css">
<!--===============================================================================================-->
	<link href="<?=base_url('vendor/css/util.css');?>" rel="stylesheet" type="text/css">
	<link href="<?=base_url('vendor/css/main.css');?>" rel="stylesheet" type="text/css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-90 p-b-30">
				<form class="login100-form validate-form" method="post" action="<?=base_url("login/login");?>">
					<span class="login100-form-title p-b-40">
						<!-- Icon -->
						<div class="fadeIn first">
							<img src="<?=base_url('vendor/img/rs.png');?>" style="width: 18rem" class="rounded" alt="imagem-responsiva">
						</div>
					</span>

					<div>
					</div>

					<div class="wrap-input100 validate-input m-b-10" data-validate="Usuário Inválido!">
						<input class="input100" type="text" name="login" placeholder="Usuário">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-20" data-validate = "Please enter password">
						<span class="btn-show-pass">
							
						</span>
						<input class="input100" type="password" name="senha" placeholder="Senha">
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn mb-5">
							Entrar
						</button>
					</div>
					
				</form>
			</div>
		</div>
	</div>
	
	
<!--===============================================================================================-->
	<script src="<?=base_url('vendor/jquery/jquery-3.2.1.min.js');?>"></script>
<!--===============================================================================================-->
	<script src="<?=base_url('vendor/animsition/js/animsition.min.js');?>"></script>
<!--===============================================================================================-->
	<script src="<?=base_url('vendor/bootstrap/js/popper.js');?>"></script>
	<script src="<?=base_url('vendor/bootstrap/js/bootstrap.min.js');?>"></script>
<!--===============================================================================================-->
	<script src="<?=base_url('vendor/select2/select2.min.js');?>"></script>
<!--===============================================================================================-->
	<script src="<?=base_url('vendor/daterangepicker/moment.min.js');?>"></script>
	<script src="<?=base_url('vendor/daterangepicker/daterangepicker.js');?>"></script>
<!--===============================================================================================-->
	<script src="<?=base_url('vendor/countdowntime/countdowntime.js');?>"></script>
<!--===============================================================================================-->
	<script  src="<?=base_url('js/main.js');?>"></script>

</body>
</html>
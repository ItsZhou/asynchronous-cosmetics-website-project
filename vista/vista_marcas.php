<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8" />
		<title>Listado Cosmetica</title>
		<link rel="stylesheet" type="text/css" href="css/general.css">
		<link rel="stylesheet" type="text/css" href="css/generalheader.css">
		<link rel="stylesheet" type="text/css" href="css/marcas.css">
		<link rel="stylesheet" type="text/css" href="css/marcasheet.css">
		<link rel="stylesheet" type="text/css" href="css/toggle.css">

		<script src="js/login.js"></script>
		<script src="js/toggle.js"></script>

		<script>
			/*function validateform() {
				email = loginform.email.value;

				password = loginform.password.value;
				if (email.length )
			}*/
		</script>
		<style>
		</style>
	</head>
	<body>
		<div class='wrapper'>
			<div class='subwrapper'>
				<header>
					<?php
						echo $header;
					?>
					<nav>
						<?php
							echo $categoriasSheet;
						?>
						<!--<div class='dropdown'>
							<div>MAQUILLAJE</div>
							<div class='dropdown-content'>
								<div class='subcategory'>Rostro</div>
									<div class='dropdown-contenttype'>
										<a href='marcasheet.php'>Iluminador</a>
										<a href='marcasheet.php'>Base de Maquillaje</a>
									</div>
								<div class='subcategory'>Ojos</div>
								<div class='dropdown-contenttype'>
									<a href='marcasheet.php'>Ojo1</a>
									<a href='marcasheet.php'>Ojo 2</a>
								</div>
							</div>
						</div>-->
						<div class='dropdown'>
							<span class='titulomarca'><a href='categoriasheet.php'>MARCAS</a></span>
								<div class='dropdown-content'>
									<?php
										echo $listMarcas;
									?>
								</div>
						</div>
					</nav>
				</header>
					<h1>Listado Marcas</h1>
					<?php
						echo $divMarcas;
					?>
			</div>
		</div>
	</body>
</html>
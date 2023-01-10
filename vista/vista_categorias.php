<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8" />
		<title>Listado Cosmetica</title>
		<link rel="stylesheet" type="text/css" href="css/general.css">
		<link rel="stylesheet" type="text/css" href="css/generalheader.css">
		<!--<link rel="stylesheet" type="text/css" href="css/categorias.css">-->
		<link rel="stylesheet" type="text/css" href="css/main.css">

		<script src="js/login.js"></script>

		<script src="js/search.js"></script>
		<script src="js/mod004_presentacion.js"></script>
		<link rel="stylesheet" type="text/css" href="css/search.css">

		<script src="https://code.jquery.com/jquery-3.6.1.js"
        integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
        crossorigin="anonymous"></script>

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
			</div>
		</div>
		
	</body>
</html>
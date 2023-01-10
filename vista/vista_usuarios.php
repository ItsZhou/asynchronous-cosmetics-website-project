<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8" />
		<title>Listado Usuarios</title>
		<link rel="stylesheet" type="text/css" href="css/general.css">
		<link rel="stylesheet" type="text/css" href="css/generalheader.css">
		<link rel="stylesheet" type="text/css" href="css/usuarios.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<link rel="stylesheet" type="text/css" href="css/commons.css">
		<link rel="stylesheet" type="text/css" href="css/subcategoriasproductos.css">
		
		<script src="js/login.js"></script>
		<script src="js/fotodetalleusuarios.js"></script>
		<script src="js/newUser.js"></script>
		
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
				<main>
					<h1>Listado Usuarios</h1>
					<?php
						echo $divUsuarios;
					?>
				</main>
			</div>
		</div>
	
		<div class='overlay hiddenD'>
            <section>
                <h1>Alta nuevo usuario</h1>
					<article>
						<form name='newuser' method='POST' onsubmit='return validateNewUser();'> <!-- Suprimimos el action='login.php' porque es modo asincrono  -->
							<div>
								<input type='text' name='nombre' placeholder='Escribe tu nombre' maxlength="15"/>  
							</div>
							<div>
								<input type='text' name='apellido' placeholder='Escribe tus apellidos'/>
							</div>
							<div>
								<label for="fecnacimiento">Fecha de nacimiento:</label>
								<input type="date" name="fecnacimiento">
								<!-- <input type='text' name='fecnacimiento' placeholder='I'/> -->
							</div>
							<div>
								<input type='text' name='direccion' placeholder='Direccion'/>
							</div>
							<div>
								<input type='text' name='correo' placeholder='Correo electronico'/>
							</div>
							<div>
								<input type='text' name='contrasena' placeholder='Contraseña'/>
							</div>
							<div>
								<input type="button" name="grabar" value='Aceptar'>
							</div>
                
                		</form>

					</article>
            </section>

        </div>
	</body>
</html>
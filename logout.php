 <?php
 	session_start();
	
    require ("lib/mod004_presentacion.php");

	mod003_logout();
	
 	/*  if ( isset($_POST[ "email" ], $_POST[ "password" ]) ) {
		$email 		= $_POST[ "email" ];
		$password	= $_POST[ "password" ];
		echo $email . "" . $password;
		$retorno = mod003_logout( $email, $password );
	} else {
		//echo "Algo raro pasa";
	} */

?>

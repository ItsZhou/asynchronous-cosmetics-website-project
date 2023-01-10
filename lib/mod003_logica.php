 <?php
	require ("mod002_accesoadatos.php");
	require ("mod003i_debug.php");
	//require ("internaslogica.php");
	//require ("accesoadisco.php");

	function mod003_getUsuarios() {
		$arDataUsuarios = mod002_getUsuarios();
        

		return $arDataUsuarios;
	}

	function mod003_getFotoUsuarios( $idUser ) {
		$arFotoUsuarios = mod002_getFotoUsuarios( $idUser );
        

		return $arFotoUsuarios;
	}

	function mod003_getDetalleUsuarios( $idUser ) {
		$arDetalleUsuarios = mod002_getDetalleUsuarios( $idUser );
        

		return $arDetalleUsuarios;
	}

	function mod003_getUsuariosSheet( $idUsuario ) {
		$arDataUsuariosSheet = mod002_getUsuariosSheet( $idUsuario );
        

		return $arDataUsuariosSheet;
	}

    function mod003_getMarcas() {
		$arDataMarcas = mod002_getMarcas();
        

		/* Tratar el array para crear una variable que podamos retornar y que podamos utilizar 
		en el fichero presentacion. El tratamiento será en relación a la lógica de negocio. */

		return $arDataMarcas;
	}

	function mod003_getMarcasProductosSheet( $idMarca ) {
		$arDataMarcasProductosSheet = mod002_getMarcasProductosSheet( $idMarca );


		return $arDataMarcasProductosSheet;
	}

	function mod003_getCategorias() {
		$arDataCategorias = mod002_getCategorias();

		return $arDataCategorias;
	}

	function mod003_getCategoriasSheet( $idCategoria ) { // FORMA INICIAL
		$arDataCategoriasSheet = mod002_getCategoriasSheet( $idCategoria );

		return $arDataCategoriasSheet;
	}

	function mod003_getCategoriasSheetMenu() { //FORMA DEL PROFE
		$arDataSubcategories = mod002_getCategoriasSheetMenu();

		if ( $arDataSubcategories[ "status" ][ "codError" ] === "000" ) {
			$arDataMenu[ "status" ] = $arDataSubcategories[ "status" ];
		/* foreach ($arDataSubcategories[ "data" ] as $arDataSubcategory ) {
		                $arDataMenu[ $arDataSubcategory[ "idCategory" ] ] = [];
		            } */
			foreach ($arDataSubcategories[ "data" ] as $arDataSubcategory) {
				if ( !isset( $arDataMenu[ "data" ][ $arDataSubcategory[ "idCategory" ] ] ) ) {
					$arDataMenu[ "data" ][ $arDataSubcategory[ "idCategory" ] ] = [ 
						"nameCategory" => $arDataSubcategory[ "nameCategory" ],
						"subcategories" => []
					];
				}
				if ( !isset( $arDataMenu[ "data" ][ $arDataSubcategory[ "idCategory" ] ][ "subcategories" ][ $arDataSubcategory[ "idSubCategory" ] ]) ) {
					$arDataMenu[ "data" ][ $arDataSubcategory[ "idCategory" ] ][ "subcategories" ][ $arDataSubcategory[ "idSubCategory" ] ] = [ 
						"nameSubCategory" => $arDataSubcategory[ "nameSubCategory" ],
						"types" => []
					];
				}

				$arDataMenu[ "data" ][ $arDataSubcategory[ "idCategory" ] ][ "subcategories" ][ $arDataSubcategory[ "idSubCategory" ] ][ "types" ][ $arDataSubcategory[ "idSubCategoryType" ]] = [
					//"idSubCategoryType" => $arDataSubcategory[ "idSubCategoryType" ],
                    "nameSubCategoryType" => $arDataSubcategory[ "nameSubCategoryType" ]
				];

				/* $arDataMenu[ "data" ][ $arDataSubcategory[ "idCategory" ] ][ "subcategories" ][ $arDataSubcategory[ "idSubCategory" ] ][ "types" ][] = [
					"idSubCategoryType" => $arDataSubcategory[ "idSubCategoryType" ],
                    "nameSubCategoryType" => $arDataSubcategory[ "nameSubCategoryType" ]
				]; */
				/* if ( !isset( $arDataMenu[ "data" ][ $arDataSubcategory[ "idCategory" ]][ "subcategories" ]  ) ) {
					$arDataMenu[ "data" ][ $arDataSubcategory[ "idCategory" ] ][ "subcategories" ] = [ 
						"idSubCategory" => $arDataSubcategory[ "idSubCategory" ],
						"nameSubCategory" => $arDataSubcategory[ "nameSubCategory" ]
					];
				}
				$arDataMenu[ "data" ][ $arDataSubcategory[ "idSubCategory" ] ][ "subcategories" ][ "types" ] [] = [ 
                    "idSubCategoryType" => $arDataSubcategory[ "idSubCategoryType" ],
                    "nameSubCategoryType" => $arDataSubcategory[ "nameSubCategoryType" ]
				
                ]; */
			}
		}
		//dump( $arDataMenu );
		return $arDataMenu; 
	}

	function mod003_getSubCategoriasSheet( $idSubCategoria ) {
		$arDataSubCategoriasSheet = mod002_getSubCategoriasSheet( $idSubCategoria );

		return $arDataSubCategoriasSheet;
	}

	function mod003_getSubCategoriasProductos( $idSubCategoriaProducto) {
		$arDataSubCategoriasProductos = mod002_getSubCategoriasProductos( $idSubCategoriaProducto );

		return $arDataSubCategoriasProductos;
	}

	function mod003_validateUser( $email, $password ) {
        
        $arValidateUser = mod002_validateUser( $email, $password );
		
        if ( $arValidateUser[ "status" ][ "codError" ] === "000" ) {
            if ( $arValidateUser[ "status" ][ "numRows"] === 1 ) {
                echo "Ha ido bien";
                $_SESSION[ "idUser" ]   = $arValidateUser[ "data" ][ 0 ][ "idUser" ];
                $_SESSION[ "nameUser" ] = $arValidateUser[ "data" ][ 0 ][ "nameUser" ];
                header( "Location:categorias.php" ); //Location dirige al controlador que quieres que aparezca una vez loggeado.
            } else {
                echo "Intentas hackearme, no vuelvas a intentarlo.";
               
            }
			
        } else if ( $arValidateUser[ "status" ][ "codError" ] === "001" ) {
            echo "Email y contraseña incorrectos.";
        }
    }

	function mod003_logout() {
		session_destroy();
		//$_SESSION = array();
		header( "Location:main.php" );

	}

	function mod003_getProductosMarcasPaginacion( $idMarca, $initialRow, $amountRowsPerPage ) {
        $arProductosMarcas = mod002_getProductosMarcasPaginacion( $idMarca, $initialRow, $amountRowsPerPage );
        $arTotalProductosMarcas = mod002_getTotalProductosMarcasPaginacion( $idMarca );

        if ( $arTotalProductosMarcas[ "status" ][ "codError" ] === "000" ) {
            $totalRows = $arTotalProductosMarcas[ "data" ][ 0 ][ "totalProductosMarcas" ];
        
            if ( $arProductosMarcas[ "status" ][ "codError" ] === "000" ) {
                $arProductosMarcas[ "totalRows" ] = $totalRows;
            } 
        }
        
        return $arProductosMarcas;
    }

	function mod003_getUsuariosPaginacion( $initialRow, $amountRowsPerPage ) {
        $arUsuarios = mod002_getUsuariosPaginacion( $initialRow, $amountRowsPerPage );
        $arTotalUsuarios = mod002_getTotalUsuariosPaginacion();

        if ( $arTotalUsuarios[ "status" ][ "codError" ] === "000" ) {
            $totalRows = $arTotalUsuarios[ "data" ][ 0 ][ "totalUsuarios" ];
        
            if ( $arUsuarios[ "status" ][ "codError" ] === "000" ) {
                $arUsuarios[ "totalRows" ] = $totalRows;
            } 
        }
        
        return $arUsuarios;
    }

	function mod003_saveNewUser( $nameUser, $surnameUser, $birthUser, $addressUser, $emailUser, $passwordUser ) {
        return mod002_saveNewUser( $nameUser, $surnameUser, $birthUser, $addressUser, $emailUser, $passwordUser );
    }

	function mod003_search( $itemToSearch ) {

        // OK. array_merge falla cuando uno de los arrays no devuelve datos.
        // OK. No hay nada que devuelva Sin datos.
        // hay que hacer busquedas por palabras tecleadas.( cuando son dos palabras)
        // Cuando son 3 palabras hay que hacer otros tipos de busquedas.
        // Si las palabras tienen artículos( un, el, la, y ) hay que decidir.
        // Que pasa con las tildes, las comillas, los carracteres especiales.

        
        $arDataMarcas = mod002_getMarcasSearch( $itemToSearch );
        if ( $arDataMarcas[ "status" ][ "codError"] === "001" ) {
            $arDataMarcas[ "data" ] = [];
        }
        
        $arWords = explode( " ", $itemToSearch );	//explode() el primer argumento es el delimitador(en este caso espacio en blanco) y el segundo argumento es la cadena.
        //dump( $arWords );
        if ( count( $arWords ) > 1 ) {
            foreach ( $arWords as $word ) {
                //dump( $word );
                $arDataMarcas.= mod002_getMarcasSearch( $word );
            }
        }

        $arDataProducts = mod002_getProductosSearch( $itemToSearch );
        if ( $arDataProducts[ "status" ][ "codError"] === "001" ) {
            $arDataProducts[ "data" ] = [];
        }
        $arDataSearch = array_merge( $arDataMarcas[ "data" ], $arDataProducts[ "data" ] );

        //dump( $arDataSearch );



        return $arDataSearch;
    }

?>

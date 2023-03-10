<?php
	require ("mod003_logica.php");

	function mod004_getUsuarios() {
		$arDataUsuarios = mod003_getUsuarios();

            $listUsuarios = "<div class='users'>";
            $listUsuarios.= "<div class='nameusers'>";
            if ( $arDataUsuarios[ "status" ][ "codError" ] === "000" ) {
                foreach ($arDataUsuarios[ "data" ] as $arDataUsuario ) {
                    $listUsuarios.= "<p data-idUser='{$arDataUsuario[ "idUser" ]}' title='Obtener foto usuario' class='nombreusuario'>{$arDataUsuario[ "nameUser" ]} {$arDataUsuario[ "surnameUser" ]}</span></p>";
                }  //data-idUser es como la etiqueta 'a href'
                $listUsuarios.= "<p class='newUser'>Añadir usuario</p>";
            } else if ( $arDataUsuarios[ "status" ][ "codError" ] === "001" ) {
                // Sin datos.
                $listUsuarios.= "<p>No tenemos datos de los usuarios solicitados.</p>";
            }
            $listUsuarios.= "</div>";
            $listUsuarios.= "<div class='fotousers'></div>";
            $listUsuarios.= "</div>";
            return $listUsuarios;
        }

    function mod004_getFotoUsuarios( $idUser ) {
        $arFotoUsuarios = mod003_getFotoUsuarios( $idUser );

        $fotoUsuarios = "";
        if ( $arFotoUsuarios[ "status" ][ "codError" ] === "000" ) {
            foreach( $arFotoUsuarios[ "data" ] as $dataUsuario ) {
                $fotoUsuarios.= "<div class='fotousuario'>";
                $fotoUsuarios.=     "<a href='controladordetalleusuarios.php?idUser={$dataUsuario[ "idUser" ]}'>";
                $fotoUsuarios.=         "<img data-idUser='{$dataUsuario[ "idUser" ]}' src='{$dataUsuario[ "photoUser" ]}' class='width100' />";
                $fotoUsuarios.=     "</a>";
                $fotoUsuarios.= "</div>";
            }
        } else if ( $arDataUsuarios[ "status" ][ "codError" ] === "001" ) {
            $fotoUsuarios.= "<p>No hay fotos disponibles.</p>";
        }
       
        return $fotoUsuarios;
    }

    function mod004_getDetalleUsuarios( $idUser ) {
        $arDetalleUsuarios = mod003_getDetalleUsuarios( $idUser );

        $detalleUsuarios = "";
        if ( $arDetalleUsuarios[ "status" ][ "codError" ] === "000" ) {
            foreach( $arDetalleUsuarios[ "data" ] as $dataUsuario ) {
                
                $detalleUsuarios.= "<div class='overlaydetalle'>";
                $detalleUsuarios.= "<section>";
                $detalleUsuarios.= "<article>";
                $detalleUsuarios.= "<p>Dirección: {$dataUsuario[ "addressUser" ]}</p>";
                $detalleUsuarios.= "<p>Correo electrónico: {$dataUsuario[ "emailUser" ]}</p>";
                $detalleUsuarios.= "<p>Teléfono: {$dataUsuario[ "telephoneUser" ]}</p>";
                $detalleUsuarios.= "</article>";
                $detalleUsuarios.= "</section>";
                $detalleUsuarios.= "</div>";
            }
        } else if ( $arDetalleUsuarios[ "status" ][ "codError" ] === "001" ) {
            $detalleUsuarios.= "<p>No hay datos disponibles.</p>";
        }
       
        return $detalleUsuarios;

    }

    function mod004_getUsuariosSheet( $idUsuario ) {
		$arDataUsuariosSheet = mod003_getUsuariosSheet( $idUsuario );
        $listUsuariosSheet = "";
        if ( $arDataUsuariosSheet[ "status" ][ "codError" ] === "000" ) {
            foreach ($arDataUsuariosSheet[ "data" ] as $arDataUsuarioSheet ) {
                
                $listUsuariosSheet.= "<table>
                                        <thead>
                                        <tr>
                                            <th>FECHA PEDIDO</th>
                                            <th>NÚMERO DE PEDIDO</th>
                                            <th>TOTAL PEDIDO</th>
                                        </tr>
                                        </thead>
                                        <tbody>";

                $listUsuariosSheet.=    "<tr>
                                            <td>
                                            {$arDataUsuarioSheet[ "dateOrder" ]}
                                            </td>
                                            <td>
                                            {$arDataUsuarioSheet[ "numberOrder" ]}
                                            </td>
                                            <td>
                                            {$arDataUsuarioSheet[ "priceOrder" ]}
                                            </td>
                                        </tr>";
            }
            $listUsuariosSheet.= "</tbody>";
            $listUsuariosSheet.= "<tfoot>";
            $listUsuariosSheet.= "</tfoot>";
            $listUsuariosSheet.= "</table>";

        } else if ( $arDataUsuariosSheet[ "status" ][ "codError" ] === "001" ) {
            $listUsuariosSheet = "";
        }
            
        return $listUsuariosSheet;
    }
	

    function mod004_getMarcas() {
        $arDataMarcas = mod003_getMarcas();
        
       /*  <ul>
            <li>Lakers</li>
            <li>Lakers</li>
            <li>Lakers</li>
            <li>Lakers</li>
        </ul>
 */
/*      $listMarcas = "<ul>";
        foreach ($arDataMarcas as $arDataMarca ) {
            $listMarcas.=  "<li>{$arDataMarca[ 1 ]}</li>";
        }
        $listMarcas.= "</ul>";

        return $listMarcas;
*/
        if ( $arDataMarcas[ "status" ][ "codError" ] === "000" ) {
            $listMarcas = "";
        
            foreach ( $arDataMarcas[ "data" ] as $arDataMarca ) {

                $listMarcas.=  "<p><span class='nombremarca'><strong><a href='marcasheet.php?idMarca={$arDataMarca[ "idBrand" ]}'> {$arDataMarca[ "nameBrand" ]}</a></strong></span></p>";
                $listMarcas.= "<div><img src='{$arDataMarca[ "photoBrand" ]}'></div>";
                $listMarcas.=  "<span class='descripcionmarca'>{$arDataMarca[ "descriptionBrand" ]}</span>";
                
            }
            
        } else if ( $arDataMarcas[ "status" ][ "codError" ] === "001" ) {
            $listMarcas = "";
        }

        return $listMarcas;
    }

    function mod004_getMarcasMenu() {
        $arDataMarcas = mod003_getMarcas();
        
        if ( $arDataMarcas[ "status" ][ "codError" ] === "000" ) {
            $listMarcas = "";
        
            foreach ( $arDataMarcas[ "data" ] as $arDataMarca ) {
                $listMarcas.= "<span class='nombremarca'><a href='productosmarcaspaginacion.php?idMarca={$arDataMarca[ "idBrand" ]}'> {$arDataMarca[ "nameBrand" ]}</a></span>";
                
            }
            
        } else if ( $arDataMarcas[ "status" ][ "codError" ] === "001" ) {
            $listMarcas = "";
        }

        return $listMarcas;
    }

    function mod004_getMarcasProductosSheet( $idMarca ) {
        $arDataMarcasProductosSheet = mod003_getMarcasProductosSheet( $idMarca );
        //dump($arDataMarcasProductosSheet);
        if ( $arDataMarcasProductosSheet[ "status" ][ "codError" ] === "000" ) {
            $marcasSheet="";
            foreach ( $arDataMarcasProductosSheet[ "data" ] as $arDataMarcasProductoSheet) {
        
                foreach ($arDataMarcasProductoSheet as $key=> $info) {
                    // dump($info);
                    // $key es el titulo de la informacion que queremos.ej:[ "nameProduct"]
                    // $marcasSheet.= "<p>$key</p>";
                    // OPCION 1.
                    /*switch ( $key ) {
                        case "nameProduct":
                            $marcasSheet.= "<p><strong>$info</strong></p>";
                            break;
                        case "descriptionProduct":
                            $marcasSheet.="<p>$info</p>";
                            break;
                        case "photoProduct":
                            $marcasSheet.="<p><img src='$info'/></p>";
                            break;
                        
                        case "priceProduct":
                            $marcasSheet.="<p><strong>$info</strong></p>";
                            break;
                    }*/
                }
                // OPCION 2.
                $marcasSheet.=  "<p><span class='nombreproducto'><strong>{$arDataMarcasProductoSheet [ "nameProduct"]}</strong></span></p>";
                $marcasSheet.=  "<p><span class='descripcionproducto'>{$arDataMarcasProductoSheet [ "descriptionProduct"]}</span></p>";
                $marcasSheet.=  "<img src='{$arDataMarcasProductoSheet [ "photoProduct"]}' class='fotoproducto'/>";
                $marcasSheet.=  "<p><span class='precioproducto'><strong>{$arDataMarcasProductoSheet [ "priceProduct"]}</strong></span></p>";
                }
        
        } else if ( $arDataProductosSheet[ "status" ][ "codError" ] === "001" ) {
            $marcasSheet = "";
        } else {

        }
        return $marcasSheet;
    }

    function mod004_getCategorias() {
        $arDataCategorias = mod003_getCategorias();

        $listCategorias = "";
        if ($arDataCategorias [ "status" ][ "codError" ] === "000" ) {
            foreach ( $arDataCategorias [ "data" ] as $arDataCategoria ) {
                $listCategorias.= "<p><span class='nombrecategoria'><strong><a href='categoriasheet.php?idCategoria={$arDataCategoria [ "idCategory" ]}'> {$arDataCategoria[ "nameCategory" ]}</a></strong></span></p>";
                $listCategorias.= "<span class='iconocategoria'><img src='{$arDataCategoria [ "iconoCategory" ]}'/></span>";

            }

        } else if ( $arDataCategorias[ "status" ][ "codError" ] === "001" ) {
            $listCategorias = "";
        }

        return $listCategorias;
    }


    function mod004_getCategoriasSheet( $idCategoria ) {
        $arDataCategoriasSheet = mod003_getCategoriasSheet( $idCategoria );
        //dump($arDataCategoriasSheet);

        $categoriasSheet = "";
        if ($arDataCategoriasSheet [ "status" ][ "codError" ] === "000" ) {
            foreach ( $arDataCategoriasSheet [ "data" ] as $arDataCategoriaSheet ) {
                
                $categoriasSheet.= "<p><span class='nombresubcategoria'><strong><a href='subcategoriasheet.php?idSubCategoria={$arDataCategoriaSheet [ "idSubCategory" ]}'>{$arDataCategoriaSheet [ "nameSubCategory" ]}</strong></a></span></p>";

            }

        } else if ( $arDataCategoriasSheet[ "status" ][ "codError" ] === "001" ) {
            $categoriasSheet = "";
        }

        return $categoriasSheet;
    }

    function mod004_getCategoriasSheetMenuOld() { // FORMA MIA
        $arDataCategoriasSheet = mod003_getCategoriasSheet();

        $categoriasSheet = "";
        if ($arDataCategoriasSheet [ "status" ][ "codError" ] === "000" ) {
            foreach ( $arDataCategoriasSheet [ "data" ] as $arDataCategoriaSheet ) {
                
                $categoriasSheet.= "<p><span class='nombresubcategoria'><strong><a href='subcategoriasheet.php?idSubCategoria={$arDataCategoriaSheet [ "idSubCategory" ]}'>{$arDataCategoriaSheet [ "nameSubCategory" ]}</strong></a></span></p>";

            }

        } else if ( $arDataCategoriasSheet[ "status" ][ "codError" ] === "001" ) {
            $categoriasSheet = "";
        }

        return $categoriasSheet;
    }

    function mod004_getCategoriasSheetMenu() { //FORMA DEL PROFE
        $arDataCategoriasSheet = mod003_getCategoriasSheetMenu();
        //dump($arDataCategoriasSheet);

        $categoriasSheet = "";
        if ($arDataCategoriasSheet [ "status" ][ "codError" ] === "000" ) {
            foreach ( $arDataCategoriasSheet[ "data" ] as $arDataCategoriaSheet ) {
                $categoriasSheet.= "<div class='dropdown'>";
				$categoriasSheet.= "<div class='nombrecategoria'>{$arDataCategoriaSheet [ "nameCategory" ]}</div>";
				$categoriasSheet.= "<div class='dropdown-content'>";
                foreach ( $arDataCategoriaSheet[ "subcategories" ] as $arSubcategory ) {
                    $categoriasSheet.= "<div class='subcategory'>{$arSubcategory [ "nameSubCategory" ]}</div>";
                    $categoriasSheet.= "<div class='dropdown-contenttype'>";
                    foreach ( $arSubcategory[ "types" ] as $key => $arSubcategoryType ) {
                        $categoriasSheet.= "<span class='nombresubcategoriatipo'><a href='subcategoriasproductos.php?idSubCategoriaProducto={$key}'>{$arSubcategoryType[ "nameSubCategoryType" ]}</a></span>"; 
                        //"<p><span class='nombresubcategoriatipo'><strong>{$arSubcategoryType [ "nameSubCategoryType" ]}</strong></span></p>";
                    }
                    $categoriasSheet.= "</div>";  
                }
                $categoriasSheet.= "</div>";
                $categoriasSheet.= "</div>";
            }
        } else if ( $arDataCategoriasSheet[ "status" ][ "codError" ] === "001" ) {
            $categoriasSheet = "";
        }
        return $categoriasSheet;
    }

    function mod004_getSubCategoriasSheet( $idSubCategoria ) {
        $arDataSubCategoriasSheet = mod003_getSubCategoriasSheet( $idSubCategoria );
        //dump($arDataCategoriasSheet);

        $subCategoriasSheet = "";
        if ($arDataSubCategoriasSheet [ "status" ][ "codError" ] === "000" ) {
            foreach ( $arDataSubCategoriasSheet [ "data" ] as $arDataSubCategoriaSheet ) {
                
                $subCategoriasSheet.= "<p><span class='nombresubcategoriatipo'><strong><a href='subcategoriasproductos.php?idSubCategoriaProducto={$arDataSubCategoriaSheet [ "idSubCategoryType" ]}'>{$arDataSubCategoriaSheet [ "nameSubCategoryType" ]}</strong></a></span></p>";

            }

        } else if ( $arDataCategoriasSheet[ "status" ][ "codError" ] === "001" ) {
            $subCategoriasSheet = "";
        }

        return $subCategoriasSheet;
    }

    function mod004_getSubCategoriasProductos( $idSubCategoriaProducto ) {
        $arDataSubCategoriasProductos = mod003_getSubCategoriasProductos( $idSubCategoriaProducto );

        $subCategoriasProductos = "<div class='todosproductos'>";
        if ($arDataSubCategoriasProductos [ "status" ][ "codError" ] === "000" ) {
            
            foreach ( $arDataSubCategoriasProductos [ "data" ] as $arDataSubCategoriaProducto ) {
                $subCategoriasProductos.= "<div class='productos'>";
                $subCategoriasProductos.= "<div class='producto'><img src='{$arDataSubCategoriaProducto [ "photoProduct"]}' class='fotoproducto'/></div>";
                $subCategoriasProductos.= "<p><span class='nombresubcategoriaproducto'><strong>{$arDataSubCategoriaProducto [ "nameSubCategoryProduct" ]}</strong></span></p>";
                $subCategoriasProductos.=  "<p><span class='precioproducto'><strong>{$arDataSubCategoriaProducto [ "priceProduct"]}</strong></span></p>";
                $subCategoriasProductos.=  "<p><span class='descripcionproducto'>{$arDataSubCategoriaProducto [ "descriptionProduct"]}</span></p>";
                $subCategoriasProductos.= "</div>";
            }
            
        } else if ( $arDataCategoriasProductos[ "status" ][ "codError" ] === "001" ) {
            $subCategoriasProductos = "";
        }
        $subCategoriasProductos.= "</div>";
        return $subCategoriasProductos;
    }

    function mod004_getProductosMarcasPaginacion( $idMarca, $initialRow, $amountRowsPerPage ) {
        $arProductosMarcas = mod003_getProductosMarcasPaginacion( $idMarca, $initialRow, $amountRowsPerPage );
    
        //dump($arProductosMarcas);
        $listProductosMarcas = "<div class='todosproductos'>"; 
        if ( $arProductosMarcas[ "status" ][ "codError" ] === "000" ) {
            foreach ($arProductosMarcas[ "data" ] as $dataProductosMarcas ) {
                $listProductosMarcas.=  "<div class='productos'>";
                $listProductosMarcas.=  "<div class='producto'><img src='{$dataProductosMarcas [ "photoProduct"]}' class='fotoproducto'/></div>";
                $listProductosMarcas.=  "<p><span class='nombreproducto'><strong>{$dataProductosMarcas [ "nameProduct"]}</strong></span></p>";
                $listProductosMarcas.=  "<p><span class='precioproducto'><strong>{$dataProductosMarcas [ "priceProduct"]}</strong></span></p>";
                $listProductosMarcas.=  "<p><span class='descripcionproducto'>{$dataProductosMarcas [ "descriptionProduct"]}</span></p>";
                $listProductosMarcas.=  "</div>";
            }
            
            $listProductosMarcas.= "<div class='paginationproductosmarcas'>";
            if ( $initialRow !== 0 ) {
                $prevRow = $initialRow - $amountRowsPerPage;
                $listProductosMarcas.= "<a href='productosmarcaspaginacion.php?idMarca=$idMarca&row=$prevRow'>Anterior</a>";
            }
            
            if ( $initialRow + $amountRowsPerPage < $arProductosMarcas[ "totalRows" ] ) {
                $nextRow = $initialRow + $amountRowsPerPage;
                $listProductosMarcas.= "<a href='productosmarcaspaginacion.php?idMarca=$idMarca&row=$nextRow'>Siguiente</a>";
            }
            $listProductosMarcas.= "</div>";
            
            $listProductosMarcas.= "<div class='paginationproductosmarcas'>";
            $totalPages = ceil( $arProductosMarcas[ "totalRows" ] / $amountRowsPerPage );
            for ( $i = 1; $i <= $totalPages; $i++ ) {
                $numRow = ( $i - 1 ) * $amountRowsPerPage;
                $listProductosMarcas.= "<a href='productosmarcaspaginacion.php?idMarca=$idMarca&row=$numRow'>$i</a>";

                //$listPlayers.= "<a href='playerspaginacion.php?row=$numRow' class='actual'>$i</a>";

            }
            $listProductosMarcas.= "</div>";
        }
        
        $listProductosMarcas.= "</div>";
        return $listProductosMarcas;
    }

    function mod004_getUsuariosPaginacion( $initialRow, $amountRowsPerPage ) {
        $arUsuarios = mod003_getUsuariosPaginacion( $initialRow, $amountRowsPerPage );
        $listUsuarios = "";
        if ( $arUsuarios[ "status" ][ "codError" ] === "000" ) {
            foreach ($arUsuarios[ "data" ] as $arDataUsuario ) {
    
                $listUsuarios.=  "<p><span class='nombreusuario'><a href='usuariosheet.php?idUsuario={$arDataUsuario[ "idUser" ]}'> {$arDataUsuario[ "nameUser" ]} {$arDataUsuario[ "surnameUser" ]}</a></span></p>";
                $listUsuarios.=  "<p><span class='direccion'>Dirección: {$arDataUsuario[ "addressUser" ]}</span></p>";
                $listUsuarios.=  "<p><span class='correo'>Correo electrónico: {$arDataUsuario[ "emailUser" ]}</span></p>";
                $listUsuarios.=  "<p><span class='telefono'>Teléfono: {$arDataUsuario[ "telephoneUser" ]}</span></p>";
                $listUsuarios.=  "<br>";
            }
            }
                
            $listUsuarios.= "<div class='paginationusuarios'>";
            if ( $initialRow !== 0 ) {
                $prevRow = $initialRow - $amountRowsPerPage;
                $listUsuarios.= "<a href='usuariospaginacion.php?row=$prevRow'>Anterior</a>";
            }
            
            if ( $initialRow + $amountRowsPerPage < $arUsuarios[ "totalRows" ] ) {
                $nextRow = $initialRow + $amountRowsPerPage;
                $listUsuarios.= "<a href='usuariospaginacion.php?row=$nextRow'>Siguiente</a>";
            }
            $listUsuarios.= "</div>";
            
            $listUsuarios.= "<div class='paginationusuarios'>";
            $totalPages = ceil( $arUsuarios[ "totalRows" ] / $amountRowsPerPage );
            for ( $i = 1; $i <= $totalPages; $i++ ) {
                $numRow = ( $i - 1 ) * $amountRowsPerPage;
                $listUsuarios.= "<a href='usuariospaginacion.php?row=$numRow'>$i</a>";

                //$listPlayers.= "<a href='playerspaginacion.php?row=$numRow' class='actual'>$i</a>";

            }
            $listUsuarios.= "</div>";

            return $listUsuarios;
    } 

    function mod004_getHeader () {
        $header = "<div class='headermain'>
		<div class='logo'>
            <a href='main.php'>
			<img src='Cosmetica/freezia1.png' class='width100'/>
            </a>
		</div>
		<div class='title'>Freezia Cosmetics</div>
        <div id='container'>
		    <div class='toggle'></div>
		</div>
						
		<div class='buscador'> 
            <div>
			    <input type='text' name='buscador'placeholder='Buscar'/>
            </div>
		</div>
		<div class='iniciosesion'>";

            if ( isset ( $_SESSION[ "idUser" ], $_SESSION[ "nameUser" ] ) ) {
                $header.= "<p>Hola {$_SESSION[ "nameUser" ]}</p>";
                $header.= "<p><a href='logout.php'>Logout</a></p>";
        
            } else {
                $header.= "<p class='inisession'>Iniciar Sesión</p>";
            }
						
        $header.= "</div>

            <div class='login hiddenD'> 
                <form name='loginform' method='POST' onsubmit='return validateloginform();' action='login.php'>
                    <div>
                        <input type='text' name='email' placeholder='Direcccion de correo electrónico'/>  
                    </div>
                    <div>
                        <input type='password' name='password' placeholder='Contraseña'/>
                    </div>
                    <div>
                        <input type='submit' name='ir' value='Iniciar Sesion'/>
                    </div>
                    <!--<button class='login'>Iniciar sesión</button>-->
                </form>
            </div>
		</div>";
        
        return $header;
    }
    /* <form name='loginform' method='POST' onsubmit='return validateloginform();' action='login.php'> Aqui ponemos action='login.php' porque es modo sincrono, en asincrono se suprime */
      
    /* function mod004_saveNewUser( $nameUser, $surnameUser, $birthUser, $addressUser, $emailUser, $passwordUser ) {
        $saveNewUser = mod003_saveNewUser( $nameUser, $surnameUser, $birthUser, $addressUser, $emailUser, $passwordUser);
       

        if ( $saveNewPlayer[ "status" ][ "codError" ] === "000" ) {

        }
    }  */
?>

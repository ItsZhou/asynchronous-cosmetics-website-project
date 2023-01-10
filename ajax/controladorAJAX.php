<?php
    require ("../lib/mod004_presentacion.php");

    $action = $_POST[ "action" ];

    switch ( $action ) {
        case "getFotoUsuarios":
            $idUser = $_POST[ "idUser" ];
            $fotoUsuarios = mod004_getFotoUsuarios( $idUser );
        
            echo $fotoUsuarios;
            break;
        case "getDetalleUsuarios":
            if ( isset( $_POST[ "idUser" ] ) ) {
                $idUser = $_POST[ "idUser" ];
                $detalleUsuarios = mod004_getDetalleUsuarios( $idUser );
                
                /*$dataUsuario = "<p>Dirección: Calle Venus, 43</p>";
                $dataUsuario.= "<p>Email: pauli95@gmail.com</p>";
                $dataUsuario.= "<p>Telefono: 698774502</p>";*/
                echo $detalleUsuarios;
            }
            //echo $detalleUsuarios;
            
            break;
        case "saveNewUser":
            if ( isset( $_POST[ "nameUser" ], $_POST[ "surnameUser" ], $_POST[ "birthUser" ], $_POST[ "addressUser" ],
            $_POST[ "emailUser" ], $_POST[ "passwordUser" ]) ) {
               
            $arSaveNewUser = mod003_saveNewUser( $_POST[ "nameUser" ], $_POST[ "surnameUser" ], $_POST[ "birthUser" ], $_POST[ "addressUser" ], $_POST[ "emailUser" ], $_POST[ "passwordUser" ] );
            //echo $arSaveNewUser[ "status" ][ "codError" ] . "-" . $arSaveNewUser[ "status" ][ "insert_id" ]; Esto seria en caso de que quisieramos saber que numero de id tiene un usuario cuando se da de alta
            echo json_encode( $arSaveNewUser ); // Aqui con json_encode codifica directamente el array a formato json y es paso posterior es en el fichero javascript lo decodifico (vease newUser.js)

            }    
            break; 
        case "search":
            if ( isset( $_POST[ "itemToSearch" ], ) ) {

                $arDataSearch =  mod003_search( $_POST[ "itemToSearch" ] );
                echo json_encode( $arDataSearch );
            }
            break;
        case "validateUser":
            break;
        default:
            echo "Te has confundido al teclear. El case no coincide con el action.";
        
    }
?>
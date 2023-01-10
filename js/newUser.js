
window.addEventListener("load", load); // ("load", load) evento "load" quiere decir que cuando se carga la venta se ejecuta la funcion -load- que hemos definido


function validateNewUser() {
    return true;
}
function load() {
    let node;
    node = document.querySelector( ".newUser" ); //newUser es la <p class='newUser> que hemos añadido en el mod_004 
    node.addEventListener( "click", newUser );

    node = document.querySelector( ".overlay" );
    node.addEventListener( "click", hiddenOverlay_click );

}

function newUser() {
    let node = document.querySelector( ".overlay" );
    node.classList.remove( "hiddenD" );

    node = document.querySelector( "form[name='newuser'] input[name='grabar']");
    node.addEventListener( "click", saveNewUser );

}

function hiddenOverlay_click( event ) {
    if ( event.target === this ) {  //event.target === this hace referencia a si pulso en el this(que es el overlay) y coincide con event.target que es lo qe esta fuera del overlay
        //this.classList.add( "hiddenD" );
        //hiddenOverlay ();
        initOverlay();
    }
}

function initOverlay() {
    node = document.querySelector( ".overlay" );
    node.classList.add( "hiddenD" ); 
    newuser.apellido.value = "";
    newuser.fecnacimiento.value = "";
    newuser.direccion.value = "";
    newuser.correo.value = "";
    newuser.contrasena.value = "";
}

function saveNewUser() {
    // Otra forma: con javascript definiendo un evento let node = document.querySelector( "input[name='nombre']" ) y asi con el apellido, email,etc para que el querySelector vaya guardando el dato introducido por el usuario en el campo name.
    const datos = {
        action      : "saveNewUser",		        // es una peticion de la funcion para luego llamarla en el controladorAJAX.php
        nameUser    : newuser.nombre.value,         // aqui estoy recuperando los datos que escribe el usuario, el dato que esciba el usuario en el formulario, lo captura -value-
        surnameUser : newuser.apellido.value,
        birthUser   : newuser.fecnacimiento.value,
        addressUser : newuser.direccion.value,
        emailUser   : newuser.correo.value,
        passwordUser: newuser.contrasena.value,
    }; 

    $.ajax ( {
        url: "ajax/controladorAJAX.php",
        type: "POST",
        data: datos,
        error: function() {
            alert ("Se ha producido un error.");
        },
        success: function ( dataServer ) {
            console.log( "He recibido :" + dataServer );
            const objDataServer = JSON.parse( dataServer );
            console.log( objDataServer );
            //console.log( JSON.parse( dataServer ) );  // json.parse codificar el formato en el lenguaje correspodiente. El formato de json_encode lo transforma en formato de javascript 
            if ( objDataServer[ "status" ][ "codError" ] === "000" ) {     // si queremos comprobar que recibimos los datos bien, se puede hacer if 
                let strNewUser, node;
                
                strNewUser = "<p>";
                strNewUser+= `<a href='controladordetalleusuarios.php?idUser=${objDataServer[ 'status' ][ 'insert_id' ]}'>${newuser.nombre.value}</a>`;
                strNewUser+= "</p>";
                node = document.querySelector( ".newUser" );    //newUser es la <p class='newUser> que hemos añadido en el mod_004
                node.insertAdjacentHTML( 'beforebegin', strNewUser );

                
                initOverlay();
            } else {

            }
            
        }
    });
}

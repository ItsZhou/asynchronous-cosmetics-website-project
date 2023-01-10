window.addEventListener( "load", load );

function load() {
    let node;
    node = document.querySelector( "input[name='buscador']" );
    node.addEventListener( "input", beginSearch );

    // Debería cuando el input estádefinir el evento focus y escribir codigo.
    // Hover sobre los elementos buscados.
    // definir el evento keydown y cuando se pulsa el enter lanzar una busqueda sincrona.
    // Que no busque nada  vacío.
    node.addEventListener( "focus", focusSearch );
}

function focusSearch() {
    console.log( "focus" );
}

function beginSearch( event ) {
    const itemToSearch = this.value;

    const datos = {
        action          : "search",
        itemToSearch    : itemToSearch
    }; 
    console.log( datos );

    $.ajax ( {
        url: "ajax/controladorAJAX.php",
        type: "POST",
        data: datos,
        error: function() {
            alert ("Se ha producido un error.");
        },
        success: function ( dataServer ) {
            let data_html;
            let node;
            console.log( "He recibido :" + dataServer );
            const objDataServer = JSON.parse( dataServer );
            console.log( objDataServer ); 
            data_html = mod004_setOverlaySearch( objDataServer );
            node = document.querySelector( "input[name='buscador']" );
            destroyOverlaySearch ();
            node.insertAdjacentHTML( "afterend", data_html );
            
            node = document.querySelector ( ".wrapper" );
            node.addEventListener( "click", destroyOverlaySearch );

        }
    });  
}

function destroyOverlaySearch () {
    let node = document.querySelector( ".overlaysearch" );
    if ( node !== null ) {
        node.remove();
    }
}

    
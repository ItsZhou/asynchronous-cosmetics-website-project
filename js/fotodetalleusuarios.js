
window.addEventListener("load", loadUsuarios);

    function loadUsuarios() {
        let nodes;
        let node;
        nodes = document.querySelectorAll( ".nombreusuario" );

        nodes.forEach( element => { 								// Element es el node
            element.addEventListener( "click", getFotoUsuarios );
        });

    }

    function hiddenOverlay( event ) {
        console.log( event );
        console.log( event.target );
        if ( event.target === this ) {  //this es el elemento que ha ejecutado el evento 

            this.remove();
        }
    }

    function getFotoUsuarios() {
        console.log( this );
        console.log( this.getAttribute( "data-idUser" ) );
        const datos = {												// const datos = {} es un array asociativo en javascript.Estos son los datos que quiero enviar a $.ajax
            action      : "getFotoUsuarios",
            idUser  	: this.getAttribute( "data-idUser" )
        };

        $.ajax ( {
            url: "ajax/controladorAJAX.php",
            type: "POST",
            data: datos, 											// data: es un argumento y datos: son los datos que vamos a enviar al controlador ajax para que lo ejecute
            error: function() {
                alert ("Se ha producido un error.");
            },
            success: function ( dataServer ) {
                console.log( "He recibido :" + dataServer );
                let node = document.querySelector ( ".fotousers" );
                node.innerHTML = dataServer;

                nodes = document.querySelectorAll( "div.fotousuario img" );
                nodes.forEach( element => {
                    element.addEventListener( "click", getDetalleUsuarios );
            });
            }
        });
    }

    function getDetalleUsuarios( event ) {
        event.preventDefault();		// preventDefault es una funcion que elimina los eventos de las etiquetas <a href></a>, es decir hace que no se ejecute <a href></a>

        /* HACER FUNCION. 
        str_href =  this.parentElement.getAttribute( "href" );
        str_href = 'controladordetailTeam.php?q=futbol&qidTeam=2022&idTeam=12&lang=es';
        needle = ".php?";
        ipos = str_href.indexOf( needle );
        parameters = str_href.substring( ipos + needle.length );
        arParameters = parameters.split( "&" );
        console.log( 'arParameters', arParameters );
        arParameters.forEach(element => {
            param = element.split( "=" );
            console.log( 'param', param );
        }); */

        const datos = {
            action      : "getDetalleUsuarios",		// es una peticion de la funcion para luego llamarla en el controladorAJAX.php
            idUser      : this.getAttribute( "data-idUser" )
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
                let node = document.querySelector( "body" ); 
                
                node.insertAdjacentHTML( 'beforeend', dataServer );
                node = document.querySelector( ".overlaydetalle" );
                node.addEventListener( "click", hiddenOverlay );
                
            }
        });
        
    }
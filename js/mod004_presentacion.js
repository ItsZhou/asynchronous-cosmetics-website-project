function mod004_setOverlaySearch( objDataServer ) {
    
    overlaySearch = "<div class='overlaysearch'>";
    if ( objDataServer.length !== 0 ) {
        objDataServer.forEach(element => {
            console.log( element );
            if ( typeof element.idBrand !== "undefined" ) {
                overlaySearch+= `<a href='marcasheet.php?idMarca=${element.idBrand}'>`;
                overlaySearch+=     `<div class='item'>`;
                overlaySearch+=         `<h5>${element.nameBrand}</h5>`;
                overlaySearch+=     `</div>`;
                overlaySearch+= `</a>`;
            } else {

            }
        });
    } else {
        overlaySearch+=     `<a><div class='item'>`;
        overlaySearch+=         `<p>No hay datos.</p>`;
        overlaySearch+=     `</div></a>`;
    }
    overlaySearch+= `</div>`;
    
    return overlaySearch;
   /*  <div class='overlaysearch'>
        <a href='teamsheet.php?idteam=2'>
            <div class='item'>
                <h5>Celtics</h5>
            </div>
        </a>
        <a href='playerssheet.php?idplayer=3'>
            <div class='item'>
                <h5>Michael Jordan</h5>
                <p>198cm</p>
            </div>
        </a>
    </div> */
}

window.addEventListener( "load", load );

function load() {

var toggle = document.getElementById( "container");
var body = document.querySelector("body");
var headerNode = document.querySelector(".headermain");

headerNode.classList.toggle( "lightheader" );

toggle.onclick = function() {
    toggle.classList.toggle("active");
    body.classList.toggle("dark");
    headerNode.classList.toggle("darkheader");
    headerNode.classList.toggle("lightheader");
    
}


}

/* function changemood () {
    var element 
    toggle.onclick = function() {
    toggle.classList.toggle( "active" );
    body.classList.toggle( "active" );
    }
/* toggle.onclick = function() {
    toggle.classList.toggle( "active" );
    body.classList.toggle( "active" ); */

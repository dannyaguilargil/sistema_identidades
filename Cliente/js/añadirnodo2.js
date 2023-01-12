//CAMBIAR EL COLOR DE UN CUADRO, ENVIANdolo como parametro en nodo
//modifcar tributos css con lo visto anteriormente
//agregar otro div con color
var pol = document.createElement("div");
    pol.setAttribute("class","color1");
    //document.body.childNodes(pol);
    
    var pin=document.getElementById("panama");
    var conte=document.getElementsByTagName("div")[1];
    pin.insertBefore(pol,conte);

    //ultima clase, modificar un css con js
    const cambiar = document.getElementById("cambio")
    cambiar.classList.add("titulogrande")

    //con style cambiarlo en html
    const cambio_style = document.getElementById("stylecambio")
    cambio_style.style.background="red";

function mododark(){
    const cuerpo=document.body
    cuerpo.classList.add("mododar");
    const contenido = document.getElementById("bdark").value
    console.log(contenido)
    if(contenido=='modo dark'){
        console.log(contenido)
        texto_nuevo2 = document.createTextNode("MODO WHITE");
        contenido.appendChild(texto_nuevo2);
        alert(contenido)
    }

}
//otra forma del modo dark con toggle
function modowhite(){
    var cuerpo = document.body
    cuerpo.classList.toggle("modowhite")
}
//
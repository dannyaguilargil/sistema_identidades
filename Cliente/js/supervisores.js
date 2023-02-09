
console.log("entro al script DE AUTOCOMPLETAR");
let names = [
    "CLARA YAMILE CUADROS CASTILLO",    // ASESORA DE PLANEACION Y CALIDAD
    "JAMES SANCHEZ RODRIGUEZ",          // ATENCION Y SALUD PYP
    "BEATRIZ ELENA MIRANDA PINEDO",     //SUBGERENCIA ATENCION EN SALUD SUBGERENCIA ADMINISTRATIVA
    "SORAYA TATIANA CACERES SANTOS",    // SUBGERENCIA ADMINISTRATIVA
    "NATALIA SUESCUN FORTUNA",          // JEFE OFICINA ADMINISTRATIVA LABORAL
    "FEDERICO MIGUEL MARQUEZ HERNANDEZ",//PROFESIONAL ESPECIALIZADO EN SEGURIDAD Y SALUD EN EL TRABAJO
    "BEATRIZ ELENA PARRA SOLANO",       //TESORERO GENERAL
    "MARTIN GIOVANNI RAMIREZ JAUREGUI", //JEFE DE PRESUPUESTO Y CONTABILIDAD
    "YADIRA ELENA GONZALES LUBO",       //PROFESIONAL UNIVERSITARIO APOYO SOCIOECONOMICO
    "RUTH ESMERALDA SILVA REYES",       //ALMACENISTA GENERAL
    "MARIA CAMILA SEPULVEDA GARCIA",    //QUIMICA FARMACEUTICA ATENCION EN SALUD
    "KAMILA YAÑEZ MONDRAGON",           //SERVICIOS GENERALES
    "LUCAS AUGUSTO LIENDO ROMERO",      // JEFE DE OFICINA DE SISTEMAS 
    "ALVARO BECERRA FLORES",            //JEFE DE CONTROL INTERNO
];

let sortedNames = names.sort();
console.log("sortedNames");
let supervisor = document.getElementById("supervisor");
//removeElements();
supervisor.addEventListener("keyup", (e) => {
    
    removeElements();
    for (let i of sortedNames){
        //removeElements();
        //console.log(i);
        if(i.toLowerCase().startsWith(supervisor.value.toLowerCase()) && supervisor.value !=""){
            let listItem = document.createElement("li");
            listItem.classList.add("list-items");
            listItem.style.cursor = "pointer";
            listItem.setAttribute("onclick", "displayNames('"+i+"')");
            let word = "<b>" + i.substr(0, supervisor.value.length) +"</b>";
            word += i.substr(supervisor.value.length);
           // console.log(word);
           listItem. innerHTML = word;
           document.querySelector(".list").appendChild(listItem);
        }
    }
});

function displayNames(value){
    supervisor.value = value;
    removeElements();
}
function removeElements(){
    let items = document.querySelectorAll(".list-items");
    items.forEach((item) => {
        item.remove();
    });
}
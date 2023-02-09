
console.log("entro al script DE AUTOCOMPLETAR");
let names = [
    "UBA PUENTE BARCO",
    "UBA PUENTE AGUA CLARA",
    "UBA COMUNEROS",
    "UBA POLICLINICO",
    "ADMINISTRATIVA",
    "IPS LOMA BOLIVAR", 
    "IPS GUARAMITO", 
    "IPS BOCONO",
    "IPS OSPINA PEREZ",
    "IPS AEROPUERTO",
    "IPS CLARET",
    "IPS LA ERMITA",
    "IPS SEVILLA",
    "IPS  TOLEDO PLATA",
    "IPS SAN LUIS",
    "IPS SAN MARTIN",
    "IPS SAN MATEO",
    "IPS SANTA ANA",
    "IPS CUNDINAMARCA",
    "IPS BELEN",
    "IPS DIVINA PASTORA",
    "IPS EL RODEO",
    "IPS NIÑA CECI",
    "IPS PALMERAS",
    "IPS EL PORTICO",
    "IPS EL CERRITO",
    "IPS CUNDINAMARCA",
    "IPS EL SALADO",
    "IPS GUAIMARAL",

];

let sortedNames = names.sort();
console.log("sortedNames");
let sede = document.getElementById("sede");
//removeElements();
sede.addEventListener("keyup", (e) => {
    
    removeElements();
    for (let i of sortedNames){
        //removeElements();
        //console.log(i);
        if(i.toLowerCase().startsWith(sede.value.toLowerCase()) && sede.value !=""){
            let listItem = document.createElement("li");
            listItem.classList.add("list-items");
            listItem.style.cursor = "pointer";
            listItem.setAttribute("onclick", "displayNames('"+i+"')");
            let word = "<b>" + i.substr(0, sede.value.length) +"</b>";
            word += i.substr(sede.value.length);
           // console.log(word);
           listItem. innerHTML = word;
           document.querySelector(".list").appendChild(listItem);
        }
    }
});

function displayNames(value){
    sede.value = value;
    removeElements();
}
function removeElements(){
    let items = document.querySelectorAll(".list-items");
    items.forEach((item) => {
        item.remove();
    });
}
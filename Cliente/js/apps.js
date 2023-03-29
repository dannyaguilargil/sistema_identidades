
console.log("entro al script DE AUTOCOMPLETAR");
let names = [
    "PUENTE BARCO",
    "PUENTE AGUA CLARA",
    "COMUNEROS",
    "POLICLINICO",
    "ADMINISTRATIVA",
    "LOMA BOLIVAR", 
    "GUARAMITO", 
    "BOCONO",
    "OSPINA PEREZ",
    "AEROPUERTO",
    "CLARET",
    "LA ERMITA",
    "SEVILLA",
    "TOLEDO PLATA",
    "SAN LUIS",
    "SAN MARTIN",
    "SAN MATEO",
    "SANTA ANA",
    "CUNDINAMARCA",
    "BELEN",
    "DIVINA PASTORA",
    "EL RODEO",
    "NIÑA CECI",
    "PALMERAS",
    "EL PORTICO",
    "EL CERRITO",
    "CUNDINAMARCA",
    "EL SALADO",
    "GUAIMARAL",

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
const abrir = document.getElementById("abrirVentana");
const cerrar = document.querySelector('#cerrarVentana');
const nav = document.querySelector("#nav__hamburguesa");

abrir.addEventListener('click',()=>{
    nav.classList.add("visible");
});

cerrar.addEventListener('click',()=>{
    nav.classList.remove("visible");

});

cerrar.onclick = (function(){
    nav.classList.remove("visible");

});

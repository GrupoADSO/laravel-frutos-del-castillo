document.addEventListener("DOMContentLoaded", function() {
    const mostrarDomicilioButton = document.getElementById("mostrarDomicilio");
    const tarjetaDomicilio = document.getElementById("tarjetaDomicilio");
    const cerrarDimicilio = document.getElementById("cerra__domicilio");
    const fondoOscuro = document.getElementById("login-modal")
    

    mostrarDomicilioButton.addEventListener("click", function (e) {
        e.preventDefault();

        if (tarjetaDomicilio.style.display === "none" || tarjetaDomicilio.style.display === "") {
            tarjetaDomicilio.style.display = "block";
            fondoOscuro.style.display = "block"
        } else {
            tarjetaDomicilio.style.display = "none";
            fondoOscuro.style.display = "none"
        }
    });

    cerrarDimicilio.addEventListener("click",function () {
        tarjetaDomicilio.style.display = "none";
        fondoOscuro.style.display = "none"
    });

    

});
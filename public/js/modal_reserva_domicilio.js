document.addEventListener("DOMContentLoaded", function() {

// modal de reserva
const mostrarReservasButton = document.getElementById("mostrarReservas");
const tarjetaReserva = document.getElementById("tarjetaReserva");
const cerrarReserva = document.getElementById("cerra__reserva");
const fondoOscuro = document.getElementById("login-modal")


mostrarReservasButton.addEventListener("click", function (e) {
    e.preventDefault();
        tarjetaReserva.style.display = "block";
        fondoOscuro.style.display = "block"
});

cerrarReserva.addEventListener("click",function () {
    tarjetaReserva.style.display = "none";
    fondoOscuro.style.display = "none"
});

window.addEventListener("click", (event) => {
    if (event.target === fondoOscuro) {
        tarjetaReserva.style.display = "none";
    }
});


// modal de domicilio
const mostrarDomicilioButton = document.getElementById("mostrarDomicilio");
const tarjetaDomicilio = document.getElementById("tarjetaDomicilio");
const cerrarDimicilio = document.getElementById("cerra__domicilio");

mostrarDomicilioButton.addEventListener("click", function (e) {
    e.preventDefault();
        tarjetaDomicilio.style.display = "block";
        fondoOscuro.style.display = "block";
});

cerrarDimicilio.addEventListener("click", function () {
    tarjetaDomicilio.style.display = "none";
    fondoOscuro.style.display = "none";
});

window.addEventListener("click", (event) => {
    if (event.target === fondoOscuro) {
        tarjetaDomicilio.style.display = "none";
    }
});

});

document.addEventListener("DOMContentLoaded", function() {
    const mostrarReservasButton = document.getElementById("mostrarReservas");
    const tarjetaReserva = document.getElementById("tarjetaReserva");
    const cerrarReserva = document.getElementById("cerra__reserva");
    const fondoOscuro = document.getElementById("login-modal")
    

    mostrarReservasButton.addEventListener("click", function (e) {
        e.preventDefault();

        if (tarjetaReserva.style.display === "none" || tarjetaReserva.style.display === "") {
            tarjetaReserva.style.display = "block";
            fondoOscuro.style.display = "block"
        } else {
            tarjetaReserva.style.display = "none";
            fondoOscuro.style.display = "none"
        }
    });

    cerrarReserva.addEventListener("click",function () {
        tarjetaReserva.style.display = "none";
        fondoOscuro.style.display = "none"
    })

});


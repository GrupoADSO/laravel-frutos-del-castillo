function eliminarAlerta(elementID) {
    let elemento = document.getElementById(elementID);
    if (elemento) {
        setTimeout(function () {
            elemento.style.display = 'none';
        }, 6000);
    }
}

eliminarAlerta('mensajeAlertaInicioSession');
eliminarAlerta('mensajeAlertaUsuarioCreado');
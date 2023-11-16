document.addEventListener("DOMContentLoaded", function () {
    const abrirModalBtn = document.getElementById("logoAbrirModal");
    const modal = document.getElementById("modalPerfil");
    const closeModal = document.querySelector(".closeModalUno");
    const pantalla = document.getElementById("login-modal");


    abrirModalBtn.addEventListener("click", function () {
        modal.style.display = "block";
        pantalla.style.display = "block";
        document.body.classList.add('bloquear-body');

    });

    closeModal.addEventListener("click", function () {
        modal.style.display = "none";
        pantalla.style.display = "none";
        document.body.classList.remove('bloquear-body');
    });

    window.addEventListener("click", function (event) {
        if (event.target == pantalla || event.target == modal) {
            pantalla.style.display = "none";
            modal.style.display = "none";
            document.body.classList.remove('bloquear-body');
        }
    });


    // este es el codigo del segundo modal dentro del modal.
    const abrirModalBtnDos = document.getElementById("logoAbrirModalDos");
    const modalDos = document.getElementById("modalSignup");
    const closeModalDos = document.querySelector(".closeModalDos");


    abrirModalBtnDos.addEventListener("click", function () {
        modal.style.display = "none";
        modalDos.style.display = "block";
        pantalla.style.display = "block";
        document.body.classList.add('bloquear-body');

    });

    closeModalDos.addEventListener("click", function () {
        modalDos.style.display = "none";
        pantalla.style.display = "none";
        document.body.classList.remove('bloquear-body');

    });

    window.addEventListener("click", function (event) {
        if (event.target == pantalla || event.target == modalDos) {
            pantalla.style.display = "none";
            modalDos.style.display = "none";
            document.body.classList.remove('bloquear-body');

        }
    });

  
    // este es el codigo del primer modal del click en olvido su contrasena  dentro del modal.
    const abrirModalBtnOlvidar = document.getElementById("modalOlvidarContrasena");
    const modalDosOlvidar = document.getElementById("content_recuperar_contraseña_email");
    const closeModalDosOlvidar = document.querySelector(".cerrarModalOlvidar");


    abrirModalBtnOlvidar.addEventListener("click", function () {
        modal.style.display = "none";
        modalDosOlvidar.style.display = "block";
        pantalla.style.display = "block";
        document.body.classList.add('bloquear-body');

    });

    closeModalDosOlvidar.addEventListener("click", function () {
        modalDosOlvidar.style.display = "none";
        pantalla.style.display = "none";
        document.body.classList.remove('bloquear-body');

    });

    window.addEventListener("click", function (event) {
        if (event.target == pantalla || event.target == modalDosOlvidar) {
            pantalla.style.display = "none";
            modalDosOlvidar.style.display = "none";
            document.body.classList.remove('bloquear-body');

        }
    });

    // este es el codigo del primer modal del click en olvido su contrasena  dentro del modal.
    const abrirModalBtnEnviarCodigo = document.getElementById("abrirModalEnviarCodigo");
    const modalDosEnviar = document.getElementById("modalDosEnviar");
    const closeModalDosEnviar = document.querySelector(".closeModalDosEnviar");


    abrirModalBtnEnviarCodigo.addEventListener("click", function () {
        modal.style.display = "none";
        modalDosEnviar.style.display = "block";
        pantalla.style.display = "block";
        document.body.classList.add('bloquear-body');

    });

    closeModalDosEnviar.addEventListener("click", function () {
        modalDosEnviar.style.display = "none";
        pantalla.style.display = "none";
        document.body.classList.remove('bloquear-body');

    });

    window.addEventListener("click", function (event) {
        if (event.target == pantalla || event.target == modalDosEnviar) {
            pantalla.style.display = "none";
            modalDosEnviar.style.display = "none";
            document.body.classList.remove('bloquear-body');
        }
    });
    

    // modal para crear la nueva contraseña
    const abrirModalBtnCambioContra = document.getElementById("abrirModalCambiarContrasena");
    const modalTresRecuperar = document.getElementById("modalTresRecuperar");
    const closeModalTresCambiarContra = document.querySelector(".closeTresRecuperar");
  
    abrirModalBtnCambioContra.addEventListener("click", function () {
        modal.style.display = "none";
        modalTresRecuperar.style.display = "block";
        pantalla.style.display = "block";
        document.body.classList.add('bloquear-body');
    });
  
    closeModalTresCambiarContra.addEventListener("click", function () {
        modalDosEnviar.style.display = "none";
        pantalla.style.display = "none";
        document.body.classList.remove('bloquear-body');
    });
  
    window.addEventListener("click", function (event) {
        if (event.target == pantalla || event.target == modalDosEnviar) {
            pantalla.style.display = "none";
            modalDosEnviar.style.display = "none";
            document.body.classList.remove('bloquear-body');
        }
    });

    
});


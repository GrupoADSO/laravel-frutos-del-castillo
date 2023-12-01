document.addEventListener("DOMContentLoaded", function () {

  // modal de perfil(editar)
  const openModalBtn = document.getElementById("youreditar");
  const modal = document.getElementById("modal-dos");
  const closeModal = document.querySelector(".custom-close");

  openModalBtn.addEventListener("click", function () {
    modal.style.display = "block";
    document.body.classList.add('bloquear-body');

  });

  closeModal.addEventListener("click", function () {
    modal.style.display = "none";
    document.body.classList.remove('bloquear-body');

  });

  window.addEventListener("click", function (event) {
    if (event.target === modal) {
      modal.style.display = "none";
      document.body.classList.remove('bloquear-body');
    }
  });


  // modal de mis compras(perfil)

  const modalDos = document.getElementById('modal');
  const misComprasButton = document.getElementById('misComprasButton');
  const closeButton = document.getElementById('close__historial');
  
  misComprasButton.addEventListener('click', () => {
    modalDos.style.display = 'block';
    document.body.classList.add('bloquear-body');
    event.preventDefault();
  });
  
  closeButton.addEventListener('click', () => {
    modalDos.style.display = 'none';
    document.body.classList.remove('bloquear-body');
  
  });
  
  window.addEventListener('click', (event) => {
    if (event.target === modalDos) {
      modalDos.style.display = 'none';
      document.body.classList.remove('bloquear-body');
    }
  });
  



});

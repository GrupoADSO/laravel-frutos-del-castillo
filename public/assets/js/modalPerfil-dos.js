document.addEventListener("DOMContentLoaded", function () {
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
});

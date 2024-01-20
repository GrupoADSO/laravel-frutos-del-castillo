// //aqui resolvio bangue
// //traer targeta al modal

function addCartClickedcart(event) {
  event.preventDefault();

  const button = event.target;
  const shopProducts = button.parentElement;
  const imagenSrc = shopProducts.children[0].src;

  const cardContainer = document.createElement("div");
  cardContainer.classList.add("content-modal-cart");
  cardContainer.innerHTML = `<img src="${imagenSrc}" class="imagen-cart-modal">`;

  const traerDiv = document.querySelector(".traer");
  traerDiv.innerHTML = "";
  traerDiv.appendChild(cardContainer);

  const modal = document.getElementById("myModal");
  modal.style.display = "block";

  const closeModalBtn = document.getElementById("closeModalBtn");
  closeModalBtn.addEventListener("click", function () {
    traerDiv.innerHTML = "";
    modal.style.display = "none";
  });
}

document.addEventListener("DOMContentLoaded", function () {
  const modalButtons = document.querySelectorAll(".content__car__menu");
  modalButtons.forEach((button, index) => {
    button.addEventListener("click", (event) => openModal(event));
  });

  const closeModalBtn = document.getElementById("closeModalBtn");
  const modal = document.getElementById("myModal");

  function openModal(event) {
    modal.style.display = "none";
    addCartClickedcart(event);
  }

  closeModalBtn.addEventListener("click", () => (modal.style.display = "none"));

  window.addEventListener("click", (event) => {
    if (event.target === modal) {
      modal.style.display = "none";
    }
  });
});



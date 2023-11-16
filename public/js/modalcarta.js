//aqui resolvio bangue
//traer targeta al modal

function addCartClickedcart(event, cardIndex) {
  event.preventDefault();

  var button = event.target;
  var shopProducts = button.parentElement;
  console.log(shopProducts);

  // Asegúrate de tener la ruta correcta para la imagen
  var imagenSrc = shopProducts.children[0].src;
  var cantidadInput = shopProducts.querySelector(".cantidad");
  var cantidad = cantidadInput ? parseInt(cantidadInput.value) : 1;

  // Crea un nuevo elemento para la tarjeta y agrégala al modal
  var cardContainer = document.createElement("div");

  cardContainer.classList.add("content-modal-cart");
  // cardContainer.classList.add("content__car__menu");

  var cardContent = `
    <img src="${imagenSrc}" class="imagen-cart-modal"> 
   `;

  cardContainer.innerHTML = cardContent;

  var traerDiv = document.querySelector(".traer");
  traerDiv.innerHTML = "";
  traerDiv.appendChild(cardContainer);

  // Abre el modal
  var modal = document.getElementById("myModal");
  modal.style.display = "flex";

  // Agrega un evento al botón de cerrar del modal para limpiar la información
  var closeModalBtn = document.getElementById("closeModalBtn");
  closeModalBtn.addEventListener("click", function () {
    traerDiv.innerHTML = ""; // Limpiar la información
    modal.style.display = "none"; // Cerrar el modal
  });
}

document.addEventListener("DOMContentLoaded", function () {
  var modalButtons = document.querySelectorAll(".content__car__menu");

  modalButtons.forEach(function (button, index) {
    button.addEventListener("click", function (event) {
      openModal(event, index);
    });
  });

  var closeModalBtn = document.getElementById("closeModalBtn");
  var modal = document.getElementById("myModal");

  function openModal(event, cardIndex) {
    // Restablecer el contenido del modal y mostrar la nueva información
    modal.style.display = "none";
    addCartClickedcart(event, cardIndex);
  }

  closeModalBtn.addEventListener("click", function () {
    modal.style.display = "none";
  });

  window.addEventListener("click", function (event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  });
});

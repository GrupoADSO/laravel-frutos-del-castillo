let cartIcon = document.querySelector("#cart-icon");
let cart = document.querySelector(".carrito");
let closeCart = document.querySelector("#close-cart");

cartIcon.onclick = () => {
  cart.classList.add("active");
};

closeCart.onclick = () => {
  cart.classList.remove("active");
};

if (document.readyState == "loading") {
  document.addEventListener("DOMContentLoaded", ready);
} else {
  ready();
}

let cantidadInput; // declarar aquí para que esté disponible en todo el ámbito de la función
let cantidadProductosEnCarrito = 0;

function ready() {
  // remueve los items de las cartas
  let removeCartButton = document.getElementsByClassName("cart-remove");
  for (let i = 0; i < removeCartButton.length; i++) {
    let button = removeCartButton[i];
    button.addEventListener("click", removeCartItem);
  }

  // cambios en la cantidad
  let quantityInputs = document.getElementsByClassName("cantidad");
  for (let i = 0; i < quantityInputs.length; i++) {
    let input = quantityInputs[i];
    input.addEventListener("change", quantityChanged);
  }

  // add to cart
  let addCart = document.getElementsByClassName("add-button");
  for (let i = 0; i < addCart.length; i++) {
    let button = addCart[i];
    button.addEventListener("click", addCartClicked);
  }
}

document
  .querySelector(".clear-button")
  .addEventListener("click", limpiarbutton);

function limpiarbutton() {
  if (confirm("¿Desea borrar todas las compras?")) {
    let cartContent = document.querySelector(".cart-content");
    while (cartContent.firstChild) {
      cartContent.removeChild(cartContent.firstChild);
    }

    document.querySelector(".subtotal").innerText = "$0.00";
    cantidadProductosEnCarrito = 0;
    actualizarContadorCarrito();
  }
}

function removeCartItem(event) {
  let buttonClicked = event.target;
  let cartBox = buttonClicked.closest(".cart-box");
  let cantidadElement = cartBox.querySelector(".cantidad");

  if (cantidadElement !== undefined) {
    let cantidad = parseInt(cantidadElement.value);
    cantidadProductosEnCarrito -= cantidad;
  }

  cartBox.remove();
  updateTotal();
  actualizarContadorCarrito();
}


// function removeCartItem(event) {
//   let buttonClicked = event.target;
//   buttonClicked.parentElement.remove();
//   updateTotal();
//   cantidadProductosEnCarrito--;
//   actualizarContadorCarrito();
// }

function actualizarContadorCarrito() {
  let contadorCarrito = document.querySelector("#contador-carrito");
  contadorCarrito.textContent = cantidadProductosEnCarrito.toString();
}

function quantityChanged(event) {
  let input = event.target;
  if (isNaN(input.value) || input.value <= 0) {
    input.value = 1;
  }
  updateTotal();
}

function addCartClicked(event) {
  event.preventDefault();
  let button = event.target;

  let shopProduct = button.closest(".card__menu");
  let title = shopProduct.querySelector(".parrafo-titulo").textContent;
  let precio = shopProduct.querySelector(".parrafo__price").textContent;
  let imagen = shopProduct.querySelector(".content__car__menu img").src;

  cantidadInput = shopProduct.querySelector(".cantidad");
  let cantidad = cantidadInput ? parseInt(cantidadInput.value) : 1;
  addProductToCart(title, precio, imagen, cantidad);
  updateTotal();
  cantidadProductosEnCarrito += cantidad;
  actualizarContadorCarrito();
}

function addProductToCart(title, precio, imagen, cantidad) {
  let cartShopBox = document.createElement("div");
  cartShopBox.classList.add("cart-box");
  let cartItems = document.querySelector(".cart-content");
  let cartBoxContent = `
  <p class="titulo__carta-carrito">${title}</p>
  <div class="header__card header__card-img">
    <img src="${imagen}" class="imagen-cart">
    </div>
    <div class="detail-box">
        <p class="parrafo__price parrafo__cart-menu">${precio}</p>
        <input type="number" class="cantidad" value="${cantidad}">
        <i class="fa-solid fa-times cart-remove"></i>
        </div>
  
  `;

  cartShopBox.innerHTML = cartBoxContent;
  cartItems.appendChild(cartShopBox);
  cartShopBox
    .getElementsByClassName("cart-remove")[0]
    .addEventListener("click", removeCartItem);
  cartShopBox
    .getElementsByClassName("cantidad")[0]
    .addEventListener("change", quantityChanged);
  updateTotal();
}

function updateTotal() {
  let cartContent = document.querySelector(".cart-content");
  let cartBoxes = cartContent.getElementsByClassName("cart-box");
  let total = 0;
  for (let i = 0; i < cartBoxes.length; i++) {
    let cartBox = cartBoxes[i];
    let priceElement = cartBox.getElementsByClassName("parrafo__price")[0];
    let quantityElement = cartBox.getElementsByClassName("cantidad")[0];

    if (quantityElement !== undefined) {
      let price = parseFloat(priceElement.innerText.replace("$", ""));
      let quantity = quantityElement.value;
      total = total + price * quantity;
    }

    // total = Math.round(total * 100) / 100;
  }
  document.querySelector(".subtotal").innerText = "$" + total;
}

console.log("Title:", title);
console.log("Precio:", precio);
console.log("Imagen:", imagen);
console.log("Cantidad:", cantidadInput);

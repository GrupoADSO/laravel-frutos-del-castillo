let cartIcon = document.querySelector("#cart-icon");
let cart = document.querySelector(".carrito");
let closeCart = document.querySelector("#close-cart");

cartIcon.onclick = () => {
  cart.classList.add("active");
};
closeCart.onclick = () => {
  cart.classList.remove("active");
};

// cart working JS
if (document.readyState == "loading") {
  document.addEventListener("DOMContentLoaded", ready);
} else {
  ready();
}

function ready() {
  // remueve los items de las cartas
  var removeCartButton = document.getElementsByClassName("cart-remove");
  // console.log(removeCartButton);
  for (let i = 0; i < removeCartButton.length; i++) {
    var button = removeCartButton[i];
    button.addEventListener("click", removeCartItem);
  }
  // cambios en la cantidad
  var quantityInputs = document.getElementsByClassName("cantidad");
  for (let i = 0; i < quantityInputs.length; i++) {
    var input = quantityInputs[i];
    input.addEventListener("change", quantityChanged);
  }
  // add to cart
  var addCart = document.getElementsByClassName("add-button");
  for (let i = 0; i < addCart.length; i++) {
    var button = addCart[i];
    button.addEventListener("click", addCartClicked);
  }
}
// Limpiar el carrito de compras
document
  .querySelector(".clear-button")
  .addEventListener("click", limpiarbutton);

function limpiarbutton() {
  if (confirm("¿Desea borrar todas las compras?")) {
    // Elimina todos los elementos del carrito
    var cartContent = document.querySelector(".cart-content");
    while (cartContent.firstChild) {
      cartContent.removeChild(cartContent.firstChild);
    }

    // Establece el total a cero
    document.querySelector(".subtotal").innerText = "$0.00";

    // Reinicia el contador de productos en el carrito
    cantidadProductosEnCarrito = 0;
    actualizarContadorCarrito();
  }
}

// remueve items
function removeCartItem(event) {
  var buttonClicked = event.target;
  buttonClicked.parentElement.remove();
  updateTotal();

  // Disminuye la cantidad de productos en el carrito y actualiza el contador
  cantidadProductosEnCarrito--;
  actualizarContadorCarrito();
}
function actualizarContadorCarrito() {
  var contadorCarrito = document.querySelector("#contador-carrito");
  contadorCarrito.textContent = cantidadProductosEnCarrito.toString();
}

// cambios en la cantidad
function quantityChanged(event) {
  var input = event.target;
  if (isNaN(input.value) || input.value <= 0) {
    input.value = 1;
  }
  updateTotal();
}

// add to cart
let cantidadProductosEnCarrito = 0;
function addCartClicked(event) {
  event.preventDefault();
  var button = event.target;
  //* AQUI SOLUCIONO STID

  var shopProduct = button.closest(".product"); // Buscar el elemento .product más cercano al botón
  var title = shopProduct.querySelector(".parrafo__cart").textContent;
  var precio = shopProduct.querySelector(".parrafo__price").textContent;
  var imagen = shopProduct.querySelector("img").src;

    // comente esta porcion de codigo por que de alguna manera no estaba permitiendo que la imagen llegara correctamente al carrito de compras (jhon agrego este cambio)
  // var shopProducts = button.parentElement.parentElement.parentElement;
  // var title = shopProducts.children[2].textContent;
  // var precio = shopProducts.children[1].textContent;
  // var imagen = shopProducts.children[0].src;


  var cantidadInput = shopProduct.querySelector(".cantidad"); // Obtener el campo de cantidad específico
  var cantidad = cantidadInput ? parseInt(cantidadInput.value) : 1; // Obtener la cantidad o establecerla en 1 por defecto
  addProductToCart(title, precio, imagen, cantidad);
  updateTotal();
  // Incrementa la cantidad de productos en el carrito y actualiza el contador
  cantidadProductosEnCarrito += cantidad;
  actualizarContadorCarrito();
}

function addProductToCart(title, precio, imagen, cantidad) {
  var cartShopBox = document.createElement("div");
  cartShopBox.classList.add("cart-box");
  var cartItems = document.querySelector(".cart-content");
  var cartBoxContent = `
    <img src="${imagen}" class="imagen-cart">
    <div class="detail-box">
        <p class="parrafo__cart">${title}</p>
        <div class="parrafo__price">${precio}</div>
        <input type="number" class="cantidad" value="${cantidad}">
    </div>
    
    <ion-icon name="close-outline" class="cart-remove"></ion-icon>
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

// actualizar total
function updateTotal() {
  var cartContent = document.querySelector(".cart-content");
  var cartBoxes = cartContent.getElementsByClassName("cart-box");
  var total = 0;
  for (let i = 0; i < cartBoxes.length; i++) {
    var cartBox = cartBoxes[i];
    var priceElement = cartBox.getElementsByClassName("parrafo__price")[0];
    var quantityElement = cartBox.getElementsByClassName("cantidad")[0];

    // Verificar si quantityElement está definido antes de acceder a su propiedad 'value'
    if (quantityElement !== undefined) {
      var price = parseFloat(priceElement.innerText.replace("$", ""));
      var quantity = quantityElement.value;
      total = total + price * quantity;
    }
    // si precio content es igual  cent value
    total = Math.round(total * 100) / 100;
  }
  document.querySelector(".subtotal").innerText = "$" + total;
}

"use strict";
const openCartIcon = document.getElementById("cart-icon");
const cart = document.querySelector(".carrito");
const closeCartIcon = document.getElementById("close-cart");
// -------------------- Text content cart -------------?
const containerProduct = document.querySelectorAll(
    ".card__producto__historia"
);
const subtotalValue = document.getElementById("subtotal__value"); // No
const totalValue = document.getElementById("total__value"); // No
const envioValue = document.getElementById("envio__value"); // No
const imageSource = document.querySelectorAll(".content__car__menu img");
const valueProducts = document.querySelectorAll(".parrafo__price");
const addButton = document.getElementsByClassName("agregar__carrito");
const nameProduct = document.getElementsByClassName("parrafo-titulo");
const containerCartContent = document.getElementById(
    "cart__content"
);
const addProductAlert = document.getElementById("add__alert-product");
const descriptionProduct = document.getElementsByClassName('parrafo__cart')
const containerFactura = document.querySelector('.list-group')
let contadorCarrito = document.getElementById("contador-carrito");
let HTML = ''
let additionQuantity = 0; // Beta
// ---------------------------------------------------------

const openCart = () => {
    openCartIcon.addEventListener('click', () => {
        cart.classList.add("active");
        showCart();
    })
};

const closeCart = () => {
    closeCartIcon.addEventListener("click", () => {
        cart.classList.remove("active");
    });
    openCart()
};



//--------------- Beta ------------------------>

const addProductToLocalStorage = ({
    uuid,
    nombre,
    img,
    costo,
    quantity,
    description
}) => {
    const product = {
        id: uuid,
        title: nombre,
        imagen: img,
        precio: costo,
        cantidad: quantity,
        descripcion : description
    };

    return product;
};

const showCart = () => {
    let data = getLocalStorage();
    let createTagProduct = "";
    if (data.length > 0) {
        data.forEach((producto) => {
            const { id, title, imagen, precio, cantidad } = producto;
            // let totalProduct = value * quantity;
            createTagProduct += `    
            <div class=>
            <h4 class="titulo__carta-carrito">${title}</h4>
            <div class="cart-content-producto">
            <div class="header__card header__card-img">
              <img src="${imagen}" class="imagen-cart">
              </div>
              <div class="detail-box">
                  <p class="parrafo__price parrafo__cart-menu">${precio}</p>
                  <input type="number" class="cantidad" value="${cantidad}">
                  <i class="fa-solid fa-times cart-remove" data-id='${id}'></i>
                  </div>
                  </div>
                  </div>
            `
        });
    } else
        createTagProduct = `<p class="message__cart--empty" >No hay elementos en el carrito :(</p>`;

    containerCartContent.innerHTML = createTagProduct;
    handleClickDelete();
};

const addLocalStorage = (arrayProducts) => {
    localStorage.setItem("ordenCarrito", JSON.stringify(arrayProducts));
};

const getLocalStorage = () => {
    let data = JSON.parse(localStorage.getItem("ordenCarrito"));

    if (data) return data;
    else return [];
};

const validateProducts = (newProduct) => {
    let previousProducts = [...getLocalStorage()];
    let newProducts = [];

    if (previousProducts.length <= 0) newProducts = [...newProduct];
    else newProducts = [...previousProducts, ...newProduct];

    addLocalStorage(newProducts);
};

const deleteProductFromLocalStorage = (dataId) => {
    const deleteProduct = getLocalStorage().filter((product) => {
        return product.id !== dataId;
    });
    return deleteProduct;
};

const validateExistenceProduct = (uuid) => {
    return getLocalStorage().map((product) => {
        return product.id === uuid;
    });
};

const handleClickAddProduct = () => {
    let products = [];
    for (let i = 0; i < addButton.length; i++) {
        addButton[i].addEventListener("click", () => {
            const id = containerProduct[i].getAttribute("data-id");
            // if (validateExistenceProduct(id).includes(true)) return;

            products.push(
                addProductToLocalStorage({
                    uuid: id,
                    nombre: nameProduct[i].textContent,
                    img: imageSource[i].src,
                    costo: valueProducts[i].textContent,
                    quantity: 1,
                    description : descriptionProduct[i].textContent
                })
            );
            validateProducts(products);
            // updateValues();
            products = [];
            // openAlert(addProductAlert, 700);
            updateCounter()
        });
    }
};

const handleClickDelete = () => {
    let deleteProductIcon = document.getElementsByClassName("cart-remove");
    for (let i = 0; i < deleteProductIcon.length; i++) {
        deleteProductIcon[i].addEventListener("click", () => {
            let dataId = deleteProductIcon[i].getAttribute("data-id");
            addLocalStorage(deleteProductFromLocalStorage(dataId));
            showCart();
            updateCounter()
            // updateValues();
        });
    }
};



const getSubtotalValue = () => {
    let subtotal = 0;
    let productsValue = getLocalStorage();

    productsValue.forEach((productValue) => {
        const { value, quantity } = productValue;
        let totalProduct = value * quantity;
        subtotal += totalProduct;
    });

    return subtotal;
};

const updateValues = () => {
    subtotalValue.textContent = getSubtotalValue();
    totalValue.textContent =
        getSubtotalValue() + Number(envioValue.textContent);
};

const updateCounter = () => {
    contadorCarrito.textContent = getLocalStorage().length
}

let value = 0

const showProductsInBill = () => {
    getLocalStorage().forEach(product => {
        console.log(product);
        const {id, imagen, precio, title, cantidad, descripcion} = product
        HTML += `
        <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
                <h6 class="my-0">${title}</h6>
                <small class="text-muted-color text-muted-longitud text-muted ">${descripcion}</small>
            </div>
                <span class="text-muted-color text-muted ">${precio}</span>
        </li>
        <li class="list-group-item d-flex justify-content-between">
        <span>Total (COP)</span>
        <strong>$ ${value += +precio.slice(1)}</strong>
    </li>
        `   
    });
    if(containerFactura) containerFactura.innerHTML = HTML
}

showProductsInBill()

// handleClickCloseAlert(addProductAlert);
closeCart()
handleClickAddProduct()
updateCounter()
// updateValues()
"use strict";
const openCartIcon = document.getElementById("cart-icon");
const cart = document.querySelector(".carrito");
const closeCartIcon = document.getElementById("close-cart");
// -------------------- Text content cart -------------?
const containerProduct = document.querySelectorAll(".card__producto__historia");
const subtotalValue = document.getElementById("subtotal__value"); // No
const totalValue = document.getElementById("total__value"); // No
const envioValue = document.getElementById("envio__value"); // No
const imageSource = document.querySelectorAll(".content__car__menu img");
const valueProducts = document.querySelectorAll(".text__value");
const addButton = document.getElementsByClassName("agregar__carrito");
let priceInput = document.querySelector('input[name="price"]');
const nameProduct = document.getElementsByClassName("parrafo-titulo");
const containerCartContent = document.getElementById("cart__content");
const addProductAlert = document.getElementById("add__alert-product");
const descriptionProduct = document.getElementsByClassName("parrafo__cart");
const containerFactura = document.querySelectorAll(".list-group");
let contadorCarrito = document.getElementById("contador-carrito");
let HTML = "";
// ---------------------------------------------------------

const openCart = () => {
    openCartIcon.addEventListener("click", () => {
        cart.classList.add("active");
        showCart();
        closeCart();
        handleClickDelete();
    });
};

const closeCart = () => {
    closeCartIcon.addEventListener("click", () => {
        cart.classList.remove("active");
    });
};

//--------------- Beta ------------------------>

const addProductToLocalStorage = ({
    uuid,
    nombre,
    img,
    costo,
    quantity,
    description,
}) => {
    const product = {
        id: uuid,
        title: nombre,
        imagen: img,
        precio: costo,
        cantidad: quantity,
        descripcion: description,
    };
    return product;
};

const showCart = () => {
    let data = getLocalStorage();
    let createTagProduct = "";
    if (data.length > 0) {
        data.forEach((producto) => {
            const { id, title, imagen, precio, cantidad } = producto;
            createTagProduct += `
                <div class="cart-content-producto">
                
                <div class="header__card header__card-img">
                <img src="${imagen}" class="imagen-cart">
                </div>

                <div class="detail-box">
                <h4 class="titulo__carta-carrito">${title}</h4>
                <div class="carta__informacion">
                <p class="parrafo__price parrafo__cart-menu">${precio}</p>
                <i class="fa-solid fa-minus minus__icon cart__icon-color"></i>
                <p class="cantidad">X${cantidad}</p>
                <i class="fa-solid fa-plus plus__icon cart__icon-color"></i>
                <i class="fa-solid fa-times cart-remove" data-id='${id}'></i>
                </div>
                 </div>
                </div>`;
        });
    } else
        createTagProduct = `<p class="message__cart--empty" >No hay elementos en el carrito</p>`;

    containerCartContent.innerHTML = createTagProduct;
    handleClickPlus();
    handleClickMinus();
};

const addLocalStorage = (arrayProducts) => {
    localStorage.setItem("ordenCarrito", JSON.stringify(arrayProducts));
};

const getLocalStorage = () => {
    let data = JSON.parse(localStorage.getItem("ordenCarrito"));
    return data ? data : [];
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
    console.log(dataId);
    addLocalStorage(deleteProduct);
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
            if (validateExistenceProduct(id).includes(true)) {
                updateQuantity(id, 1);
                return;
            }

            products.push(
                addProductToLocalStorage({
                    uuid: id,
                    nombre: nameProduct[i].textContent,
                    img: imageSource[i].src,
                    costo: valueProducts[i].textContent,
                    quantity: 1,
                    description: descriptionProduct[i].textContent,
                })
            );
            validateProducts(products);
            updateValues();
            products = [];
            showCart();
            updateCounter();
        });
    }
};

const handleClickDelete = () => {
    let deleteProductIcon = document.getElementsByClassName("cart-remove");
    for (let i = 0; i < deleteProductIcon.length; i++) {
        deleteProductIcon[i].addEventListener("click", () => {
            let dataId = deleteProductIcon[i].getAttribute("data-id");
            console.log(dataId);
            deleteProductFromLocalStorage(dataId);
            showCart();
            updateCounter();
            updateValues();
            showProductsInBill();
        });
    }
};

const updateValues = () => {
    let total = 0;
    getLocalStorage().forEach((product) => {
        return (total += Number(product.precio) * product.cantidad);
    });
    totalValue.textContent = total;
};

const updateCounter = () => {
    contadorCarrito.textContent = getLocalStorage().length;
};

let value = 0;

const showProductsInBill = () => {
    getLocalStorage().forEach((product) => {
        const { precio, title, descripcion } = product;
        HTML += `
        <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
                <h6 class="my-0">${title}</h6>
                <small class="text-muted-color text-muted-longitud text-muted ">${descripcion}</small>
            </div>
                <span class="text-muted-color text-muted ">${precio}</span>
        </li>
        `;
        value += +precio.slice(1);
        if (priceInput) priceInput.value = value;
    });

    HTML += `
            <li class="list-group-item d-flex justify-content-between">
                <span>Total (COP)</span>
                <strong>$ ${value}</strong>
            </li>`;
    containerFactura.forEach((productos) => {
        if (containerFactura) {
            productos.innerHTML = HTML;
            enviarPago(value);
        }
    });
    handleClickDelete();
};

const enviarPago = (pago) => {
    const tokenCSRF = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");
    const url = `/pago/${pago}`;
    const datosPago = {
        pago: pago,
    };
    fetch(url, {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": tokenCSRF,
        },
        body: JSON.stringify(datosPago),
    })
        .then((response) => {
            if (!response.ok) {
                throw new Error("Error en la solicitud de pago");
            }
            return response.json();
        })
        .then((data) => {
            console.log("Respuesta del servidor:", data);
        })
        .catch((error) => {
            console.error("Error al enviar datos de pago:", error);
        });
};

const enviarFactura = () => {
    const tokenCSRF = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");
    let arrayProductos = getLocalStorage();
    const url = `/factura/${arrayProductos}`;
    if (arrayProductos.length === 0) return;

    fetch(url, {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": tokenCSRF,
        },
        body: JSON.stringify({ productos: arrayProductos }),
    })
        .then((response) => {
            if (!response.ok) {
                throw new Error("Error en la solicitud de factura");
            }
            return response.json();
        })
        .then((data) => {
            console.log("Respuesta del servidor:", data);
        })
        .catch((error) => {
            console.error("Error al enviar datos de factura:", error);
        });
};

openCart();
enviarFactura();
showProductsInBill();
handleClickAddProduct();
updateCounter();
updateValues();

// Beta
const updateQuantity = (uuid, number = 0) => {
    let cart = getLocalStorage(); // Obtenemos el carrito actual

    // Buscamos el producto en el carrito
    const updatedCart = cart
        .map((product) => {
            if (product.id === uuid) {
                // Actualizamos la cantidad del producto
                product.cantidad += number;

                // Comprobamos si la cantidad es menor o igual a cero
                if (product.cantidad <= 0) {
                    return null; // Retorna null para eliminar el producto del carrito
                }
            }
            return product;
        })
        .filter(Boolean); // Filtramos los productos para eliminar los nulls

    // Actualizamos el almacenamiento local con el carrito modificado
    addLocalStorage(updatedCart);
    // Mostramos el carrito y los productos en la factura
    showCart();
    showProductsInBill();
    updateValues();
};

const handleClickPlus = () => {
    const deleteProductIcon = document.getElementsByClassName("cart-remove");
    const iconPlus = document.getElementsByClassName("plus__icon");
    for (let i = 0; i < iconPlus.length; i++) {
        iconPlus[i].addEventListener("click", () => {
            let dataId = deleteProductIcon[i].getAttribute("data-id");
            updateQuantity(dataId, 1);
        });
    }
};

const handleClickMinus = () => {
    const deleteProductIcon = document.getElementsByClassName("cart-remove");
    const iconMinus = document.getElementsByClassName("minus__icon");
    for (let i = 0; i < iconMinus.length; i++) {
        iconMinus[i].addEventListener("click", () => {
            let dataId = deleteProductIcon[i].getAttribute("data-id");
            updateQuantity(dataId, -1);
        });
    }
};

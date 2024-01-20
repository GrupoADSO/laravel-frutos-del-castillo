// Verificamos si el jquery está definido antes de usarlo
if (typeof jQuery != "undefined") {
  $(document).ready(function () {
    // Ejecutamos la funcion para cargar las categorias que tengamos en la bd
    cargarCategorias();

    // Agregamos el evento para el botón de categoría anterior
    $("#categoria_anterior").on("click", function () {
      cambiarCategoria(-1);
    });

    // Agregamos el evento para el botón de categoría siguiente
    $("#categoria_siguiente").on("click", function () {
      cambiarCategoria(1);
    });
  });
} else {
  console.error("jQuery no está definido.");
}

// Creamos la funcion para cargar las categorias
function cargarCategorias() {
  // Creamos nuestra solicitud AJAX
  $.ajax({
    url: "/categorias",
    type: "GET",
    success: function (categoria) {
      // Actualizamos la lista de categorías
      $("#nombre_categoria").text(categoria[0].nombre);
    },
    error: function (error) {
      console.error("Error al obtener categorías", error);
    },
  });
}

// Creamos la funcion para cambiar la categoria
function cambiarCategoria(direccion) {
  // Obtenemos la categoría actual la cual esta en nuestro span
  let categoriaActual = $("#nombre_categoria").text();

  // Realizamos la solicitud AJAX para obtener la próxima categoría
  $.ajax({
    url: "/categorias",
    type: "GET",
    success: function (response) {
      let categorias = response;
      let indiceActual = categorias.findIndex(
        (c) => c.nombre === categoriaActual
      );

      // Calculamos el índice de la próxima categoría
      let indiceProximaCategoria =
        (indiceActual + direccion + categorias.length) %
        categorias.length;

      // Actualizamos la lista de categorías
      $("#nombre_categoria").text(
        categorias[indiceProximaCategoria].nombre
      );

      // Obtenemos y mostramos todos los productos de la nueva categoría
      cargarProductosPorCategoria(categorias[indiceProximaCategoria].id);
    },
    error: function (error) {
      console.error("Error al obtener categorías", error);
    },
  });
}

// Creamos la funcion para mostrar todos los productos de esa categoria
function cargarProductosPorCategoria(categoriaId) {
  // Realizamos una peticion AJAX para obtener los productos de la nueva categoría
  $.ajax({
    url: "/productos/" + categoriaId,
    type: "GET",
    success: function (response) {
      // Actualizar la lista de productos
      $(".card__container").html("");

      response.forEach(function (producto) {
        let productoHtml = `
              <article class="card__menu card__producto__historia">
              <div class="product">
                  <a class="like-button" href="#"><i
                          class="fa-regular fa-heart"></i><strong>145M</strong></a>
                  <div class="content__car__menu " id="image-container"
                      data-modal-target="myModal">
                      <img src="assets/img/img-carta-producto/${producto.imagen_2}" alt="${producto.nombre}">
                  </div>
              </div>

              <div class="content__parrafo__agregar">
                  <h2 class="parrafo-titulo">${producto.nombre}</h2>
                  <p class="parrafo__price">$ ${producto.precio}</p>
                  <p class="parrafo__cart">${producto.descripcion}</p>
              </div>
              <div class="agregar__carrito">
                  <a class="add-button" href="#"><i
                          class="fa-solid fa-plus"></i></a>
              </div>
              <div class="pie__card"></div>
          </article>
              `;
        // Agregar el producto al contenedor
        $(".card__container").append(productoHtml);
      });
    },
    error: function (error) {
      console.error("Error al obtener productos por categoría", error);
      console.error("Detalles del error:", error.responseText);
    },
  });
}



















// const wordElement = document.getElementById("word");
// const imageElements = document.querySelectorAll("#image-container img");
// const prevButton = document.getElementById("prevBtn");
// const nextButton = document.getElementById("nextBtn");

// const wordsAndImages = [
//   {
//     word: "Perros",
//     imageSrc: "/assets/img/imagenes/perro.jpg", // Ruta a la imagen de perros
//   },
//   {
//     word: "Hamburguesas",
//     imageSrc: "/assets/img/imagenes/hamburguesa.jpg", // Ruta a la imagen de hamburguesas
//   },
//   {
//     word: "Salchipapas",
//     imageSrc: "/assets/img/imagenes/salchipapa.jpg", // Ruta a la imagen de salchipapas
//   },
// ];

// let currentIndex = 0;

// function updateWordAndImage() {
//   const currentWord = wordsAndImages[currentIndex].word;
//   const currentImageSrc = wordsAndImages[currentIndex].imageSrc;

//   if(wordElement){

//     wordElement.textContent = currentWord;
//     imageElements.forEach((imageElement) => {
//       imageElement.src = currentImageSrc;
//     });
//   }
// }

// if (prevButton) {
//   prevButton.addEventListener("click", () => {
//     currentIndex =
//       (currentIndex - 1 + wordsAndImages.length) % wordsAndImages.length;
//     updateWordAndImage();
//   });
// }

// if (nextButton) {
//   nextButton.addEventListener("click", () => {
//     currentIndex = (currentIndex + 1) % wordsAndImages.length;
//     updateWordAndImage();
//   });
// }

// // Inicializa la palabra e imagen inicial
// updateWordAndImage();

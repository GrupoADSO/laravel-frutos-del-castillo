const wordElement = document.getElementById("word");
const imageElements = document.querySelectorAll("#image-container img");
const prevButton = document.getElementById("prevBtn");
const nextButton = document.getElementById("nextBtn");

const wordsAndImages = [
  {
    word: "Perros",
    imageSrc: "../img/imagenes/perro.jpg", // Ruta a la imagen de perros
  },
  {
    word: "Hamburguesas",
    imageSrc: "../img/imagenes/hamburguesa.jpg", // Ruta a la imagen de hamburguesas
  },
  {
    word: "Salchipapas",
    imageSrc: "../img/imagenes/salchipapa.jpg", // Ruta a la imagen de salchipapas
  },
];

let currentIndex = 0;

function updateWordAndImage() {
  const currentWord = wordsAndImages[currentIndex].word;
  const currentImageSrc = wordsAndImages[currentIndex].imageSrc;

  if(wordElement){

    wordElement.textContent = currentWord;
    imageElements.forEach((imageElement) => {
      imageElement.src = currentImageSrc;
    });
  }
}

if (prevButton) {
  prevButton.addEventListener("click", () => {
    currentIndex =
      (currentIndex - 1 + wordsAndImages.length) % wordsAndImages.length;
    updateWordAndImage();
  });
}

if (nextButton) {
  nextButton.addEventListener("click", () => {
    currentIndex = (currentIndex + 1) % wordsAndImages.length;
    updateWordAndImage();
  });
}

// Inicializa la palabra e imagen inicial
updateWordAndImage();





// para el menu hamburgesa
const abrir = document.getElementById("abrirVentana");
const cerrar = document.querySelector('#cerrarVentana');
const nav = document.querySelector("#nav__hamburguesa");

abrir.addEventListener('click',()=>{
    nav.classList.add("visible");
});

cerrar.addEventListener('click',()=>{
    nav.classList.remove("visible");

});

cerrar.onclick = (function(){
    nav.classList.remove("visible");

});

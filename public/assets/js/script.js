const sliderContainer = document.querySelector(".slider-container");
const slides = document.querySelectorAll(".slider-container .img-slider");
let currentSlideIndex = 0;
let intervalId;

function showSlide(index) {
    slides.forEach((slide, i) => {
    slide.classList.toggle("visible", i === index);
});
}

function changeSlide(offset) {
  // Detenemos el temporizador antes de cambiar manualmente las imágenes
  stopAutoSlide();

  currentSlideIndex += offset;

  if (currentSlideIndex < 0) {
    currentSlideIndex = slides.length - 1;
  } else if (currentSlideIndex >= slides.length) {
    currentSlideIndex = 0;
  }


  showSlide(currentSlideIndex);

  // Iniciamos el temporizador nuevamente después de cambiar manualmente las imágenes
  startAutoSlide();
}

function startAutoSlide() {
  intervalId = setInterval(() => {
    changeSlide(1);
  }, 3000);
}

function stopAutoSlide() {
  clearInterval(intervalId);
}

// Mostrar la primera imagen al cargar la página
showSlide(currentSlideIndex);
// startAutoSlide();

// Agregar eventos para detener el cambio automático de imágenes cuando el mouse esté sobre el slider
sliderContainer.addEventListener("mouseenter", stopAutoSlide);
sliderContainer.addEventListener("mouseleave", startAutoSlide);

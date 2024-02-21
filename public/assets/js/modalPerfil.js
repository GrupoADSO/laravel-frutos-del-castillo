const modal = document.getElementById('modal');
const misComprasButton = document.getElementById('misComprasButton');
const closeButton = document.getElementById('close__historial');

misComprasButton.addEventListener('click', () => {
  modal.style.display = 'block';
  document.body.classList.add('bloquear-body');
  event.preventDefault();
});

closeButton.addEventListener('click', () => {
  modal.style.display = 'none';
  document.body.classList.remove('bloquear-body');

});

window.addEventListener('click', (event) => {
  if (event.target === modal) {
    modal.style.display = 'none';
    document.body.classList.remove('bloquear-body');
  }
});


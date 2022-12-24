const welcomeModal = document.getElementById('welcome-modal');
const backdrop = document.getElementById('backdrop');

welcomeModal.onclick = removeAlert;
backdrop.onclick = removeAlert;


function removeAlert(){
  setTimeout(playTheme, 300);

  welcomeModal.setAttribute('width', 0);
  welcomeModal.classList.remove('show');

  backdrop.setAttribute('width', 0);
  backdrop.classList.remove('show');
}


function playTheme(){
  document.querySelector('audio').play();
}

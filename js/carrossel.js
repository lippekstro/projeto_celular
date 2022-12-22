let slideIndex = 1; // define o primeiro slide
showSlides(slideIndex); //chama a funcao showslide no index em que estiver o slideindex

// controle dos botoes proximo/anterior
function plusSlides(n) { 
  showSlides(slideIndex += n); //define de quantos em quantos slides ira passar
}

// controle de imagens
function currentSlide(n) {
  showSlides(slideIndex = n); //define qual slide deve ser exibido
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides"); //armazena a img
  let dots = document.getElementsByClassName("dot"); //armazena a "bolinha"
  if (n > slides.length) {slideIndex = 1}
  //se o "n" for maior que o tamanho do vetor de slides, retorne o index para 1 (volta pro primeiro slide)
  if (n < 1) {slideIndex = slides.length}
  //se o "n" for menor que 1, retorne o index final(volta pro ultimo slide)
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none"; //oculta os slides
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", ""); 
    //remove a classe das bolinhas
  }
  slides[slideIndex-1].style.display = "block"; //exibe o slide
  dots[slideIndex-1].className += " active"; // adiciona a classe as bolinhas
}

// troca slides automaticamente
setInterval(()=>{ //funcao nao nomeada
  showSlides(slideIndex += 1); //chama a funcao de exibicao de slides no index + 1
}, 2000) //tempo de troca dos slides
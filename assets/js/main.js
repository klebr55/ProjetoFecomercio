(function () {
  "use strict";
  
  // ======= Sticky
  window.onscroll = function () {
    const ud_header = document.querySelector(".ud-header");
    const sticky = ud_header.offsetTop;
    const logo = document.querySelector(".header-logo");

    if (window.pageYOffset > sticky) {
      ud_header.classList.add("sticky");
    } else {
      ud_header.classList.remove("sticky");
    }
  };

  // ===== Faq accordion
  const faqs = document.querySelectorAll(".single-faq");
  faqs.forEach((el) => {
    el.querySelector(".faq-btn").addEventListener("click", () => {
      el.querySelector(".icon").classList.toggle("rotate-180");
      el.querySelector(".faq-content").classList.toggle("hidden");
    });
  });

  // ===== wow js
  new WOW().init();

  // ====== scroll top js
  function scrollTo(element, to = 0, duration = 500) {
    const start = element.scrollTop;
    const change = to - start;
    const increment = 20;
    let currentTime = 0;

    const animateScroll = () => {
      currentTime += increment;

      const val = Math.easeInOutQuad(currentTime, start, change, duration);

      element.scrollTop = val;

      if (currentTime < duration) {
        setTimeout(animateScroll, increment);
      }
    };

    animateScroll();
  }

  Math.easeInOutQuad = function (t, b, c, d) {
    t /= d / 2;
    if (t < 1) return (c / 2) * t * t + b;
    t--;
    return (-c / 2) * (t * (t - 2) - 1) + b;
  };

  document.querySelector(".back-to-top").onclick = () => {
    scrollTo(document.documentElement);
  };
})();

/* Outros Scripts */

/* Impostometro */

// Obtenha referências aos botões e "iframes"
const btnEstadual = document.getElementById('btn-estadual');
const btnNacional = document.getElementById('btn-nacional');
const iframeEstadual = document.getElementById('iframe-estadual');
const iframeNacional = document.getElementById('iframe-nacional');

// Adicione um manipulador de eventos ao botão Estadual
btnEstadual.addEventListener('click', function() {
  iframeEstadual.removeAttribute('hidden');
  iframeNacional.setAttribute('hidden', '');
  btnEstadual.classList.add('active');
  btnNacional.classList.remove('active');
});

// Adicione um manipulador de eventos ao botão Nacional
btnNacional.addEventListener('click', function() {
  iframeNacional.removeAttribute('hidden');
  iframeEstadual.setAttribute('hidden', '');
  btnNacional.classList.add('active');
  btnEstadual.classList.remove('active');
});

// Função para verificar se é um dispositivo móvel
function isMobileDevice() {
  return (typeof window.orientation !== "undefined") || (navigator.userAgent.indexOf('IEMobile') !== -1);
}

// Oculta o impostômetro em dispositivos móveis
function hideImpostometroOnMobile() {
  var impostometro = document.getElementById('impostometro');
  if (isMobileDevice()) {
    impostometro.style.display = 'none';
  } else {
    impostometro.style.display = 'block';
  }
}

// Chama a função ao carregar a página
window.onload = function() {
  hideImpostometroOnMobile();
};

// Chama a função ao redimensionar a janela
window.onresize = function() {
  hideImpostometroOnMobile();
};

/* Fim Impostômetro */

/* Carrossel de cards */

$(document).ready(function() {
  const owl = $('.owl-carousel');
  owl.owlCarousel({
    items: 1,
    loop: true,
    margin: 120,
    nav: false,
    dots: true,
    autoplay: true,
    autoplayTimeout: 3000,
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 1
      },
      1000: {
        items: 1
      }
    }
  });

  // Adicionar eventos de clique nas setas de navegação personalizadas
  $('.owl-arrow-next').on('click', function() {
    owl.trigger('next.owl.carousel');
  });

  $('.owl-arrow-prev').on('click', function() {
    owl.trigger('prev.owl.carousel');
  });

  // Pausar o autoplay quando o mouse passar pelo card
  $('.card').on('mouseenter', function() {
    owl.trigger('stop.owl.autoplay');
  });

  // Reiniciar o autoplay quando o mouse sair do card
  $('.card').on('mouseleave', function() {
    owl.trigger('play.owl.autoplay');
  });
});

/* Fim Carrossel de cards */

/* Script de rolagem - Navbar */

function scrollToSection(sectionId) {
  const section = document.querySelector(sectionId);
  if (section) {
    section.scrollIntoView({ behavior: 'smooth' });
  }
}

document.addEventListener('DOMContentLoaded', function() {
  const navLinks = document.querySelectorAll('nav ul li a');
  navLinks.forEach(function(link) {
    link.addEventListener('click', function(event) {
      event.preventDefault();
      const sectionId = link.getAttribute('href');
      scrollToSection(sectionId);
    });
  });
});

/* Fim Script de rolagem - Navbar */

/* Navbar Script para abrir em outra guia */

window.addEventListener("DOMContentLoaded", function() {
  "use strict";

  // Redirecionar para outra guia
  const meuBotao1 = document.querySelector("#quem-somos");
  const meuBotao2 = document.querySelector("#estatuto");
  const meuBotao3 = document.querySelector("#ata");
  const meuBotao4 = document.querySelector("#presidente");
  const meuBotao5 = document.querySelector("#diretoria-executiva");
  const meuBotao6 = document.querySelector("#conselho-fiscal");
  const meuBotao7 = document.querySelector("#delegados");
  const meuBotao8 = document.querySelector("#ata-documentos");
  const meuBotao9 = document.querySelector("#convencao-coletiva");
  const meuBotao10 = document.querySelector("#destaques-semana");
  const meuBotao11 = document.querySelector("#noticias-nav");
  const meuBotao12 = document.querySelector("#links-importantes");

  meuBotao1.addEventListener("click", function(event) {
    event.preventDefault();
    window.location.href = "index.html#about";
  });

  meuBotao2.addEventListener("click", function(event) {
    event.preventDefault();
    window.open("http://www.sincadmt.org.br/imagem/file/ESTATUTO_SOCIAL_SINCAD.pdf", "_blank");
  });

  meuBotao3.addEventListener("click", function(event) {
    event.preventDefault();
    window.open("http://www.sincadmt.org.br/arquivos/AtaConstitui%C3%A7%C3%A3o.pdf", "_blank");
  });

  meuBotao4.addEventListener("click", function(event) {
    event.preventDefault();
    window.open("presidente.html", "_blank");
  });

  meuBotao5.addEventListener("click", function(event) {
    event.preventDefault();
    window.open(" ", " ");
  });

  meuBotao6.addEventListener("click", function(event) {
    event.preventDefault();
    window.open(" ", " ");
  });

  meuBotao7.addEventListener("click", function(event) {
    event.preventDefault();
    window.open(" ", " ");
  });

  meuBotao8.addEventListener("click", function(event) {
    event.preventDefault();
    window.open("atas.html", "_blank");
  });

  meuBotao9.addEventListener("click", function(event) {
    event.preventDefault();
    window.open("convencaocoletiva.html", "_blank");
  });

  meuBotao10.addEventListener("click", function(event) {
    event.preventDefault();
    window.location.href = "index.html";
  });

  meuBotao11.addEventListener("click", function(event) {
    event.preventDefault();
    window.location.href = "index.html";
  });

  meuBotao12.addEventListener("click", function(event) {
    event.preventDefault();
    window.open(" ", " ");
  });
});

/* Fim Navbar Script para abrir em outra guia */

/* Hero Script */

var options = {
  accessibility: true,
  prevNextButtons: true,
  pageDots: true,
  setGallerySize: false,
  arrowShape: {
    x0: 10,
    x1: 60,
    y1: 50,
    x2: 60,
    y2: 45,
    x3: 15
  }
};

var carousel = document.querySelector('[data-carousel]');
var slides = document.getElementsByClassName('carousel-cell');
var flkty = new Flickity(carousel, options);


flkty.on('scroll', function () {
  flkty.slides.forEach(function (slide, i) {
    var image = slides[i];
    var x = (slide.target + flkty.x) * -1/3;
    image.style.backgroundPosition = x + 'px center';
  });
});

/* Fim Hero Script */
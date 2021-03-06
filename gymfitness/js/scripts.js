jQuery(document).ready($ => {


  // Slider
  if ($('.listado-testimoniales').length > 0) {
    $('.listado-testimoniales').bxSlider({
      auto: true,
      mode: 'fade',
      controls: false,
    });
  }
  

  // Leaflet
  $('#menu-main-menu').slicknav({
    label: '',
    appendTo: '.site-header'
  });

  // Leaflet Map
  const lat = document.querySelector("#lat").value,
  lng = document.querySelector("#lng").value,
  direccion = document.querySelector("#direccion").value;

  if (lat && lng && direccion) {
    var map = L.map('map').setView([lat, lng], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([lat, lng]).addTo(map)
        .bindPopup('A pretty CSS3 popup.<br> Easily customizable.')
        .openPopup();
  }

  
});

// Add Fixed position to header when scroll
window.onscroll = () => {
  const scroll = window.scrollY;
  const headerNav = document.querySelector('.barra-navegacion');
  const documentBody = document.querySelector('body');
  // If scroll is higher of, add a class
  if (scroll > 300) {
    headerNav.classList.add('fixed-top');
    documentBody.classList.add('ft-activo');
  } else {
    headerNav.classList.remove('fixed-top');
    documentBody.classList.remove('ft-activo');
  }
}
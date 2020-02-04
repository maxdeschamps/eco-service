var zoomEl = document.getElementsByClassName('zoom');
var isZoomed = false;

if (zoomEl) {
  for (let i=0; i<zoomEl.length; i++) {
    zoomEl[i].addEventListener('mousemove', function(e){
      var zoomer = e.currentTarget;
      e.offsetX ? offsetX = e.offsetX : offsetX = e.touches[0].pageX;
      e.offsetY ? offsetY = e.offsetY : offsetX = e.touches[0].pageX;
      x = offsetX/zoomer.offsetWidth*100*.8;
      y = offsetY/zoomer.offsetHeight*100*.8;
      zoomer.style.backgroundPosition = x + '% ' + y + '%';
    });

    zoomEl[i].addEventListener('click', function(e){
      if (!isZoomed) {
        zoomEl[i].style.backgroundSize = "175%";
        zoomEl[i].style.cursor = "zoom-out";
      } else {
        zoomEl[i].style.backgroundSize = "125%";
        zoomEl[i].style.cursor = "zoom-in";
      }

      isZoomed = !isZoomed;
    });

    zoomEl[i].addEventListener('mouseout', function(e){
      isZoomed = false;
      zoomEl[i].style.backgroundSize = "125%";
      zoomEl[i].style.cursor = "zoom-in";
    });
  }
}

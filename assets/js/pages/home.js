var counterOn = true;

function isScrolledIntoView(elem) {
    var docViewTop = $(window).scrollTop();
    var docViewBottom = docViewTop + $(window).height();
    var elemTop = $(elem).offset().top;
    return ((elemTop <= docViewBottom) && (elemTop >= docViewTop));
}

$(window).scroll(function() {
  if (document.getElementsByClassName('count').length > 0) {
    if (isScrolledIntoView($('.count')) && counterOn) {
      counterOn = false;
      $('.count').each(function () {
        $(this).prop('Counter',0).animate({
          Counter: $(this).text()
        }, {
          duration: 4000,
          easing: 'swing',
          step: function (now) {
            $(this).text(Math.ceil(now) + ' %');
          }
        });
      });
    }
  }
});

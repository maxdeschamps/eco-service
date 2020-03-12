var inputProduct = document.getElementById('qty-product'),
    linkCart = document.getElementsByClassName('btn-acheter');

if (inputProduct) {
  inputProduct.addEventListener('change', function(e) {
    if (linkCart[0])
      linkCart[0].href = '/panier/add/' + linkCart[0].dataset.product + '/' + e.target.value;
  });
}

var extraService = document.getElementById('extra-service'),
    linkAddress = document.getElementById('link-to-address');

if (extraService) {
  extraService.addEventListener('input', function(e) {
    let text = '{"text": "' + e.target.value + '"}';
    if (linkAddress)
      linkAddress.href = '/panier/adresses/?extra=' + text;
  });
}

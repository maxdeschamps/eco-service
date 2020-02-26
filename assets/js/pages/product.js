var inputProduct = document.getElementById('qty-product'),
    linkCart = document.getElementsByClassName('btn-acheter');

inputProduct.addEventListener('change', function(e) {
  if (linkCart[0])
    linkCart[0].href = '/panier/add/' + linkCart[0].dataset.product + '/' + e.target.value;
  console.log(linkCart[0].href)
});

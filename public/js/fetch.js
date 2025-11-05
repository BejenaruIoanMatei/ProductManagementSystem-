fetch('/')
  .then(res => res.text())
  .then(html => {
    document.querySelector('.product-info').innerHTML = html;
  });

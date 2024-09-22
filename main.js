document.addEventListener("DOMContentLoaded", () => {
  const products = [
    { id: 1, name: "Smartphone", image: "images/phone.jpg", price: "$499", link: "#", category: "Tech Gadgets" },
    { id: 2, name: "Coffee Maker", image: "images/coffee.jpg", price: "$99", link: "#", category: "Home Appliances" },
    { id: 3, name: "Sneakers", image: "images/shoes.jpg", price: "$59", link: "#", category: "Fashion" }
  ];

  const featuredProducts = document.getElementById('featured-products');
  const searchInput = document.getElementById('searchInput');

  function displayProducts(products) {
    featuredProducts.innerHTML = '';
    products.forEach(product => {
      featuredProducts.innerHTML += `
        <div class="product">
          <img src="${product.image}" alt="${product.name}">
          <h3>${product.name}</h3>
          <p>${product.price}</p>
          <a href="${product.link}" class="buy-now">Buy Now</a>
        </div>
      `;
    });
  }

  displayProducts(products);

  searchInput.addEventListener('keyup', (e) => {
    const searchTerm = e.target.value.toLowerCase();
    const filteredProducts = products.filter(product =>
      product.name.toLowerCase().includes(searchTerm)
    );
    displayProducts(filteredProducts);
  });
});

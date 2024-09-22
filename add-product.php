<?php
if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $price = $_POST['price'];
  $category = $_POST['category'];
  $image = $_FILES['image']['name'];
  $image_tmp = $_FILES['image']['tmp_name'];

  move_uploaded_file($image_tmp, "../images/$image");

  $db = new mysqli('localhost', 'root', '', 'affiliate_website');
  $db->query("INSERT INTO products (name, price, category, image) VALUES ('$name', '$price', '$category', '$image')");

  header('Location: manage.php');
}
?>

<form action="add-product.php" method="post" enctype="multipart/form-data">
  <input type="text" name="name" placeholder="Product Name" required>
  <input type="text" name="price" placeholder="Product Price" required>
  <input type="text" name="category" placeholder="Category" required>
  <input type="file" name="image" required>
  <button type="submit" name="submit">Add Product</button>
</form>
<?php
// Database connection
$db = new mysqli('localhost', 'root', '', 'affiliate_website');

// Fetch all products
$result = $db->query("SELECT * FROM products");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Products - Admin Panel</title>
  <link rel="stylesheet" href="../css/styles.css">
</head>

<body>

  <header>
    <h1>Manage Products</h1>
    <a href="add-product.php" class="btn">Add New Product</a>
  </header>

  <section>
    <table border="1" cellpadding="10" cellspacing="0">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Price</th>
          <th>Category</th>
          <th>Image</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($product = $result->fetch_assoc()): ?>
          <tr>
            <td><?php echo $product['id']; ?></td>
            <td><?php echo $product['name']; ?></td>
            <td><?php echo $product['price']; ?></td>
            <td><?php echo $product['category']; ?></td>
            <td><img src="../images/<?php echo $product['image']; ?>" width="100" alt="<?php echo $product['name']; ?>"></td>
            <td>
              <a href="delete-product.php?id=<?php echo $product['id']; ?>" onclick="return confirm('Are you sure you want to delete this product?');">Delete</a>
            </td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </section>

</body>

</html>
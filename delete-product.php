<?php
// Database connection
$db = new mysqli('localhost', 'root', '', 'affiliate_website');

// Check if the ID is set in the URL
if (isset($_GET['id'])) {
  $product_id = $_GET['id'];

  // Delete the product from the database
  $db->query("DELETE FROM products WHERE id = $product_id");

  // Redirect back to the manage page
  header('Location: manage.php');
  exit();
} else {
  echo "Product ID not provided!";
}

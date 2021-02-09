<?php
// Update session variable only if the id parameter is passed thru url
if ((isset($_GET['id'])) && ($_GET['id'] != "")) {
    // Initialise the session if session is yet to initialised
    if (!isset($_SESSION)) {
        session_start();
    }
  
    $currentProduct = $_SESSION['cart'];
    $toBeDeleted = array($_GET['id']);
    // Update session values to remove deleted product id
    $_SESSION['cart'] = array_values(array_diff($currentProduct, $toBeDeleted));
    
    header("Location: products_cart.php");
}
?>

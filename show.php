<?php
require('connect_db.php');

$id = $_GET['id'];

$query = "SELECT * FROM products WHERE id = {$id}";

$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $product = mysqli_fetch_assoc($result);
    echo '<p>';
    echo 'Name: ' . $product['name'] . '<br />';
    echo 'Description: ' . $product['description'] . '<br />';
    echo 'Price: ' . $product['price'] . '<br />';
    echo '</p>';
    echo "<a href='edit.php?id={$product['id']}'>Edit</a>";
} else {
    echo '<p> Product Not Found. </p>';
}
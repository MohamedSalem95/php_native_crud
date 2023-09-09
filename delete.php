<?php

require('connect_db.php');

$id = $_GET['id'];
$query = "DELETE FROM products WHERE id = {$id}";

mysqli_query($conn, $query);
mysqli_close($conn);

header('Location: http://127.0.0.1/crud?msg="Product deleted successfully."');
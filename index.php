<?php

require('connect_db.php');
?>

<a href="new.php"> create new product </a>

<?php

$query = 'SELECT * FROM products';

$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    echo '<h2> All Product </h2>';
    while($product = mysqli_fetch_assoc($result)) {
        echo '<p>';
        echo 'Name: ' . $product['name'] . '<br />';
        echo 'Description: ' . $product['description'] . '<br />';
        echo 'Price: ' . $product['price'] . '<br />';
        echo '</p>';
    }
} else {
    echo '<p> No products here yet consider adding one! </p>';
}
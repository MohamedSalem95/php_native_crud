<a href="index.php"> Back Home </a>
<h2> edit product </h2>
<?php
    require('connect_db.php');

    
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM products WHERE id = {$id}";
        
        $result = mysqli_query($conn, $query);
        $product = mysqli_fetch_assoc($result);
        $name = $product['name'];
        $description = $product['description'];
        $price = $product['price'];
    } else {
        $name = $description = $price = '';
    }
    $name_err = $description_err = $price_err = '';
    $form_valid = true;

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (empty($_POST['name'])) {
            $name_err = 'Name cant be empty';
            $form_valid = false;
        } else {
            $name = $_POST['name'];
        }

        if (empty($_POST['description'])) {
            $description_err = 'Description cant be empty';
            $form_valid = false;
        } else {
            $description = $_POST['description'];
        }

        if (empty($_POST['price'])) {
            $price_err = 'Price cant be empty';
            $form_valid = false;
        } else {
            $price = $_POST['price'];
        }
        if ($form_valid) {
            require('connect_db.php');
            // $stmt = mysqli_prepare('INSERT INTO products VALUES(?, ?, ?)');
            $query = "UPDATE products SET name='{$name}', description='{$description}', price={$price}";
            mysqli_query($conn, $query);
            mysqli_close($conn);
            header('Location: http://127.0.0.1/crud?msg="Product updated successfully."');
        }
        
    }

   

?>
<form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?= $name ?>">
        <p style="color: red;">
            <?= $name_err ?>
        </p>
    </div>

    <div class="form-group">
        <label for="description">Description:</label>
        <textarea name="description" id="description"><?= $description ?></textarea>

        <p style="color: red;">
            <?= $description_err ?>
        </p>
    </div>

    <div class="form-group">
        <label for="price">Price:</label>
        <input type="number" name="price" id="price" value="<?= $price ?>">

        <p style="color: red;">
            <?= $price_err ?>
        </p>
    </div>

    <input type="submit" value="save">
</form>
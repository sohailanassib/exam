<?php include 'inc/header.php';?>
<?php
$db = new Database();
$product = new Product($db);
$productData = $product->getById($_GET['id']);
?>
    <div class="container my-5">
        <div class="row">
            <div class="col-lg-6">
                <img src="<?php echo $productData['image'] ?>" class="card-img-top" alt="image">
            </div>
            <div class="col-lg-6">
                <h5></h5>
                <p class="text-muted">Price: <?php echo $productData['price'] ?> EGP</p>
                <p><?php echo $productData['description'] ?></p>
                <a href="index.php" class="btn btn-primary">Back</a>
                <a href="../edit.php?id=<?php echo $productData['id'] ?>" class="btn btn-info">Edit</a>
                <a onclick="deleteRecord(<?php echo $productData['id'] ?>)" class="btn btn-danger">Delete</a>
            </div>

        </div>
    </div>
<?php include 'inc/footer.php';?>
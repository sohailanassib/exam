<?php include 'inc/header.php';?>
    <div class="container my-5">
        <div class="row">
            <?php
$db = new Database();
$product = new Product($db);
$allProducts = $product->getAll();

foreach ($allProducts as $product) {?>
                <div class="col-lg-4 mb-3" id="record-<?php echo $product['id'] ?>">
                    <div class="card">
                        <img src="<?php echo $product['image'] ?>" class="card-img-top" alt="image">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $product['name'] ?></h5>
                            <p class="text-muted"><?php echo $product['price'] ?> EGP</p>
                            <p class="card-text"><?php echo $product['description'] ?></p>
                            <a href="show.php?id=<?php echo $product['id'] ?>" class="btn btn-primary">Show</a>
                            <a href="edit.php?id=<?php echo $product['id'] ?>" class="btn btn-info">Edit</a>
                            <a onclick="deleteRecord(<?php echo $product['id'] ?>)" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                </div>
            <?php }?>
        </div>
    </div>


<?php include 'inc/footer.php';?>
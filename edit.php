<?php include 'inc/header.php';?>
<div class="container my-5">
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
        <?php
$error = null;
$db = new Database();
$product = new Product($db);
$productData = $product->getById($_GET['id']);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!Respect\Validation\Validator::notBlank()->validate($_POST['name'])) {
        $error = 'name field must have value';
    } else if (!Respect\Validation\Validator::notBlank()->validate($_POST['description'])) {
        $error = 'description field must have value';
    } else if (!Respect\Validation\Validator::notBlank()->validate($_POST['price'])) {
        $error = 'price field must have value';
    } else if (!Respect\Validation\Validator::length(3, 50)->validate($_POST['name'])) {
        $error = 'name must be more than 3 characters and less than 50 characters';
    } else if (!Respect\Validation\Validator::length(3, null)->validate($_POST['name'])) {
        $error = 'description must be more than 3 characters';
    } else if (!Respect\Validation\Validator::greaterThan(0)->validate($_POST['price'])) {
        $error = 'price must be greater than 0';
    } else {
        $product->update($_POST['id'], $_POST['name'], $_POST['description'], $_POST['price'], $_FILES);
    }
}
?>
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">

                <input hidden type="text" class="form-control" id="id" name = "id" value="<?php echo $productData['id'] ?>">

                <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" name = "name" value="<?php echo $productData['name'] ?>">
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price:</label>
                    <input type="number" class="form-control" id="price" name="price" value="<?php echo $productData['price'] ?>">
                </div>

                <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description:</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name = "description"><?php echo $productData['description'] ?></textarea>
                </div>

                <div class="mb-3">
                <label for="formFile" class="form-label">Image:</label>
                <input class="form-control" type="file" id="formFile" name="image">
                </div>

                <div class="col-lg-3">
                        <img src="<?php echo $productData['image'] ?>" class="card-img-top">
                        </div>

                <center>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </center>
            </form>
        </div>
    </div>
</div>



<?php include 'inc/footer.php';?>
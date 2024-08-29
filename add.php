<?php include 'inc/header.php';?>
    <div class="container my-5">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <?php
$error = null;
$db = new Database();
$product = new Product($db);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!Respect\Validation\Validator::notBlank()->validate($_POST['name'])) {
        $error = 'name field must have value';
    } else if (!Respect\Validation\Validator::notBlank()->validate($_POST['description'])) {
        $error = 'description field must have value';
    } else if (!Respect\Validation\Validator::notBlank()->validate($_POST['price'])) {
        $error = 'price field must have value';
    } else if (!Respect\Validation\Validator::length(3, 50)->validate($_POST['name'])) {
        $error = 'name must be more than 3 characters and less than 50 characters';
    } else if (!Respect\Validation\Validator::length(3, null)->validate($_POST['description'])) {
        $error = 'description must be more than 3 characters';
    } else if (!Respect\Validation\Validator::greaterThan(0)->validate($_POST['price'])) {
        $error = 'price must be greater than 0';
    } else {
        $product->create($_POST['name'], $_POST['description'], $_POST['price'], $_FILES);
    }
}
?>
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Price:</label>
                        <input type="number" class="form-control" id="price" name="price" value="0">
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Description:</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                  name="description"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="formFile" class="form-label">Image:</label>
                        <input class="form-control" type="file" id="formFile" name="image">
                    </div>
                    <center>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </center>
                </form>
            </div>
        </div>
    </div>


<?php include 'inc/footer.php';?>
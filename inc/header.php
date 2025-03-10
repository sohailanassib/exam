<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/Database.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/Product.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/handlers/delete.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Shop</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="../node_modules/toastr/build/toastr.min.css" rel="stylesheet">
</head>
<body>


<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Online Shop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">All Products</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="add.php">Add Product</a>
                </li>


            </ul>

        </div>
    </div>
</nav>

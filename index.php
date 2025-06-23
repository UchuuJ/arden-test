<?php

use Arden\ShopController;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

error_reporting(E_ALL);
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">

        <title>Shop</title>
        <meta name="description" content="Shop">
        <meta name="author" content="Arden University">
    </head>
    <body>
        <h1>Shop</h1>

        <div>
            <h2>Opening times</h2>

            <?php
            include __DIR__ . '/BaseController.php';
            include __DIR__ . '/Model.php';
            include __DIR__ . '/View.php';
            include __DIR__ . '/ShopController.php';
            include __DIR__ . '/OpeningTimesModel.php';
            include __DIR__ . '/OpeningTimesView.php';

            $controller = new ShopController();

            $openingTimesView = new Arden\OpeningTimesView($controller->getModelData());

            echo $openingTimesView->render();
            ?>
        <div>
            <h2>Top Products</h2>
            <p>( Coming Soon )</p>
        </div>
    </body>
</html>

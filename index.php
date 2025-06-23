<?php

use Arden\ShopController;
use Arden\Enum\Types;

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
            include __DIR__ . '/Enums/Types.php';
            include __DIR__ . '/ProductModel.php';
            include __DIR__ . '/TopFiveProductsModel.php';
            include __DIR__ . '/TopFiveProductsView.php';
            include __DIR__ . '/ShopController.php';
            include __DIR__ . '/OpeningTimesModel.php';
            include __DIR__ . '/OpeningTimesView.php';
            $controller = new ShopController();

            //Added a type "enum" to so the shop controller knows which model data to fetch
            //As this page should be completely controlled by the Shop Controller.
            $openingTimesView = new Arden\OpeningTimesView($controller->getModelData(Types::TYPE_OPENING_TIMES));
            echo $openingTimesView->render();
            ?>
        <div>
            <h2>Top Products</h2>
            <?php
                $TopFiveProductsView = new Arden\TopFiveProductsView($controller->getModelData(Types::TYPE_TOP_FIVE_PRODUCTS));
                echo $TopFiveProductsView->render();
            ?>
        </div>
    </body>
</html>

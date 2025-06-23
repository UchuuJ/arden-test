<?php

namespace Arden;

use Arden\Model;

/**
 * Product Model
 * Used to hold the product data like Price, name and ImageLocation
 */
class ProductModel extends Model
{

    public function __construct(string $name, string $price, string $imageLocation)
    {
        $this->data = [
            'name' => $name,
            'price' => $price,
            'imageLocation' => $imageLocation,
        ];
    }

    public function getData()
    {
        return $this->data;
    }
}
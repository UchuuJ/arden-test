<?php

namespace Arden;
/**
 * Renders the TopFiverProductsView
 */
class TopFiveProductsView extends View
{
    public function __construct($data = null)
    {
        if ($data) {
            $this->data = $data;
        }
    }

    public function setData($data) {
        $this->data = $data;
    }

    public function getData() {
        return $this->data;
    }

    public function render() {
        // Render opening times
        foreach ($this->data['products'] as $product) {
            $productData  = $product->getData();
            echo "<div>";
            echo "<img src='".$productData['imageLocation']."'> ".$productData['name']. " - £".$productData['price'];
            echo "</div>";
        }
    }
}

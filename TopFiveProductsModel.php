<?php
use Arden\Model;

/**
 * Lists the top 5 products of a model
 */
use Arden\ProductModel;
class TopFiveProductsModel extends Model
{

    public function __construct(){
        parent::__construct();

        $TopFiveProductData = $this->database->select(['name','price','imagelocation'],'topfiveproducts',['LIMIT' => 5])->execute();
        if(empty($TopFiveProductData)) {
            $this->data = [
                'products' => [
                    //These should be extracted into a product class.
                    new ProductModel('Bread', '4.20', '/imgs/bread.jpg'),
                    new ProductModel('Muffin', '4.20', '/imgs/english-muffin.jpg'),
                    new ProductModel('Banana Bread', '4.20', '/imgs/banana-bread.jpg'),
                    new ProductModel('Tiger Bread', '4.20', '/imgs/Tigerbread.jpg'),
                    new ProductModel('Deli Bread', '4.20', '/imgs/deli-bread.jpg'),
                ]
            ];
            return;
        }
        $this->data = [];
        foreach ($TopFiveProductData as $product){
            $this->data['products'][] = new ProductModel($product['name'], $product['price'], $product['imagelocation']);
        }
    }
    public function getData()
    {
        return $this->data;
    }
}
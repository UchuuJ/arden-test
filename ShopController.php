<?php

namespace Arden;

use OpeningTimesModel;
use TopFiveProductsModel;

use Arden\Enum\Types;


/** Everything should go under shop as thats the main controller */
class ShopController extends BaseController
{
    /**
     * We load in the Model data mainly the top 5 and Opening Times data
     */
    private $OpeningTimesModel;
    private $TopFiveProductsModel;
    public function __construct()
    {
        $OpeningTimesModel = new OpeningTimesModel();
        $this->OpeningTimesModel = $OpeningTimesModel->getData();
        $TopFiveProductsModel = new TopFiveProductsModel();
        $this->TopFiveProductsModel = $TopFiveProductsModel->getData();
    }

    public function getModelData($type = null) {
        switch ($type){
            case Types::TYPE_OPENING_TIMES:
                return $this->OpeningTimesModel;
                break;
            case Types::TYPE_TOP_FIVE_PRODUCTS:
                return $this->TopFiveProductsModel;
        }
    }
}

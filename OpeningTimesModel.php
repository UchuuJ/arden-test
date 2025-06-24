<?php

use Arden\Model;

class OpeningTimesModel extends Model
{
    public function __construct()
    {
        parent::__construct();
        /**
         * Should probably be refactered into just opening hours
         */

        $OpeningHoursData = $this->database->select(['day','openinghours'],'openingtimes')->execute();
        if(empty($OpeningHoursData)) {
            $this->data = [
                'opening_hours' => [
                    'Mon' => '0900 - 1700',
                    'Tue' => '0900 - 1400',
                    'Wed' => 'Closed',
                    'Thu' => 'Closed', //this was missing I assume It would be closed.
                    'Fri' => '1000 - 1300',
                ]
            ];
            return;
        }

        $this->data = [];
        foreach ($OpeningHoursData as $openingHours){
            $this->data['opening_hours'][$openingHours['day']] = $openingHours['openinghours'];
        }
    }

    public function getData()
    {
        return $this->data;
    }
}

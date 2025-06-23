<?php

namespace Arden;

class OpeningTimesView extends View
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
        /**
         * Added the table, In an ideal world this segment of code
         * would be a html template like twig or blade.
         */
        echo "<table>";
        echo "<tr>";
        echo "<th>Day</th>";
        echo "<th>Opening</th>";
        echo "<th>Closing</th>";
        echo "</tr>";
        foreach ($this->data as $key => $val) {
            if ($key == 'days') {
                foreach ($val as $day) {
                    echo "<tr>";
                    echo '<td>' . $day."</td>";

                    foreach ($this->data['opening_hours'] as $d => $hours) {
                        if ($d == $day) {
                            /**
                             * Logic to figure out which part of the hours is open or closed
                             */
                            $hours = explode('-',$hours);
                            echo '<td>'. $hours[0].'</td>';
                            if(sizeof($hours)>1){
                                echo '<td>'. $hours[1].'</td>';
                            } else {
                                echo '<td></td>';
                            }
                        }
                    };
                    echo "</tr>";
                }
            }
        }
        echo "</table>";
    }
}

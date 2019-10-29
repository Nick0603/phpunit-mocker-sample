<?php

namespace App\Services;

use App\Tool\TemperatureApi;

class DisplayService
{
    public function getLEDStatus()
    {
        $api = new TemperatureApi();
        $temp = $api->getTemperature();
        if ($temp > 30) {
            return 'red';
        } else if ($temp > 20) {
            return 'orange';
        } else {
            return 'green';
        }
    }
}

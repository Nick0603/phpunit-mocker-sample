<?php

namespace App\Services;

use App\Tool\TemperatureApi;

class DisplayService
{
    public $api;

    public function __construct()
    {
        $this->api = new TemperatureApi();
    }

    public function getLEDStatus()
    {
        $temp = $this->api->getTemperature();
        if ($temp > 30) {
            return 'red';
        } else if ($temp > 20) {
            return 'orange';
        } else {
            return 'green';
        }
    }
}

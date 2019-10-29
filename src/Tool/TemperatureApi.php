<?php

namespace App\Tool;

class TemperatureApi
{
    public function getTemperature()
    {
        return rand(1, 100);
    }
}

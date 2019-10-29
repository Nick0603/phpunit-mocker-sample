<?php

namespace Tests\Services;


use PHPUnit\Framework\TestCase;

use App\Services\DisplayService;
use App\Services\TemperatureApi;

class DisplayServiceTest extends TestCase
{
    public function testBasic()
    {
        $expected = 'red';
        $service = new DisplayService();
        $actual = $service->getLEDStatus();
        $this->assertEquals($expected, $actual);
    }
}

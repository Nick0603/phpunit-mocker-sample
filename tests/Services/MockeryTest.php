<?php

namespace Tests\Services;


use PHPUnit\Framework\TestCase;
use \Mockery;
use App\Services\TemperatureApi;

class MockeryTest extends TestCase
{
    public function testMockery將回傳指定值()
    {
        $expected = 40;
        $api = Mockery::mock(TemperatureApi::class);
        $api->shouldReceive('getTemperature')
            ->once()
            ->andReturn(40);

        $actual = $api->getTemperature();
        $this->assertEquals($expected, $actual);
    }
}

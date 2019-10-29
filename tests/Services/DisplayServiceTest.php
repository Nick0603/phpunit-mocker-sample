<?php

namespace Tests\Services;


use PHPUnit\Framework\TestCase;
use \Mockery;
use App\Services\DisplayService;
use App\Services\TemperatureApi;

class DisplayServiceTest extends TestCase
{
    protected $service;
    protected $mockApi;

    protected function setUp(): void
    {
        parent::setUp();
        $this->mockApi = Mockery::mock(TemperatureApi::class);
        $this->service = new DisplayService();
        $this->service->api = $this->mockApi;
    }

    public function testLED顏色是紅當溫定超過30度(): void
    {
        $temperature = 31;
        $expected = 'red';
        $this->mockApi->shouldReceive('getTemperature')
            ->once()
            ->andReturn($temperature);
        $actual = $this->service->getLEDStatus();
        $this->assertEquals($expected, $actual);
    }

    public function testLED顏色是橘當溫定超過20度低於30度(): void
    {
        $temperature = 29;
        $expected = 'orange';
        $this->mockApi->shouldReceive('getTemperature')
            ->once()
            ->andReturn($temperature);
        $actual = $this->service->getLEDStatus();
        $this->assertEquals($expected, $actual);
    }

    public function testLED顏色是綠當溫定低於20度(): void
    {
        $temperature = 19;
        $expected = 'green';
        $this->mockApi->shouldReceive('getTemperature')
            ->once()
            ->andReturn($temperature);
        $actual = $this->service->getLEDStatus();
        $this->assertEquals($expected, $actual);
    }
}

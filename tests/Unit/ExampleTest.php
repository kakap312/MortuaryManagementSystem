<?php

namespace Tests\Unit;
use Tests\Calculator;
use Tests\Dao;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $cal = new Calculator(); // system under test
        $this->assertEquals(16,$cal->add(12,4));
    }

    public function testAreaOfArectangleCalculator(){
        // width = 12, Lenght = 4 // output must be 48.
        // what if a person input negative value. In testing we are not concern about validation. Users input will
        $cal = new Calculator(); // system under test
        $this->assertEquals(48,$cal->areaOfARectangleCalculator(12,4));
    }

    public function testInsertCalculatorValue( )
    {
        $daoMock = $this->createMock(Dao::class);
        $daoMock->expects($this->exactly(1))
        ->method('save')->willReturn(true)
        ->with(23);

        $calculate = new Calculator($daoMock);
        $this->assertTrue($calculate->insertCalculatorValue(23));
    }
}

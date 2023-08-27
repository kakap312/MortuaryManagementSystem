<?php
namespace Tests;
Class Calculator{
    private $dao;
    function __construct($dao){
        $this->dao = $dao;
    }

    function add($a,$b)
    {
        return $a + $b;
    }
    function areaOfARectangleCalculator($width,$lenght)
    {
        return $width * $lenght;
    }

    function insertCalculatorValue($value)
    {
        $result = $this->dao->save($value);
        return $result;

    }
}
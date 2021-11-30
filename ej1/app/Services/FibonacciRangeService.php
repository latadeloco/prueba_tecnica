<?php
namespace Service;


include_once BASE_DIR . "/ej1/app/Classes/Fibonacci.php";
include_once BASE_DIR . "/ej1/app/Classes/Timestamp.php";

class FibonacciRangeService
{
    public static function getFibonacciSucession($initTimestamp, $endTimestamp) 
    {
        $fib = new \Classes\Fibonacci(
            new \Classes\Timestamp( intval($initTimestamp) ), 
            new \Classes\Timestamp( intval($endTimestamp) )
        );

        return $fib->outputAPI();
    }
}
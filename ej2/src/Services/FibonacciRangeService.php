<?php
namespace Service;

use Class\FibonacciService;
use Class\TimestampService;

class FibonacciRangeService
{
    public static function getFibonacciSucession($initTimestamp, $endTimestamp) 
    {
        $fib = new FibonacciService(
            new TimestampService ( intval($initTimestamp) ), 
            new TimestampService ( intval($endTimestamp) )
        );

        return $fib->outputAPI();
    }
}
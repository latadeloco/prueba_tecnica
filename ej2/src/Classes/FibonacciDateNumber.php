<?php

namespace Class;

use App\Interfaces\OutputInterface;

class FibonacciDateNumber implements OutputInterface
{
    private $date;
    private $number;

    public function __construct(TimestampService $date, int $number)
    {
        $this->date = $date;
        $this->number = $number;
    }

    public function getDate()
    {
        return $this->date->output();
    }

    public function getDateToTimestamp()
    {
        return $this->date;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function setNumber($number)
    {
        return $this->number = $number;
    }

    public function output()
    {
        return "";
    }
}
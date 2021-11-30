<?php

namespace Classes;

require_once BASE_DIR . '/ej1/app/Interfaces/OutputInterface.php';
require_once BASE_DIR . '/ej1/app/Classes/Timestamp.php';

class FibonacciDateNumber implements \Interfaces\OutputInterface
{
    private $date;
    private $number;

    public function __construct(Timestamp $date, int $number)
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
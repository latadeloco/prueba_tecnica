<?php

namespace Classes;

use \Datetime;
include_once BASE_DIR . '/ej1/app/Interfaces/OutputInterface.php';
include_once BASE_DIR . '/ej1/app/Interfaces/FibonacciAction.php';

class Timestamp implements \Interfaces\OutputInterface, \Interfaces\FibonacciAction
{
    private $date;
    private $dateCompare;
    private $dateFormatter;
    private $dateSumDay;
    private $timestamp;

    public function __construct($timestamp) {

        try {
            $this->preTimestamp($timestamp);
            $this->timestamp = $timestamp;
            $this->dateFormatter = $this->date = date('Y-m-d H:i:s', $timestamp);
            $this->dateCompare = $this->date = new DateTime($this->date);
        } catch (\Exception $e) {
            return json_encode($e->getMessage());
        }
    }

    private function preTimestamp($timestamp)
    {
        if (!is_int($timestamp)) {
            throw new \Exception('El valor ' . $timestamp . ' no tiene un formato timestamp');
        }
    }

    public function compare()
    {
        return $this->dateCompare;
    }

    public function format($format)
    {
        $dateTimeFormatter = new DateTime($this->dateFormatter);
        return $dateTimeFormatter->format($format);
    }

    /**
     * Salida comprensible del timestamp
     */
    public function output()
    {
        if (isset($this->dateFormatter)) {
            return $this->dateFormatter;
        } 
        throw new \Exception("El timestamp que intentas instanciar tiene un formato incorrecto para dar su salida.");
    }

    public function getTimestamp()
    {
        return $this->timestamp;
    }

    public function sumDay()
    {
        return $this->dateFormatter = date('Y-m-d H:i:s', strtotime($this->dateFormatter  . '+ 1 days'));
    }
}
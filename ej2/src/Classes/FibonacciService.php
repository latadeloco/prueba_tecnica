<?php

namespace Class;

use App\Interfaces\OutputInterface;

class FibonacciService implements OutputInterface
{
    private $fibonacci, $result;
    private TimestampService $initialTimestamp, $endTimestamp;

    public function __construct(TimestampService $initialTimestamp, TimestampService $endTimestamp)
    {
        try {
            $this->initialTimestamp = $initialTimestamp;
            $this->endTimestamp = $endTimestamp;
            $this->preCompareTimestamps($this->initialTimestamp, $this->endTimestamp);
            $this->generateFibonacci();
        } catch (\Exception $e) {
            echo json_encode($e->getMessage());
            return;
        }
    }

    private function generateFibonacci(): array
    { 
        // se recoge el año de la fecha inicial y se actualiza a principio de año para que haga bien el recorrido de fibonacci con datetime Y-m-d H:i:s
        $initYear = new TimestampService( strtotime( $this->initialTimestamp->format('Y') . '-01-01 00:00:00' ) );

        // se recogen las iteraciones totales en el for
        $totalDaysFibonacci = $initYear->compare()->diff($this->endTimestamp->compare());
        $totalDaysFibonacci = $totalDaysFibonacci->days;

        // se recoge el día inicial desde principio del año de la fecha inicial
        $initDayToFibonacci = $initYear->compare()->diff($this->initialTimestamp->compare());
        $initDayToFibonacci = --$initDayToFibonacci->days; // se disminuye un día ya que sino, no cuenta el primer dia (dia 01 del mes)

        $secondDay = new TimestampService( strtotime( $initYear->format('Y') . '-01-02 00:00:00' ) );

        $this->fibonacci = [];

        array_push($this->fibonacci, new FibonacciDateNumber($initYear, 0) );
        array_push($this->fibonacci, new FibonacciDateNumber($secondDay, 1) );

        if ($initDayToFibonacci < 0) {
            $this->result[] = $this->fibonacci[0];
            $this->result[] = $this->fibonacci[1];
        }

        for( $i = 2; $i <= $totalDaysFibonacci; $i++ ) {
        $nextTimestamp = new TimestampService(strtotime( $this->fibonacci[ count($this->fibonacci) - 1 ]->getDate() ) );
        $nextTimestamp->sumDay();

        $nextDay = new FibonacciDateNumber(
                $nextTimestamp,
                intval($this->fibonacci[$i-1]->getNumber() + $this->fibonacci[$i-2]->getNumber()) 
        );

        array_push($this->fibonacci, $nextDay);

            if ($i > $initDayToFibonacci) {
                $this->result[] = $this->fibonacci[$i];
            }
        }


        return $this->result;

    }

    private function preCompareTimestamps(TimestampService $init, TimestampService $end)
    {
        if ( $init->output() > $end->output() ) {
            throw new \Exception('La fecha inicial tiene que ser menor que la fecha de fin');
        }
    }

    public function output()
    {
        return $this->result;
    }

    public function outputAPI()
    {
        if (isset($this->result)) {
            $arryToJsonResult = [];

            for ($i = 0; $i < count($this->result); $i++) {
                $arryToJsonResult[] = array( "date" => $this->result[$i]->getDate(), "number" => $this->result[$i]->getNumber());
            }
    

            return $arryToJsonResult;
        }
    }
}

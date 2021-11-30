<?php

include_once BASE_DIR . "/ej1/app/Classes/Fibonacci.php";
include_once BASE_DIR . "/ej1/app/Classes/Timestamp.php";
include_once BASE_DIR . "/ej1/app/Services/FibonacciRangeService.php";

// Sucesión de Fibonacci que se encuentre entre el timestamp del inicio y fin del mes actual 

// El primer ejemplo se hace creando los objetos
$inicioMesActual = new Classes\Timestamp( strtotime( date("Y") . '-' . date("m") . '-01' . ' 00:00:00' ) );
$finMesActual = new Classes\Timestamp( strtotime( date("Y") . '-' . date("m") . '-' . cal_days_in_month(CAL_GREGORIAN, date("m"), date("Y")) . ' 00:00:00' ) );
$fibonacciMonth = new Classes\Fibonacci($inicioMesActual, $finMesActual);

// Sucesión de Fibonacci que se encuentre entre los timestamp del inicio y fin del año actual

// El segundo ejemplo se hace a través del servicio de FibonacciRangeService
$inicioAnioActual = ( date("Y") . '-01-01' . ' 00:00:00' );
$finAnioActual = ( date("Y") . '-12-31' . ' 00:00:00' );
$fibonacciYear = \Service\FibonacciRangeService::getFibonacciSucession(
    strtotime($inicioAnioActual), 
    strtotime($finAnioActual)
);
$fibonacciYear = json_decode($fibonacciYear);

//Se encuentre entre el timestamp del inicio y fin entre dos fechas atendiendo al formato "Y-m-d H:i:s"

// El tercer ejemplo se hace como el primero, utilizando los objetos para crear el listado timestamp/numbero_fibonacci
$inicioTimestampPersonalizado = new Classes\Timestamp( strtotime( '2020-03-15' . ' 00:00:00' ) );
$finTimestampPersonalizado    = new Classes\Timestamp( strtotime( '2021-12-12' . ' 00:00:00' ) );
$fibonacciTimestampPersonalizado = new Classes\Fibonacci($inicioTimestampPersonalizado, $finTimestampPersonalizado);

?>

<div class="container">

    <div>
        <h1>Ejercicio 1:</h1>
        <h4 class="text-muted">Podrás ver el resultado del ejercicio en esta pantalla, para ir directamente a cada apartado, puedes hacer scroll o clicando en el siguiente menú: </h4>
        <div>
            <ol>
                <li><a href="#one">Sucesión de Fibonacci que se encuentre entre el timestamp del inicio y fin del mes actual</a></li>
                <li><a href="#two">Sucesión de Fibonacci que se encuentre entre el timestamp del inicio y fin del año actual</a></li>
                <li><a href="#three">Se encuentre entre el timestamp del inicio y fin entre dos fechas atendiendo al formato "Y-m-d H:i:s"</a></li>
            </ol>
        </div>
        
    </div>

    <div class="row justify-content-center">
        
        <div class="col-12 mb-1 card" id="one">
            <div class="card-body">
                <h5 class="card-title font-weight-bold mb-4">PHP8</h5>
                <h6 class="card-subtitle mb-2 text-muted">Sucesión de Fibonacci que se encuentre entre el timestamp del inicio y fin del mes actual</h6>
                <h6 class="card-subtitle mb-2 text-muted">Desde el <?= $inicioMesActual->output() ?> hasta el <?= $finMesActual->output() ?></h6>
                
                <div class="container">
                    <div class="row justify-content-center">
                        <?php for ($i = 0; $i < count($fibonacciMonth->output()); $i++) { ?>
                            <div class="m-2">
                                <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="<?= $fibonacciMonth->output()[$i]->getDate() ?>">
                                    <?= $fibonacciMonth->output()[$i]->getNumber() ?>
                                </button>
                            </div>
                        <?php } ?>    
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 mb-1 card" id="two">
            <div class="card-body">
                <h5 class="card-title font-weight-bold mb-4">PHP8</h5>
                <h6 class="card-subtitle mb-2 text-muted">Sucesión de Fibonacci que se encuentre entre el timestamp del inicio y fin del año actual</h6>
                <h6 class="card-subtitle mb-2 text-muted">Desde el <?= $inicioAnioActual ?> hasta el <?= $finAnioActual ?></h6>
                
                <div class="container">
                    <div class="row justify-content-center">

                        <?php for ($i = 0; $i < count($fibonacciYear); $i++) { ?>
                            <div class="m-2">
                                <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="<?= $fibonacciYear[$i]->date ?>">
                                    <?= $fibonacciYear[$i]->number ?>
                                </button>
                            </div>
                        <?php } ?>    
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 mb-1 card" id="three">
            <div class="card-body">
                <h5 class="card-title font-weight-bold mb-4">PHP8</h5>
                <h6 class="card-subtitle mb-2 text-muted">Se encuentre entre el timestamp del inicio y fin entre dos fechas atendiendo al formato "Y-m-d H:i:s"</h6>
                <h6 class="card-subtitle mb-2 text-muted">Desde el <?= $inicioTimestampPersonalizado->output() ?> hasta el <?= $finTimestampPersonalizado->output() ?></h6>
                
                <div class="container">
                    <div class="row justify-content-center">
                        <?php for ($i = 0; $i < count($fibonacciTimestampPersonalizado->output()); $i++) { ?>
                            <div class="m-2">
                                <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="<?= $fibonacciTimestampPersonalizado->output()[$i]->getDate() ?>">
                                    <?= $fibonacciTimestampPersonalizado->output()[$i]->getNumber() ?>
                                </button>
                            </div>
                        <?php } ?>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
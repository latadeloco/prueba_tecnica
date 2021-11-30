<?php

namespace Api;

use \Service\FibonacciRangeService;


include_once '../../config.php';
include_once BASE_DIR . '/ej1/app/Services/FibonacciRangeService.php';

header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: GET');
header("Access-Control-Allow-Headers: X-Requested-With");
header('Content-Type: text/html; charset=utf-8');

if (isset($_GET['initTimestamp']) && isset($_GET['endTimestamp'])) {
    $initTimestamp = $_GET['initTimestamp'];
    $endTimestamp = $_GET['endTimestamp'];

    if (is_null($initTimestamp) || empty($initTimestamp)) {
        echo json_encode('La fecha inicial es nula o está vacía');
        return ;
    }

    if (is_null($endTimestamp) || empty($endTimestamp)) {
        echo json_encode('La fecha final es nula o está vacía');
        return ;
    }


    $fibo = \Service\FibonacciRangeService::getFibonacciSucession( ($initTimestamp) , intval($endTimestamp) );
    echo $fibo;

} else {
    echo json_encode('Falta la fecha inicial o la final en la url');
}

?>
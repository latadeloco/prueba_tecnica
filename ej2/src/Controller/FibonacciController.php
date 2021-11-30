<?php

namespace App\Controller;

use Service\FibonacciRangeService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class FibonacciController extends AbstractController
{
    #[Route('/fibonacci/{initTimestamp}/{endTimestamp}', name: 'rangeTimestamp')]
    public function index(Request $request)
    {
        $init = $request->get('initTimestamp');
        $end = $request->get('endTimestamp');

        $newRange = FibonacciRangeService::getFibonacciSucession(
            strtotime( $init ) ,
            strtotime( $end )
        );

        $jr = new JsonResponse($newRange, 200, [
            'Content-type' => 'application/json',
            'Access-Control-Allow-Origin' => '*'
        ]);

        return $jr;
    }
}

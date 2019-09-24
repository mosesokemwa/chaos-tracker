<?php


namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class LuckyController
{
    /**
     * @Route("/lucky/number", name="app_lucky_number")
     * @return JsonResponse
     * @throws \Exception
     */
    public function number()
    {
        $number = random_int(10, 20);
        return new JsonResponse(["data"=>["start"=>"$number", "color"=>"blue" ]]);
    }

}
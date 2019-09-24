<?php


namespace App\Controller;


use App\Service\EventLogger;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class TaskController
{

    /**
     * TaskController constructor.
     * @param EventLogger $eventLogger
     */

    public $eventLogger;


    public function __construct(EventLogger $eventLogger)
    {

        $this->eventLogger=$eventLogger;
    }

    /**
     * @Route("/home", methods={"GET", "POST"})
     * @throws \Exception
     */
    public function startWatch() {
        $startDate = new \DateTime('@'.strtotime("12:0:0"));
        return new JsonResponse(["data"=>["start"=>$startDate, "color"=>"green" ]]);
    }

    /**
     * @Route("/start", methods={"GET"})
     * @return JsonResponse
     * @throws \Exception
     */
    public function startServers()
    {
        $startServers = $this->eventLogger->serviceManager(10, 20);

        return new JsonResponse(["start"=>["number"=>"$startServers", "color"=>"green" ], "stop"=>["number"=>"$stopServers", "color"=>"pink"]]);
    }

    /**
     * @Route("/stop", methods={"GET"})
     * @return JsonResponse
     * @throws \Exception
     */
    public function stopServers()
    {
        $stopServers = $this->eventLogger->serviceManager(5, 20);
        return new JsonResponse(["stop"=>["number"=>"$stopServers", "color"=>"pink"]]);
    }


}
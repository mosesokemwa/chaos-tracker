<?php


namespace App\Controller;


use App\Entity\LogData;
use App\Service\EventLogger;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
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
     * @Route("/timer", methods={"GET", "POST"})
     * @throws \Exception
     */
    public function startWatch() {
        $startDate = new \DateTime('@'.strtotime("12:0:0"));
        return new JsonResponse(["data"=>["start"=>$startDate, "color"=>"yellow" ]]);
    }

    /**
     * @Route("/start", methods={"GET"})
     * @return JsonResponse
     */
    public function startServers()
    {
        $eventType = "START";

        $startServers = $this->eventLogger->serviceManager(10, "$eventType");
        return new JsonResponse([["number"=>$startServers, "color"=>"green"]]);
    }

    /**
     * @Route("/stop", methods={"GET"})
     * @return JsonResponse
     * @throws \Exception
     */
    public function stopServers()
    {
        $stopServers = $this->eventLogger->serviceManager(5, "STOP");
        return new JsonResponse([["number"=>$stopServers, "color"=>"pink"]]);
    }

    /**
     * @Route("/report", methods={"GET", "POST"})
     * @return JsonResponse
     */
    public function getServiceControl()
    {
        $stopServers = $this->eventLogger->reportManager(5, "REPORT");
        return new JsonResponse([["number"=>$stopServers, "color"=>"yellow"]]);
    }
}
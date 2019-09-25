<?php


namespace App\Service;
use App\Entity\LogData;
use App\Utils\DateHelpers;
use Doctrine\ORM\EntityManagerInterface;


class EventLogger
{
    /**
     * @var EntityManagerInterface
     */
    public  $entityManager;

    /**
     * @var DateHelpers
     */
    public $dateHelper;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager=$entityManager;
        $this->dateHelper = new DateHelpers();
    }

    public function logDataToDatabase($eventType, $serverNum){
        $recentTime = $this->entityManager->getRepository(LogData::class)
            ->findRecentLogTime("$eventType");
        $recentT = $recentTime[0]["programTime"]->format('Y-m-d H:i:s');

        $startDate = new \DateTime("$recentT");
        $startDate->add(new \DateInterval('PT30S'));

        if($eventType==="START"){
            $createEntry = new LogData();
            $createEntry->setEventType("$eventType");
            $createEntry->setActualTime(new  \DateTime());
            $createEntry->setServerNum($serverNum);
            $createEntry->setProgramTime($startDate);
            $this->entityManager->persist($createEntry);
            $this->entityManager->flush();


            return $recentT;
        }
        return ["error"=>false];
    }

    public function serviceManager($start, $stop, $eventType){
        try {
            $servers = random_int($start, $stop);
            $dbData = $this->logDataToDatabase($eventType, $servers);
            return ["server"=>$servers, "db"=>$dbData];
        } catch (\Exception $e) {
            return ["error"=>true,"errorMessage"=>$e->getMessage()];
        }
    }
}
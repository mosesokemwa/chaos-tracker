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

    public function logDataToDatabase($eventType, $serverNum, $seconds){
        $recentTime = $this->entityManager->getRepository(LogData::class)
            ->findRecentLogTime("$eventType");
        $recentT = $recentTime[0]["programTime"]->format('Y-m-d H:i:s');

        $startDate = new \DateTime("$recentT");
        $startDate->add(new \DateInterval($seconds));


        $createEntry = new LogData();
        $createEntry->setEventType("$eventType");
        $createEntry->setActualTime(new  \DateTime());
        $createEntry->setServerNum($serverNum);
        $createEntry->setProgramTime($startDate);
        $this->entityManager->persist($createEntry);
        $this->entityManager->flush();
        return $startDate->format('Y-m-d H:i:s');
    }

    public function serviceManager($start, $eventType){
        try {
            if ($eventType=="START"){
                $stop = 20;
                $seconds = 'PT30S';
                $servers = random_int($start, $stop);
                $dbData = $this->logDataToDatabase($eventType, $servers, $seconds);
                return ["server"=>$servers, "db"=>$dbData];
            } elseif ($eventType=="STOP"){
                $stop = $this->entityManager->getRepository(LogData::class)
                    ->findRunningServers("START");
                $seconds = 'PT40S';
                $servers = random_int($start, $stop);
                $dbData = $this->logDataToDatabase($eventType, $servers, $seconds);
                return ["server"=>$servers, "db"=>$dbData];
            }
        } catch (\Exception $e) {
            return ["error"=>true,"errorMessage"=>$e->getMessage()];
        }
    }
    public function reportManager($start, $eventType){
        try {
            $stop = $this->entityManager->getRepository(LogData::class)
                ->findRunningServers("START");
            $seconds = 'PT30S';
            $servers = random_int($start, $stop);
            $dbData = $this->logDataToDatabase($eventType, $servers, $seconds);
            return ["server"=>$servers, "db"=>$dbData];
        } catch (\Exception $e) {
            return ["error"=>true,"errorMessage"=>$e->getMessage()];
        }
    }
}
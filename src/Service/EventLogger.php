<?php


namespace App\Service;
use Doctrine\ORM\EntityManagerInterface;


class EventLogger
{
    /**
     * @var EntityManagerInterface
     */
    public  $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager=$entityManager;
    }

    public function serviceManager($start, $stop){
        try {
            $startServers = random_int($start, $stop);
            return $startServers;
        } catch (\Exception $e) {
            return ["error"=>true,"errorMessage"=>$e->getMessage()];
        }
    }
}
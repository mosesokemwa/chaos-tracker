<?php

namespace App\Repository;

use App\Entity\LogData;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method LogData|null find($id, $lockMode = null, $lockVersion = null)
 * @method LogData|null findOneBy(array $criteria, array $orderBy = null)
 * @method LogData[]    findAll()
 * @method LogData[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LogDataRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LogData::class);
    }


    // /**
    //  * @return LogData[] Returns an array of LogData objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
    public function findRecentLogTime($value)
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager
            ->createQuery(
            "SELECT p.programTime
                FROM App\Entity\LogData p 
                WHERE p.eventType = :val 
                ORDER BY p.programTime DESC"
        )->setParameter("val", "$value")
            ->setMaxResults(1);
        return $query->execute();
    }
}

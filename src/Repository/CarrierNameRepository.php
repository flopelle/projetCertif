<?php

namespace App\Repository;

use App\Entity\CarrierName;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CarrierName|null find($id, $lockMode = null, $lockVersion = null)
 * @method CarrierName|null findOneBy(array $criteria, array $orderBy = null)
 * @method CarrierName[]    findAll()
 * @method CarrierName[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarrierNameRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CarrierName::class);
    }

    // /**
    //  * @return CarrierName[] Returns an array of CarrierName objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CarrierName
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

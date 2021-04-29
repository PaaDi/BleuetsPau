<?php

namespace App\Repository;

use App\Entity\MarquerBut;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MarquerBut|null find($id, $lockMode = null, $lockVersion = null)
 * @method MarquerBut|null findOneBy(array $criteria, array $orderBy = null)
 * @method MarquerBut[]    findAll()
 * @method MarquerBut[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MarquerButRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MarquerBut::class);
    }

    // /**
    //  * @return MarquerBut[] Returns an array of MarquerBut objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MarquerBut
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

<?php

namespace App\Repository;

use App\Entity\RecevoirCarton;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RecevoirCarton|null find($id, $lockMode = null, $lockVersion = null)
 * @method RecevoirCarton|null findOneBy(array $criteria, array $orderBy = null)
 * @method RecevoirCarton[]    findAll()
 * @method RecevoirCarton[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RecevoirCartonRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RecevoirCarton::class);
    }

    // /**
    //  * @return RecevoirCarton[] Returns an array of RecevoirCarton objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RecevoirCarton
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

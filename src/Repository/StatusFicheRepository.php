<?php

namespace App\Repository;

use App\Entity\StatusFiche;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method StatusFiche|null find($id, $lockMode = null, $lockVersion = null)
 * @method StatusFiche|null findOneBy(array $criteria, array $orderBy = null)
 * @method StatusFiche[]    findAll()
 * @method StatusFiche[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StatusFicheRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StatusFiche::class);
    }

    // /**
    //  * @return StatusFiche[] Returns an array of StatusFiche objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?StatusFiche
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

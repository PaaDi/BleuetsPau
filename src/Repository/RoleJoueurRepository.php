<?php

namespace App\Repository;

use App\Entity\RoleJoueur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RoleJoueur|null find($id, $lockMode = null, $lockVersion = null)
 * @method RoleJoueur|null findOneBy(array $criteria, array $orderBy = null)
 * @method RoleJoueur[]    findAll()
 * @method RoleJoueur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RoleJoueurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RoleJoueur::class);
    }

    // /**
    //  * @return RoleJoueur[] Returns an array of RoleJoueur objects
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
    public function findOneBySomeField($value): ?RoleJoueur
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

<?php

namespace App\Repository;

use App\Entity\FicheMatch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FicheMatch|null find($id, $lockMode = null, $lockVersion = null)
 * @method FicheMatch|null findOneBy(array $criteria, array $orderBy = null)
 * @method FicheMatch[]    findAll()
 * @method FicheMatch[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FicheMatchRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FicheMatch::class);
    }

    // /**
    //  * @return FicheMatch[] Returns an array of FicheMatch objects
    //  */
    public function findByCoach($coachId)
    {
        return $this->createQueryBuilder('f')
            ->join("f.EquipeDomicile", "eD")
            ->join("f.EquipeExterieure", "eE")
            ->where('eD.idEntraineur = :cDid')
            ->orWhere('eE.idEntraineur = :cEid')
            ->setParameter('cDid', $coachId)
            ->setParameter('cEid', $coachId)
            ->orderBy('f.DateDebut', 'DESC')
            ->getQuery()
            ->getResult()
        ;
    }


    /*
    public function findOneBySomeField($value): ?FicheMatch
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

<?php

namespace App\Repository;

use App\Entity\Commun;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Commun|null find($id, $lockMode = null, $lockVersion = null)
 * @method Commun|null findOneBy(array $criteria, array $orderBy = null)
 * @method Commun[]    findAll()
 * @method Commun[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CommunRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Commun::class);
    }

    // /**
    //  * @return Commun[] Returns an array of Commun objects
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
    public function findOneBySomeField($value): ?Commun
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

<?php

namespace App\Repository;

use App\Entity\Trgroup;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Trgroup|null find($id, $lockMode = null, $lockVersion = null)
 * @method Trgroup|null findOneBy(array $criteria, array $orderBy = null)
 * @method Trgroup[]    findAll()
 * @method Trgroup[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TrgroupRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Trgroup::class);
    }

    // /**
    //  * @return Trgroup[] Returns an array of Trgroup objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Trgroup
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

<?php

namespace App\Repository;

use App\Entity\ServiceSearch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ServiceSearch|null find($id, $lockMode = null, $lockVersion = null)
 * @method ServiceSearch|null findOneBy(array $criteria, array $orderBy = null)
 * @method ServiceSearch[]    findAll()
 * @method ServiceSearch[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ServiceSearchRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ServiceSearch::class);
    }

    // /**
    //  * @return ServiceSearch[] Returns an array of ServiceSearch objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ServiceSearch
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

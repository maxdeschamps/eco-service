<?php

namespace App\Repository;

use App\Entity\ProductSearch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ProductSearch|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProductSearch|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProductSearch[]    findAll()
 * @method ProductSearch[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductSearchRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProductSearch::class);
    }

    // /**
    //  * @return ProductSearch[] Returns an array of ProductSearch objects
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
    public function findOneBySomeField($value): ?ProductSearch
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

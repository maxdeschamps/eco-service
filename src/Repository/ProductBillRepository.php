<?php

namespace App\Repository;

use App\Entity\ProductBill;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ProductBill|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProductBill|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProductBill[]    findAll()
 * @method ProductBill[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductBillRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProductBill::class);
    }

    // /**
    //  * @return ProductBill[] Returns an array of ProductBill objects
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
    public function findOneBySomeField($value): ?ProductBill
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

<?php

namespace App\Repository;

use App\Entity\ServiceFile;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ServiceFile|null find($id, $lockMode = null, $lockVersion = null)
 * @method ServiceFile|null findOneBy(array $criteria, array $orderBy = null)
 * @method ServiceFile[]    findAll()
 * @method ServiceFile[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ServiceFileRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ServiceFile::class);
    }

    // /**
    //  * @return ServiceFile[] Returns an array of ServiceFile objects
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
    public function findOneBySomeField($value): ?ProductFile
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

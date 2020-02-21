<?php

namespace App\Repository;

use App\Entity\LinkImage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method LinkImage|null find($id, $lockMode = null, $lockVersion = null)
 * @method LinkImage|null findOneBy(array $criteria, array $orderBy = null)
 * @method LinkImage[]    findAll()
 * @method LinkImage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LinkImageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LinkImage::class);
    }

    // /**
    //  * @return LinkFile[] Returns an array of LinkFile objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LinkFile
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

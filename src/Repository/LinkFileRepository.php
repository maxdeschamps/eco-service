<?php

namespace App\Repository;

use App\Entity\LinkFile;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method LinkFile|null find($id, $lockMode = null, $lockVersion = null)
 * @method LinkFile|null findOneBy(array $criteria, array $orderBy = null)
 * @method LinkFile[]    findAll()
 * @method LinkFile[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LinkFileRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LinkFile::class);
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

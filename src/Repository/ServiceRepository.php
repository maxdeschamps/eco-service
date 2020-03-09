<?php

namespace App\Repository;

use App\Entity\Service;
use App\Data\SearchData;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\Query;
use Doctrine\ORM\QueryBuilder;

/**
 * @method Service|null find($id, $lockMode = null, $lockVersion = null)
 * @method Service|null findOneBy(array $criteria, array $orderBy = null)
 * @method Service[]    findAll()
 * @method Service[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ServiceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Service::class);
    }

    public function findAllVisibleQuery(SearchData $search): Query
    {
        $query = $this->getSearchQuery($search)->getQuery();
        return $query;
    }

    public function finMinMax(SearchData $search): array
    {
      $results = $this->getSearchQuery($search, true)
        ->select('MIN(service.price_ttc) as min', 'MAX(service.price_ttc) as max')
        ->getQuery()
        ->getScalarResult();

      return [(int)$results[0]['min'], (int)$results[0]['max']];
    }

    private function getSearchQuery(SearchData $search, $ignorePrice = false): QueryBuilder
    {
      $query = $this
      ->createQueryBuilder('service')
      ->select('service');

      if (!empty($search->q)) {
        $query = $query
          ->andWhere('service.name LIKE :q')
          ->setParameter('q', "%{$search->q}%");
      }

      if (!empty($search->min) && $ignorePrice === false) {
        $query = $query
          ->andWhere('service.price_ttc >= :min')
          ->setParameter('min', $search->min);
      }

      if (!empty($search->max) && $ignorePrice === false) {
        $query = $query
          ->andWhere('service.price_ttc <= :max')
          ->setParameter('max', $search->max);
      }

      return $query;
    }

    // /**
    //  * @return Service[] Returns an array of Service objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Service
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

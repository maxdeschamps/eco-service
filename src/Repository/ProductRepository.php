<?php

namespace App\Repository;

use App\Entity\Product;
use App\Entity\ProductSearch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\Query;
use Doctrine\ORM\QueryBuilder;
use App\Data\SearchData;

/**
 * @method Product|null find($id, $lockMode = null, $lockVersion = null)
 * @method Product|null findOneBy(array $criteria, array $orderBy = null)
 * @method Product[]    findAll()
 * @method Product[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Product::class);
    }

    public function findAllVisibleQuery(SearchData $search): Query
    {
        $query = $this
        ->findVisibleQuery('product')
        ->select('category', 'product')
        ->join('product.category', 'category');

        if (!empty($search->q)) {
          $query = $query
            ->andWhere('product.name LIKE :q')
            ->setParameter('q', "%{$search->q}%");
        }

        if (!empty($search->min)) {
          $query = $query
            ->andWhere('product.price_ttc >= :min')
            ->setParameter('min', $search->min);
        }

        if (!empty($search->max)) {
          $query = $query
            ->andWhere('product.price_ttc <= :max')
            ->setParameter('max', $search->max);
        }

        if (!empty($search->categories)) {
          $query = $query
            ->andWhere('category.id IN (:categories)')
            ->setParameter('categories', $search->categories);
        }

        return $query->getQuery();
    }

    public function findVisibleQuery():QueryBuilder
    {
        return $this->createQueryBuilder('product');
    }

    // /**
    //  * @return Product[]
    //  */
    // public function findAll(): array
    // {
    //   $entityManager = $this->getEntityManager();
    //
    //   $query = $entityManager->createQuery(
    //     'SELECT p.id, p.price_ht, p.price_ttc, p.quantity, p.category
    //     FROM App\Entity\Product p'
    //   );
    //
    //   // returns an array of Product objects
    //   return $query->getResult();
    // }

    // /**
    //  * @return Product[] Returns an array of Product objects
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
    public function findOneBySomeField($value): ?Product
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

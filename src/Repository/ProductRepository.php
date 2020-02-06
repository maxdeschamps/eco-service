<?php

namespace App\Repository;

use App\Entity\Product;
use App\Entity\ProductSearch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\Query;
use Doctrine\ORM\QueryBuilder;

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


   /* public function findAllVisibleQuery(ProductSearch $search): Query
    {
        $query = $this->findVisibleQuery();

        if($search->getMinPriceTtc()){
            $query= $query
                ->andWhere('product.price_ttc >= :min_priceTtc')
                ->setParameter('min_priceTtc', $search->getMinPriceTtc());
        }

        if($search->getMaxPriceTtc()){
            $query= $query
                ->andWhere('product.price_ttc <= :max_priceTtc')
                ->setParameter('max_priceTtc', $search->getMaxPriceTtc());
        }
        return $query->getQuery();
    }

    public function findVisibleQuery():QueryBuilder
    {
        return $this->createQueryBuilder('product');
    }*/
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

<?php

namespace App\Repository;

use App\Entity\Article;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\Query;
use Doctrine\ORM\QueryBuilder;
use App\Data\SearchData;

/**
 * @method Article|null find($id, $lockMode = null, $lockVersion = null)
 * @method Article|null findOneBy(array $criteria, array $orderBy = null)
 * @method Article[]    findAll()
 * @method Article[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Article::class);
    }

    public function findAllVisibleQuery(SearchData $search): Query
    {
        $query = $this->getSearchQuery($search)->getQuery();
        return $query;
    }

    private function getSearchQuery(SearchData $search): QueryBuilder
    {
      $query = $this
      ->createQueryBuilder('article')
      ->select('category', 'article')
      ->join('article.category', 'category');

      if (!empty($search->q)) {
        $query = $query
          ->andWhere('article.name LIKE :q')
          ->setParameter('q', "%{$search->q}%");
      }

      if (!empty($search->categories)) {
        $query = $query
          ->andWhere('article.id IN (:categories)')
          ->setParameter('categories', $search->categories);
      }

      //dd($query);
      return $query;
    }

    // /**
    //  * @return Article[] Returns an array of Article objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Article
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

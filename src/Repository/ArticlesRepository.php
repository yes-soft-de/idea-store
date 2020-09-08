<?php

namespace App\Repository;

use App\Entity\Articles;
use Doctrine\ORM\Query\Expr\Join;
use App\Entity\Comments;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Articles|null find($id, $lockMode = null, $lockVersion = null)
 * @method Articles|null findOneBy(array $criteria, array $orderBy = null)
 * @method Articles[]    findAll()
 * @method Articles[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticlesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Articles::class);
    }

    // /**
    //  * @return Articles[] Returns an array of Articles objects
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
    public function findOneBySomeField($value): ?Articles
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function getAll()
    {
        $res = $this->createQueryBuilder('article')
            ->getQuery()
            ->getResult();

        return $res;
    }

    public function getArticleById($id): ?Articles
    {
        $res = $this->createQueryBuilder('article')
            ->andWhere('article.id=:id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getOneOrNullResult();

        return $res;
    }
    public function getArticleWithComment($id): array
    {
        $res = $this->createQueryBuilder('article')
            ->addSelect('article.id','article.article','article.articleTitle','article.date','c.comment')
            ->leftJoin(
                 Comments::class,         // Entity
                 'c',                    // Alias
                 Join::WITH,            // Join type
                 'c.artical = article.id'     // Join columns
                 )
            ->andWhere('article.id=:id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getResult();

        return $res;
    }
}

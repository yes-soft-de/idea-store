<?php

namespace App\Repository;

use App\Entity\Categories;
use App\Entity\Project;
use App\Entity\Images;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\Query\Expr\Join;

/**
 * @method Categories|null find($id, $lockMode = null, $lockVersion = null)
 * @method Categories|null findOneBy(array $criteria, array $orderBy = null)
 * @method Categories[]    findAll()
 * @method Categories[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoriesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Categories::class);
    }

    // /**
    //  * @return Categories[] Returns an array of Categories objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Categories
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    public function findCategoryByld($id): ?object
    {
        return  $res= $this->createQueryBuilder('Categories')
            ->andWhere('Categories.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getOneOrNullResult();
               
    }
   
    public function getAllCategoriesWithProject()
    {
        $res = $this->createQueryBuilder('Categories')
            ->addSelect('p.projectName','p.description',
            'p.ideaCode','p.DurationOfImplementation','p.costImplementation','p.initialUserExperienceStudy','p.notes','p.similarSites','p.ageGroup','p.country','p.platforms','p.linkUX','i.image','Categories.category')
            ->join(
                Project::class,                      // Entity
                'p',                                // Alias
                Join::WITH,                        // Join type
               'p.idCategories = Categories.id'   // Join columns
                )
            ->leftJoin(
                Images::class,         // Entity
                'i',                  // Alias
                Join::WITH,          // Join type
                'p.id = i.project'  // Join columns
                )
            ->getQuery()
            ->getResult();
        return $res;
    }
}

<?php

namespace App\Repository;

use App\Entity\Project;
use App\Entity\Images;
use App\Entity\Categories;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\Query\Expr\Join;

/**
 * @method Project|null find($id, $lockMode = null, $lockVersion = null)
 * @method Project|null findOneBy(array $criteria, array $orderBy = null)
 * @method Project[]    findAll()
 * @method Project[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProjectRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Project::class);
    }

    // /**
    //  * @return Project[] Returns an array of Project objects
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
    public function findOneBySomeField($value): ?Project
    {
    return $this->createQueryBuilder('p')
    ->andWhere('p.exampleField = :val')
    ->setParameter('val', $value)
    ->getQuery()
    ->getOneOrNullResult()
    ;
    }
     */

    public function findProjectByld($id): ?Project
    {
        return $res = $this->createQueryBuilder('project')
            
            ->andWhere('project.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
           ->getOneOrNullResult();

    }
    /**
     * @return Project[] Returns an array of Project objects
     */
    public function findProjectAndImagesByld($id): array
    {

        return $this->createQueryBuilder('p')
            ->select('p.id', 'p.projectName', 'p.description',
                    'p.ideaCode','p.DurationOfImplementation','p.costImplementation','p.initialUserExperienceStudy','p.notes','p.similarSites','p.ageGroup','p.country','p.platforms','p.linkUX',            'i.image','c.category')
        
            ->leftJoin(
                Images::class,     // Entity
                'i',               // Alias
                Join::WITH,        // Join type
               'p.id = i.project'  // Join columns
                )
            ->leftJoin(
                Categories::class,          // Entity
                'c',                       // Alias
                Join::WITH,               // Join type
               'p.idCategories = c.id'   // Join columns
                )
            ->andWhere('p.id=:id')  
            ->setParameter('id', $id)
            ->getQuery()
            ->getResult();
        
    }
    public function getAll()
    {
        $res = $this->createQueryBuilder('p')
            ->addSelect('p.id','p.projectName','p.description',
            'p.ideaCode','p.DurationOfImplementation','p.costImplementation','p.initialUserExperienceStudy','p.notes','p.similarSites','p.ageGroup','p.country','p.platforms','p.linkUX','i.image','c.category')
        
            ->leftJoin(
                Images::class,           // Entity
                'i',                    // Alias
                Join::WITH,            // Join type
                'p.id = i.project'     // Join columns
                )
            ->leftJoin(
                Categories::class,          // Entity
                'c',                       // Alias
                Join::WITH,               // Join type
               'p.idCategories = c.id'   // Join columns
                )
            ->getQuery()
            ->getResult();
        return $res;
    }
    public function getAllFeaturedIdeas()
    {
        $res = $this->createQueryBuilder('p')
            ->addSelect('p.id','p.projectName','p.description',
            'p.ideaCode','p.DurationOfImplementation','p.costImplementation','p.initialUserExperienceStudy','p.notes','p.similarSites','p.ageGroup','p.country','p.platforms','p.linkUX','i.image','c.category')
        
            ->leftJoin(
            Images::class,           // Entity
            'i',                    // Alias
            Join::WITH,            // Join type
           'p.id = i.project'     // Join columns
            )
            ->leftJoin(
                Categories::class,          // Entity
                'c',                       // Alias
                Join::WITH,               // Join type
               'p.idCategories = c.id'   // Join columns
                )
            ->andWhere('p.isFeaturedIdea=1')  
            ->getQuery()
            ->getResult();
        return $res;
    }
}

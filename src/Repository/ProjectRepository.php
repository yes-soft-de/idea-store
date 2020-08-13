<?php

namespace App\Repository;

use App\Entity\Project;
<<<<<<< HEAD
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
=======
use App\Entity\Images;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\Query\Expr\Join;
>>>>>>> f055343e76a9fc4dd5ec6b0304d34424e8f48e44

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
<<<<<<< HEAD
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
=======
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
>>>>>>> f055343e76a9fc4dd5ec6b0304d34424e8f48e44

    /*
    public function findOneBySomeField($value): ?Project
    {
<<<<<<< HEAD
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
        
        return  $res= $this->createQueryBuilder('project')
            ->andWhere('project.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getOneOrNullResult();
               
    }

    public function getAll()
    {
        return $this->createQueryBuilder('Project')
            ->getQuery()
            ->getResult();
    }

    
=======
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
            ->select('p.id', 'p.projectName', 'p.description', 'i.image')
            // ->from('App:Images', 'i')
            // ->andWhere('p.id=:id')
            // ->andWhere('p.id=i.project')
            // ->setParameter('id', $id)
            ->leftJoin(
                Images::class,     // Entity
                'i',               // Alias
                Join::WITH,        // Join type
               'p.id = i.project'  // Join columns
                )
            ->andWhere('p.id=:id')  
            ->setParameter('id', $id)
            ->getQuery()
            ->getResult();
        
    }
    public function getAll()
    {
        $res = $this->createQueryBuilder('p')
            ->addSelect('p.id','p.projectName','p.description','i.image')
        
            ->leftJoin(
            Images::class,           // Entity
            'i',                    // Alias
            Join::WITH,            // Join type
           'p.id = i.project'     // Join columns
            )
            ->getQuery()
            ->getResult();
        return $res;
    }
  
>>>>>>> f055343e76a9fc4dd5ec6b0304d34424e8f48e44
}

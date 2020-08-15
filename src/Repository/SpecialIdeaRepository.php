<?php

namespace App\Repository;

use App\Entity\SpecialIdea;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SpecialIdea|null find($id, $lockMode = null, $lockVersion = null)
 * @method SpecialIdea|null findOneBy(array $criteria, array $orderBy = null)
 * @method SpecialIdea[]    findAll()
 * @method SpecialIdea[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SpecialIdeaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SpecialIdea::class);
    }

    // /**
    //  * @return SpecialIdea[] Returns an array of SpecialIdea objects
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
    public function findOneBySomeField($value): ?SpecialIdea
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

<?php

namespace App\Repository;

use App\Entity\Images;
use App\Entity\Orders;
use App\Entity\Project;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query\Expr\Join;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Orders|null find($id, $lockMode = null, $lockVersion = null)
 * @method Orders|null findOneBy(array $criteria, array $orderBy = null)
 * @method Orders[]    findAll()
 * @method Orders[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrdersRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Orders::class);
    }

    // /**
    //  * @return Orders[] Returns an array of Orders objects
    //  */
    /*
    public function findByExampleField($value)
    {
    return $this->createQueryBuilder('o')
    ->andWhere('o.exampleField = :val')
    ->setParameter('val', $value)
    ->orderBy('o.id', 'ASC')
    ->setMaxResults(10)
    ->getQuery()
    ->getResult()
    ;
    }
     */

    /*
    public function findOneBySomeField($value): ?Orders
    {
    return $this->createQueryBuilder('o')
    ->andWhere('o.exampleField = :val')
    ->setParameter('val', $value)
    ->getQuery()
    ->getOneOrNullResult()
    ;
    }
     */
    public function getAll()
    {
        $res = $this->createQueryBuilder('Orders')
            ->select('Orders.id', 'p.projectName', 'p.description', 'u.userName', 'u.email', 'u.phone', 'i.image')
            ->leftJoin(
                User::class,            // Entity
                'u',                   // Alias
                Join::WITH,           // Join type
                'Orders.user = u.id' // Join columns
            )
            ->leftJoin(
                Project::class,            // Entity
                'p',                      // Alias
                Join::WITH,              // Join type
                'Orders.project = p.id' // Join columns
            )
            ->leftJoin(
                Images::class,          // Entity
                'i',                    // Alias
                Join::WITH,             // Join type
                'p.id = i.project'      // Join columns
            )
            ->getQuery()
            ->getResult();

        return $res;
    }
    public function findOByld($id): ?Orders
    {
        return $res = $this->createQueryBuilder('Orders')
            ->andWhere('Orders.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getOneOrNullResult();

    }
    public function findOrderWithByld($id)
    {
        $res = $this->createQueryBuilder('Orders')
            ->select('Orders.id', 'p.projectName', 'p.description', 'u.userName', 'u.email', 'u.phone', 'i.image')
            ->leftJoin(
                User::class,             // Entity
                'u',                     // Alias
                Join::WITH,              // Join type
                'Orders.user = u.id'     // Join columns
            )
            ->leftJoin(
                Project::class,           // Entity
                'p',                     // Alias
                Join::WITH,              // Join type
                'Orders.project = p.id' // Join columns
            )
            ->leftJoin(
                Images::class,       // Entity
                'i',                 // Alias
                Join::WITH,          // Join type
                'p.id = i.project'   // Join columns
            )
            ->andWhere('Orders.id=:id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getResult();
        return $res;

    }

}

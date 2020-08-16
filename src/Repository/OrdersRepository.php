<?php

namespace App\Repository;

<<<<<<< HEAD
use App\Entity\Orders;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
=======
use App\Entity\Images;
use App\Entity\Orders;
use App\Entity\Project;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query\Expr\Join;
>>>>>>> f055343e76a9fc4dd5ec6b0304d34424e8f48e44
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
<<<<<<< HEAD
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
=======
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
>>>>>>> f055343e76a9fc4dd5ec6b0304d34424e8f48e44

    /*
    public function findOneBySomeField($value): ?Orders
    {
<<<<<<< HEAD
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
=======
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

>>>>>>> f055343e76a9fc4dd5ec6b0304d34424e8f48e44
}

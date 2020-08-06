<?php

namespace App\Repository;

use App\Entity\Orders;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use phpDocumentor\Reflection\Types\Null_;

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
        ->select('Orders.id','p.projectName','p.description','u.userName','u.email','u.phone','i.image')
            ->from('App:Project', 'p')
            ->from('App:Images', 'i')
            ->from('App:User', 'u')
            ->andWhere('Orders.project=p.id')
            ->andWhere('Orders.user=u.id')
            ->andWhere('p.id=i.project')
            ->getQuery()
            ->getResult();
       return $res;
    }
      /**
     * @return Project[] Returns an array of Project objects
     */
    public function findOrderByld($id): array
    {
        $res = $this->createQueryBuilder('Orders')
        ->select('Orders.id','p.projectName','p.description','u.userName','u.email','u.phone','i.image')
            ->from('App:Project', 'p')
            ->from('App:Images', 'i')
            ->from('App:User', 'u')
            ->andWhere('Orders.id=:id')
            ->andWhere('Orders.project=p.id')
            ->andWhere('Orders.user=u.id')
            ->andWhere('p.id=i.project')
            ->setParameter('id', $id)
            ->getQuery()
            
            ->getResult();
       return $res;
        
    } 

    
}

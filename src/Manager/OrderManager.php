<?php
namespace App\Manager;

use App\AutoMapping;
use App\Entity\Orders;
use App\Entity\Project;
use App\Entity\Images;
use App\Entity\User;
use App\Repository\OrdersRepository;
use App\Request\CreateOrderRequest;
use App\Request\DeleteRequest;
use App\Request\GetByIdRequest;
use App\Request\UpdateOrderRequest;
use Doctrine\ORM\EntityManagerInterface;
class OrderManager
{
    private $entityManager;
    private $orderRepository;
    private $autoMapping;
    
    public function __construct(EntityManagerInterface $entityManagerInterface,
        OrdersRepository $orderRepository, AutoMapping $autoMapping) {
        $this->entityManager   = $entityManagerInterface;
        $this->orderRepository = $orderRepository;
        $this->autoMapping     = $autoMapping;
      
    }

    public function create(CreateOrderRequest $request)
    {

        if ($request->project && $request->user) {
            
            $project = $this->entityManager->getRepository(Project::class)
                ->find($request->project);
            $request->setProject($project);
        
            $user = $this->entityManager->getRepository(User::class)
                ->find($request->user);
            $request->setUser($user);
        }

        $orderEntity = $this->autoMapping->map(CreateOrderRequest::class, Orders::class, $request);
        $this->entityManager->persist($orderEntity);
        $this->entityManager->flush();
        $this->entityManager->clear();
        return $orderEntity;
    }

    public function getAll()
    {
        $data = $this->orderRepository->getAll();

        return $data;
    }

    public function getOrderById(GetByIdRequest $request)
    {
        return $result = $this->orderRepository->findOrderWithByld($request->getId());
    }

    public function delete(DeleteRequest $request)
    {

        $order = $this->orderRepository->findOByld($request->getId());

        if (!$order) {
            // return new Response(['data'=>'this project  is not found']);

        } else {

            $this->entityManager->remove($order);
            $this->entityManager->flush();
        }
        return $order;
    }
    public function update(UpdateOrderRequest $request)
    {
        if ($request->project && $request->user) {
            $project = $this->entityManager->getRepository(Project::class)
                ->find($request->project);
            $request->setProject($project);
            $user = $this->entityManager->getRepository(User::class)
                ->find($request->user);
            $request->setUser($user);
        }

        $orderEntity = $this->orderRepository->findOByld($request->getId());
        if (!$orderEntity) {

        } else {
            $orderEntity = $this->autoMapping->mapToObject(UpdateOrderRequest::class, Orders::class, $request, $orderEntity);
            $this->entityManager->flush();
        }
        return $orderEntity;
    }
}

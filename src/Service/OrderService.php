<?php

namespace App\Service;

use App\AutoMapping;
use App\Manager\OrderManager;
use App\Respons\CreateOrderResponse;
use App\Entity\Orders;
use App\Respons\GetOrdersResponse;
use App\Respons\UpdateOrderResponse;
use App\Respons\GetOrderByIdResponse;;
class OrderService
{
    private $orderManager;
    private $autoMapping;
    //private $userManager;
    public function __construct(OrderManager $orderManager, AutoMapping $autoMapping)
    {
        $this->orderManager    = $orderManager;
        $this->autoMapping     = $autoMapping;
    }

    public function create($request, $idProject, $idUser)
    {

        $request->setProject($request->getProject($idProject));
        $request->setUser($request->getUser($idUser));

        $orderResult = $this->orderManager->create($request);
        $orderResult->getProject($idProject);
        $orderResult->getUser($idUser);
       
        $response = $this->autoMapping->map(Orders::class, CreateOrderResponse::class,
            $orderResult);

        return $response;
    }

    public function getAll()
    {
        $result = $this->orderManager->getAll();
        $response = [];
        foreach ($result as $row) {
            $response[] = $this->autoMapping->map('array'::class, GetOrdersResponse::class, $row);
        }
        return $response;
    }

    public function getOrderById($request)
    {
        $result = $this->orderManager->getOrderById($request);
        $response=[];
        foreach ($result as $row) {
            $response[] = $this->autoMapping->map('array', GetOrderByIdResponse::class, $row);
        }
        // $response = $this->autoMapping->map(Orders::class, GetOrderByIdResponse::class, $result);
        return $response;
    }

    public function delete($request)
    {
        $orderResult   = $this->orderManager->delete($request);
        $response = $this->autoMapping->map(Orders::class, GetOrderByIdResponse::class, $orderResult);
       
        return $response;

    }

    public function update($request)
    {

        $orderResult = $this->orderManager->update($request);

        $response = $this->autoMapping->map(Orders::class, UpdateOrderResponse::class, $orderResult);
       
        return $response;
    }
}

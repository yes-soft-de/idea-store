<?php

namespace App\Controller;

use App\AutoMapping;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Request\CreateOrderRequest;
use App\Service\OrderService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Request\GetByIdRequest;
use App\Request\DeleteRequest;
use App\Request\UpdateOrderRequest;
class OrderController extends BaseController
{
    private $orderService;
    private $autoMapping;
    /**
     * OrderController constructor.
     * @param OrderService $orderService
     */
    public function __construct(OrderService $orderService, AutoMapping $autoMapping)
    {
        $this->orderService = $orderService;
        $this->autoMapping = $autoMapping;
    }

    /**
     * @Route("/order/{idProject}/{idUser}", name="createOrder",methods={"POST"})
     * @param Request $request
     * @return Response
     */
    public function create(Request $request, $idProject, $idUser)
    {
        $data = json_decode($request, true);
        $request = $this->autoMapping->map(\stdClass::class, CreateOrderRequest::class, (object) $data);
        $request->setProject($idProject);
        $request->setUser($idUser);
         
        $result = $this->orderService->create($request, $idProject, $idUser);
       
        return $this->response($result, self::CREATE);        
    }

    /**
     * @Route("/orders", name="getAllorders",methods={"GET"})
     * @return JsonResponse
     */
    public function getAll()
    {
        $result = $this->orderService->getAll();
        return $this->response($result, self::FETCH);
    }

     /**
     * @Route("/order/{id}", name="getOrderById",methods={"GET"})
     * @param Request $request
     * @return JsonResponse
     */
    public function getOrderById(Request $request)
    {
        $request = new GetByIdRequest($request->get('id'));
        $result = $this->orderService->getOrderById($request);
        return $this->response($result, self::FETCH);
    }

     /**
     * @Route("/order/{id}", name="deleteOrder",methods={"DELETE"})
     * @param Request $request
     * @return JsonResponse
     */
    public function delete(Request $request)
    {
        $request = new DeleteRequest($request->get('id'));
        $result = $this->orderService->delete($request);
        return $this->response(" ", self::DELETE);

    }

    /**
     * @Route("/order/{id}/{idProject}/{idUser}", name="updateOrder",methods={"PUT"})
     * @param Request $request
     * @return JsonResponse|Response
     */
    public function update(Request $request, $idProject,$idUser)
    {
        $data = json_decode($request->getContent(), true);

        $id = $request->get('id');

        $request = $this->autoMapping->map(\stdClass::class, UpdateOrderRequest::class, (object) $data);
        $request->setId($id);
        $request->setProject($idProject);
        $request->setUser($idUser);
        $result = $this->orderService->update($request);
        return $this->response($result, self::UPDATE);
    }
}

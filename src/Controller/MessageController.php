<?php


namespace App\Controller;


use App\AutoMapping;
use App\Request\CreateMessageRequest;
use App\Request\DeleteRequest;
use App\Request\GetByIdRequest;
use App\Service\MessageService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MessageController extends BaseController
{
    private $messageService;
    private $autoMapping;
    //private $user;

    /**
     * MessageController constructor.
     * @param MessageService $messageService
     * @param AutoMapping $autoMapping
     */
    public function __construct(MessageService $messageService, AutoMapping $autoMapping)
    {
        $this->messageService = $messageService;
        $this->autoMapping = $autoMapping;
    }

    /**
     * @Route("/messages/{idUser}", name="createMessage", methods={"POST"})
     * @param Request $request
     * @return Response
     */
    public function create(Request $request, $idUser)
    {
        $data = json_decode($request->getContent(), true);

        $request = $this->autoMapping->map(\stdClass::class, CreateMessageRequest::class, (object)$data);
        $request->setUser($idUser);
        $result = $this->messageService->create($request, $idUser);

        return $this->response($result, self::CREATE);
    }

    /**
     * @Route("/messages", name="getMessages", methods={"GET"})
     * @return JsonResponse
     */
    public function getAll()
    {
        $result = $this->messageService->getAll();

        return $this->response($result, self::FETCH);
    }

    /**
     * @Route("/messages/{id}", name="getOneMessage", methods={"GET"})
     * @param Request $request
     * @return JsonResponse
     */
    public function getById(Request $request)
    {
        $request = new GetByIdRequest($request->get('id'));
        $result = $this->messageService->getById($request);
        return $this->response($result, self::FETCH);
    }

    /**
     * @Route("/messages/{id}", name="deleteMessage", methods={"DELETE"})
     * @param Request $request
     * @return JsonResponse
     */
    public function delete(Request $request)
    {
        $request = new DeleteRequest($request->get('id'));
        $result = $this->messageService->delete($request);
        return $this->response(" ", self::DELETE);
    }
}
<?php


namespace App\Service;


use App\AutoMapping;
use App\Entity\Messages;
use App\Manager\MessageManager;
use App\Respons\CreateMessageResponse;
use App\Respons\GetMessageByIdResponse;
use App\Respons\GetMessageResponse;

class MessageService
{
    private $messageManager;
    private $autoMapping;

    public function __construct(MessageManager $messageManager, AutoMapping $autoMapping)
    {
        $this->messageManager = $messageManager;
        $this->autoMapping = $autoMapping;
    }

    public function create($request, $idUser)
    {
        $request->setUser($request->getUser($idUser));
        $result = $this->messageManager->create($request);
        $result->getUser($idUser);
        $response = $this->autoMapping->map(Messages::class, CreateMessageResponse::class, $result);
        return $response;
    }

    public function getAll()
    {
        $result = $this->messageManager->getAllMessages();
        $response = [];
        foreach ($result as $row)
        {
            $response[] = $this->autoMapping->map(Messages::class, GetMessageResponse::class, $row);
        }
        return $response;
    }

    public function getById($request)
    {
        $result = $this->messageManager->getMessageById($request);
        $response = $this->autoMapping->map(Messages::class, GetMessageByIdResponse::class, $result);
        return $response;
    }

    public function delete($request)
    {
        $messageResult = $this->messageManager->delete($request);
        $response = $this->autoMapping->map(Messages::class, GetMessageByIdResponse::class, $messageResult);
        return $response;
    }
}
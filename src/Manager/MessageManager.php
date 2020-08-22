<?php


namespace App\Manager;


use App\AutoMapping;
use App\Entity\Messages;
use App\Entity\User;
use App\Repository\MessagesRepository;
use App\Request\CreateMessageRequest;
use App\Request\DeleteRequest;
use App\Request\GetByIdRequest;
use Doctrine\ORM\EntityManagerInterface;

class MessageManager
{
    private $entityManager;
    private $messageRepository;
    private $autoMapping;

    public function __construct(EntityManagerInterface $entityManager,
                                MessagesRepository $messagesRepository, AutoMapping $autoMapping)
    {
        $this->entityManager = $entityManager;
        $this->messageRepository = $messagesRepository;
        $this->autoMapping = $autoMapping;
    }

    public function create(CreateMessageRequest $request)
    {
        if($request->user)
        {
            $user = $this->entityManager->getRepository(User::class)
                ->find($request->user);
            $request->setUser($user);
        }
        $messageEntity = $this->autoMapping->map(CreateMessageRequest::class, Messages::class, $request);
        $this->entityManager->persist($messageEntity);
        $this->entityManager->flush();
        $this->entityManager->clear();
        return $messageEntity;
    }

    public function getAllMessages()
    {
        return $res = $this->messageRepository->getAll();
    }

    public function getMessageById(GetByIdRequest $request)
    {
        return $res = $this->messageRepository->getMessageById($request->getId());
    }

    public function delete(DeleteRequest $request)
    {
        $message = $this->messageRepository->getMessageById($request->getId());
        if(!$message)
        {

        }
        else
        {
            $this->entityManager->remove($message);
            $this->entityManager->flush();
        }
        return $message;
    }
}
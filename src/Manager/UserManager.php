<?php


namespace App\Manager;


use App\AutoMapping;
use App\Entity\User;
use App\Repository\UserRepository;
use App\Request\CreateUserRequest;
use App\Request\GetByIdRequest;
use Doctrine\ORM\EntityManagerInterface;

class UserManager
{
    private $entityManager;
    private $userRepository;
    private $autoMapping;

    public function __construct(EntityManagerInterface $entityManager, AutoMapping $autoMapping, UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
        $this->entityManager = $entityManager;
        $this->autoMapping = $autoMapping;
    }

    public function create(CreateUserRequest $createUserRequest)
    {
        $userEntity = $this->autoMapping->map(CreateUserRequest::class, User::class, $createUserRequest);
        $userEntity->setCreatedTime();
        $this->entityManager->persist($userEntity);
        $this->entityManager->flush();
        $this->entityManager->clear();
        return $userEntity;
    }

    public function getAll()
    {
        return $res = $this->userRepository->getAll();
    }

    public function getUserById(GetByIdRequest $request)
    {
        return $result = $this->userRepository->findUserById($request->getId());
    }

}
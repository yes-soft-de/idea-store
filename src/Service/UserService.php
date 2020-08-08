<?php


namespace App\Service;


use App\AutoMapping;
use App\Entity\User;
use App\Manager\UserManager;
use App\Respons\CreateUserResponse;
use App\Respons\GetUserByIdResponse;
use App\Respons\GetUserResponse;

class UserService
{
    private $userManager;
    private $autoMapping;

    public function __construct(UserManager $userManager, AutoMapping $autoMapping)
    {
        $this->userManager = $userManager;
        $this->autoMapping = $autoMapping;
    }

    public function create($request)
    {
        $result = $this->userManager->create($request);
        $response = $this->autoMapping->map(User::class, CreateUserResponse::class, $result);
        return $response;
    }

    public function getAll()
    {
        $result = $this->userManager->getAll();
        $response = [];
        if(is_array($result)||is_object($result)) {
            foreach ($result as $row)
                $response[] = $this->autoMapping->map(User::class, GetUserResponse::class, $row);

        }
        return $response;
    }

    public function getUserById($request)
    {
        $result = $this->userManager->getUserById($request);
        $response = $this->autoMapping->map(User::class, GetUserByIdResponse::class, $result);
        return $response;
    }
}
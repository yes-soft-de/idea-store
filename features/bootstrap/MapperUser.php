<?php


class MapperUser
{
    /**
     * @var ObjectUser $user
     */
    private $user;

    public function __construct()
    {
    }

    public function setUser($email, $roles, $password, $userName, $phone)
    {
        $this->user = new ObjectUser();

        $this->user->setEmail($email);
        $this->user->setRoles($roles);
        $this->user->setPassword($password);
        $this->user->setUserName($userName);
        $this->user->setPhone($phone);
        //$this->user->setCreatedTime($createdTime);
    }

    /**
     * @return ObjectUser
     */
    public function getUser(): ObjectUser
    {
        return $this->user;
    }

    /**
     * @return array
     */
    public function getUserAsArray(): array
    {
        return ["email"=>$this->user->getEmail(),
            "role"=>$this->user->getRoles(),
            "password"=>$this->user->getPassword(),
            "userName"=>$this->user->getUserName(),
            "phone"=>$this->user->getPhone()];
    }
}
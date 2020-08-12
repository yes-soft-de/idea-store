<?php

namespace App\Request;

class UpdateOrderRequest
{
   
    private $id;
    public $user;
    public $project;
   
   /**
     * @return mixed
     */
    public function getId(): ?int
    {
        return $this->id;
    }
      /**
     * @param mixed $id
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }
    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }
   /**
     * @param mixed $user
     */
    public function setUser($user): self
    {
        $this->user = $user;

        return $this;
    }

   /**
     * @return mixed
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * @param mixed $project
     */
    public function setProject($project): void
    {
        $this->project = $project;

    }
}
<?php


namespace App\Respons;

class GetOrderByIdResponse
{
    public $project;
    public $userName;  
    public $user; 
    public $projectName; 
    public $description;
    public $image;
    public $email;
    public $phone;
   
    /**
     * @param mixed $userName
     */
    public function setUserName($userName): self
    {
        $this->userName = $userName;

        return $this;
    } 
    
    /**
    * @return mixed
    */
   public function getUserName()
   {
       return $this->userName;
   }
/**
    * @return mixed
    */
   public function getPhone(): ?string
   {
       return $this->phone;
   }
/**
     * @param mixed $phone
     */
   public function setPhone(?string $phone): self
   {
       $this->phone = $phone;

       return $this;
   }

   /**
    * @return mixed
    */
   public function getEmail(): ?string
   {
       return $this->email;
   }
    /**
     * @param mixed $email
     */
   public function setEmail(string $email): self
   {
       $this->email = $email;

       return $this;
   }

    /**
     * @return mixed
     */
    public function getProjectName(): ?string
    {
        return $this->projectName;
    }

    /**
     * @param mixed $projectName
     */
    public function setProjectName(string $projectName): self
    {
        $this->projectName = $projectName;

        return $this;
    }

/**
     * @return mixed
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }
    /**
     * @param mixed $description
     */
    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }
    /**
     * @return mixed
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

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
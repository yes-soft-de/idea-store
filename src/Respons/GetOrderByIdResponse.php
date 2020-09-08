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
    public $ideaCode;
    public $DurationOfImplementation;
    public $costImplementation;
    public $initialUserExperienceStudy;
    public $notes;
    public $similarSites;
    public $ageGroup;
    public $country;
    public $platforms;
    public $linkUX;
    public $category;
    public $isFeaturedIdea;
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
    
    /**
     * @return mixed
     */ 
    public function getIdeaCode()
    {
        return $this->ideaCode;
    }

    /**
     * @param mixed $ideaCode
     *
     * 
     */ 
    public function setIdeaCode($ideaCode)
    {
        $this->ideaCode = $ideaCode;

        return $this;
    }

    /**
     * @return mixed
     */ 
    public function getDurationOfImplementation()
    {
        return $this->DurationOfImplementation;
    }

    /**
     * @param mixed $DurationOfImplementation
     *
     * 
     */ 
    public function setDurationOfImplementation($DurationOfImplementation)
    {
        $this->DurationOfImplementation = $DurationOfImplementation;

        return $this;
    }

    /**
     * @return mixed
     */ 
    public function getCostImplementation()
    {
        return $this->costImplementation;
    }

    /**
     * @param mixed $costImplementation
     *
     *
     */ 
    public function setCostImplementation($costImplementation)
    {
        $this->costImplementation = $costImplementation;

        return $this;
    }

    /**
     * @return mixed
     */ 
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     *  @param mixed $notes
     *
     * 
     */ 
    public function setNotes($notes)
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * @return mixed
     */ 
    public function getSimilarSites()
    {
        return $this->similarSites;
    }

    /**
     * 
     *
     * @param mixed $similarSites
     */ 
    public function setSimilarSites($similarSites)
    {
        $this->similarSites = $similarSites;

        return $this;
    }

    /**
     * @return mixed
     */ 
    public function getAgeGroup()
    {
        return $this->ageGroup;
    }

    /**
     * @param mixed $ageGroup
     *
     *
     */ 
    public function setAgeGroup($ageGroup)
    {
        $this->ageGroup = $ageGroup;

        return $this;
    }

    /**
     * @return mixed
     */ 
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $country
     *
     *
     */ 
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     *  @return mixed
     */ 
    public function getPlatforms()
    {
        return $this->platforms;
    }

    /**
     * @param mixed $platforms
     *
     * @return  self
     */ 
    public function setPlatforms($platforms)
    {
        $this->platforms = $platforms;

        return $this;
    }

    /**
     * @return mixed
     */ 
    public function getLinkUX()
    {
        return $this->linkUX;
    }

    /**
     * @param mixed $linkUX
     *
     * 
     */ 
    public function setLinkUX($linkUX)
    {
        $this->linkUX = $linkUX;

        return $this;
    }

    /**
     * @return mixed
     */ 
    public function getCategory()
    {
        return $this->category;
    }

    /**
     *  @param mixed $category
     *
     * 
     */ 
    public function setCategory(?Categories $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return mixed
     */ 
    public function getIsFeaturedIdea()
    {
        return $this->isFeaturedIdea;
    }

    /**
     * @param mixed $isFeaturedIdea
     *
     * 
     */ 
    public function setIsFeaturedIdea($isFeaturedIdea)
    {
        $this->isFeaturedIdea = $isFeaturedIdea;

        return $this;
    }

}
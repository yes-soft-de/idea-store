<?php


namespace App\Request;

class CreateProjectRequest
{
    public $id;
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
    public $idCategories;
    public $isFeaturedIdea;
    


    /**
     * @return mixed
     */
    public function getId()
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
    private function getProjectName(): ?string
    {
        return $this->projectName;
    }

    /**
     * @param mixed $projectName
     */
    private function setProjectName(string $projectName): self
    {
        $this->projectName = $projectName;

        return $this;
    }

    /**
     * @return mixed
     */
    private function getDescription(): ?string
    {
        return $this->description;
    }
    /**
     * @param mixed $description
     */
    private function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image): void
    {
        $this->image = $image;
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
    public function getIdCategories()
    {
        return $this->idCategories;
    }

    /**
     *  @param mixed $idCategories
     *
     * 
     */ 
    public function setIdCategories($idCategories):void
    {
        $this->idCategories = $idCategories;

        
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
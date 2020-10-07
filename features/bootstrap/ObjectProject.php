<?php


class ObjectProject
{
    private $projectName;

    private $description;

    private $image;
    //string
    private $ideaCode;
    //string
    private $DurationOfImplementation;
    //string
    private $costImplementation;
    //string
    private $initialUserExperienceStudy;

    private $notes;
    //string
    private $ageGroup;

    private $country;

    private $platforms;
    //string
    private $linkUX;
    /**
     * @var ObjectCategory $idCategories
     */
    private $idCategories;
    //boolean
    private $isFeaturedIdea;

    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getProjectName()
    {
        return $this->projectName;
    }

    /**
     * @param mixed $projectName
     */
    public function setProjectName($projectName): void
    {
        $this->projectName = $projectName;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
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
     */
    public function setIdeaCode($ideaCode): void
    {
        $this->ideaCode = $ideaCode;
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
     */
    public function setDurationOfImplementation($DurationOfImplementation): void
    {
        $this->DurationOfImplementation = $DurationOfImplementation;
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
     */
    public function setCostImplementation($costImplementation): void
    {
        $this->costImplementation = $costImplementation;
    }

    /**
     * @return mixed
     */
    public function getInitialUserExperienceStudy()
    {
        return $this->initialUserExperienceStudy;
    }

    /**
     * @param mixed $initialUserExperienceStudy
     */
    public function setInitialUserExperienceStudy($initialUserExperienceStudy): void
    {
        $this->initialUserExperienceStudy = $initialUserExperienceStudy;
    }

    /**
     * @return mixed
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @param mixed $notes
     */
    public function setNotes($notes): void
    {
        $this->notes = $notes;
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
     */
    public function setAgeGroup($ageGroup): void
    {
        $this->ageGroup = $ageGroup;
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
     */
    public function setCountry($country): void
    {
        $this->country = $country;
    }

    /**
     * @return mixed
     */
    public function getPlatforms()
    {
        return $this->platforms;
    }

    /**
     * @param mixed $platforms
     */
    public function setPlatforms($platforms): void
    {
        $this->platforms = $platforms;
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
     */
    public function setLinkUX($linkUX): void
    {
        $this->linkUX = $linkUX;
    }

    /**
     * @return ObjectCategory
     */
    public function getIdCategories(): ObjectCategory
    {
        return $this->idCategories;
    }

    /**
     * @param ObjectCategory $idCategories
     */
    public function setIdCategories(ObjectCategory $idCategories): void
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
     */
    public function setIsFeaturedIdea($isFeaturedIdea): void
    {
        $this->isFeaturedIdea = $isFeaturedIdea;
    }

}
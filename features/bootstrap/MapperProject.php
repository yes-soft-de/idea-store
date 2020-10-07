<?php


class MapperProject
{
    /**
     * @var ObjectProject $project
     */
    private $project;

    /**
     * MapperProject constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return ObjectProject
     */
    public function getProject(): ObjectProject
    {
        return $this->project;
    }

    public function setProject($projectName, $description, $image, $ideaCode, $DurationOfImplementation, $costImplementation,
      $initialUserExperienceStudy, $notes, $ageGroup, $country, $platforms, $linkUX, $isFeaturedIdea): void
    {
        $this->project = new ObjectProject();

        $this->project->setProjectName($projectName);
        $this->project->setDescription($description);
        $this->project->setImage($image);
        $this->project->setIdeaCode($ideaCode);
        $this->project->setDurationOfImplementation($DurationOfImplementation);
        $this->project->setCostImplementation($costImplementation);
        $this->project->setInitialUserExperienceStudy($initialUserExperienceStudy);
        $this->project->setNotes($notes);
        $this->project->setAgeGroup($ageGroup);
        $this->project->setCountry($country);
        $this->project->setPlatforms($platforms);
        $this->project->setLinkUX($linkUX);
        //$this->project->setIdCategories($idCategories);
        $this->project->setIsFeaturedIdea($isFeaturedIdea);
    }

    public function getProjectAsArray(): array
    {
        return [
            "projectName"=>$this->project->getProjectName(),
            "description"=>$this->project->getDescription(),
            "image"=>$this->project->getImage(),
            "ideaCode"=>$this->project->getIdeaCode(),
            "DurationOfImplementation"=>$this->project->getDurationOfImplementation(),
            "costImplementation"=>$this->project->getCostImplementation(),
            "initialUserExperienceStudy"=>$this->project->getInitialUserExperienceStudy(),
            "notes"=>$this->project->getNotes(),
            "ageGroup"=>$this->project->getAgeGroup(),
            "country"=>$this->project->getCountry(),
            "platforms"=>$this->project->getPlatforms(),
            "linkUX"=>$this->project->getLinkUX(),
            "isFeaturedIdea"=>$this->project->getIsFeaturedIdea()
        ];
    }
}
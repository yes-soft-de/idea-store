<?php

namespace App\Entity;

use App\Repository\ProjectRepository;
use Doctrine\ORM\Mapping as ORM;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
/**
 * @ORM\Entity(repositoryClass=ProjectRepository::class)
 */
class Project
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $projectName;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;
 
    
    private $image;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ideaCode;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $DurationOfImplementation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $costImplementation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $initialUserExperienceStudy;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $notes;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $similarSites;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ageGroup;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $country;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $platforms;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $linkUX;

    /**
     * @ORM\ManyToOne(targetEntity=Categories::class)
     */
    private $idCategories;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isFeaturedIdea;

   

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProjectName(): ?string
    {
        return $this->projectName;
    }

    public function setProjectName(string $projectName): self
    {
        $this->projectName = $projectName;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }
   
    public function getImage(): ?Images
    {
        return $this->image;
    }

    public function setImage(?Images $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getIdeaCode(): ?string
    {
        return $this->ideaCode;
    }

    public function setIdeaCode(?string $ideaCode): self
    {
        $this->ideaCode = $ideaCode;

        return $this;
    }

    public function getDurationOfImplementation(): ?string
    {
        return $this->DurationOfImplementation;
    }

    public function setDurationOfImplementation(?string $DurationOfImplementation): self
    {
        $this->DurationOfImplementation = $DurationOfImplementation;

        return $this;
    }

    public function getCostImplementation(): ?string
    {
        return $this->costImplementation;
    }

    public function setCostImplementation(?string $costImplementation): self
    {
        $this->costImplementation = $costImplementation;

        return $this;
    }

    public function getInitialUserExperienceStudy(): ?string
    {
        return $this->initialUserExperienceStudy;
    }

    public function setInitialUserExperienceStudy(?string $initialUserExperienceStudy): self
    {
        $this->initialUserExperienceStudy = $initialUserExperienceStudy;

        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): self
    {
        $this->notes = $notes;

        return $this;
    }

    public function getSimilarSites(): ?string
    {
        return $this->similarSites;
    }

    public function setSimilarSites(?string $similarSites): self
    {
        $this->similarSites = $similarSites;

        return $this;
    }

    public function getAgeGroup(): ?string
    {
        return $this->ageGroup;
    }

    public function setAgeGroup(?string $ageGroup): self
    {
        $this->ageGroup = $ageGroup;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getPlatforms(): ?string
    {
        return $this->platforms;
    }

    public function setPlatforms(?string $platforms): self
    {
        $this->platforms = $platforms;

        return $this;
    }

    public function getLinkUX(): ?string
    {
        return $this->linkUX;
    }

    public function setLinkUX(?string $linkUX): self
    {
        $this->linkUX = $linkUX;

        return $this;
    }

    public function getIdCategories(): ?Categories
    {
        return $this->idCategories;
    }

    public function setIdCategories(?Categories $idCategories): self
    {
        $this->idCategories = $idCategories;

        return $this;
    }

    public function getIsFeaturedIdea(): ?bool
    {
        return $this->isFeaturedIdea;
    }

    public function setIsFeaturedIdea(?bool $isFeaturedIdea): self
    {
        $this->isFeaturedIdea = $isFeaturedIdea;

        return $this;
    }

}

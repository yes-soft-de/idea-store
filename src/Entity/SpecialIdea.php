<?php

namespace App\Entity;

use App\Repository\SpecialIdeaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SpecialIdeaRepository::class)
 */
class SpecialIdea
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
    private $ideaNew;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $similarIdealink;

    /**
     * @ORM\ManyToOne(targetEntity=Categories::class)
     */
    private $idCategories;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdeaNew(): ?string
    {
        return $this->ideaNew;
    }

    public function setIdeaNew(string $ideaNew): self
    {
        $this->ideaNew = $ideaNew;

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

    public function getSimilarIdealink(): ?string
    {
        return $this->similarIdealink;
    }

    public function setSimilarIdealink(?string $similarIdealink): self
    {
        $this->similarIdealink = $similarIdealink;

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
}

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
 
<<<<<<< HEAD
=======
    
>>>>>>> f055343e76a9fc4dd5ec6b0304d34424e8f48e44
    private $image;

   

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
   
<<<<<<< HEAD
    public function getImage(): ?string
=======
    public function getImage(): ?Images
>>>>>>> f055343e76a9fc4dd5ec6b0304d34424e8f48e44
    {
        return $this->image;
    }

<<<<<<< HEAD
    public function setImage(string $image): self
=======
    public function setImage(?Images $image): self
>>>>>>> f055343e76a9fc4dd5ec6b0304d34424e8f48e44
    {
        $this->image = $image;

        return $this;
    }

}

<?php

namespace App\Respons;

class CreateImageResponse
{
    
    private $id;
    private $image;
    private $project;

    /**
     * @return mixed
     */
    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * @return mixed
     */
    public function getProject(): ?Project
    {
        return $this->project;
    }

    /**
     * @param mixed $projectName
     */
    public function setProject(?Project $project): self
    {
        $this->project = $project;

        return $this;
    }
}

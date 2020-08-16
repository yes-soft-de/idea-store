<?php

namespace App\Request;

class CreateImageRequest
{
    
<<<<<<< HEAD
    private $id;
    private $image;
    private $project;
=======
    public $id;
    public $image;
    public $project;
>>>>>>> f055343e76a9fc4dd5ec6b0304d34424e8f48e44

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

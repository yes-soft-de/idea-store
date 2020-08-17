<?php


namespace App\Request;

class CreateSpecialIdeaRequest
{
    private $id;
    private $ideaNew;
    private $description;
    private $similarIdealink;
    private $idCategories;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdeaNew()
    {
        return $this->ideaNew;
    }

    public function setIdeaNew(string $ideaNew): self
    {
        $this->ideaNew = $ideaNew;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSimilarIdealink()
    {
        return $this->similarIdealink;
    }

    public function setSimilarIdealink(string $similarIdealink): self
    {
        $this->similarIdealink = $similarIdealink;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdCategories()
    {
        return $this->idCategories;
    }

    public function setIdCategories($idCategories): void
    {
        $this->idCategories = $idCategories;
    }
}
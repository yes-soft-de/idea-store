<?php


namespace App\Respons;

class GetSpecialIdeaResponse
{
    private $ideaNew;
    private $description;
    private $similarIdealink;
    private $idCategories;

    /**
     * @return mixed
     */
    public function getIdeaNew()
    {
        return $this->ideaNew;
    }

    /**
     * @param mixed $ideaNew
     */
    public function setIdeaNew($ideaNew): void
    {
        $this->ideaNew = $ideaNew;
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
    public function getSimilarIdealink()
    {
        return $this->similarIdealink;
    }

    /**
     * @param mixed $similarIdealink
     */
    public function setSimilarIdealink($similarIdealink): void
    {
        $this->similarIdealink = $similarIdealink;
    }

    /**
     * @return mixed
     */
    public function getIdCategories()
    {
        return $this->idCategories;
    }

    /**
     * @param mixed $idCategories
     */
    public function setIdCategories($idCategories): void
    {
        $this->idCategories = $idCategories;
    }

    
}
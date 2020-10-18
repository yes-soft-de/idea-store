<?php


class ObjectSpecialIdea
{
    private $ideaNew;
    private $description;
    private $similarIdeaLink;
    /**
     * @var ObjectCategory $idCategories
     */
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
    public function getSimilarIdeaLink()
    {
        return $this->similarIdeaLink;
    }

    /**
     * @param mixed $similarIdeaLink
     */
    public function setSimilarIdeaLink($similarIdeaLink): void
    {
        $this->similarIdeaLink = $similarIdeaLink;
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


}
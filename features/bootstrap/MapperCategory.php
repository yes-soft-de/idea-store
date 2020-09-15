<?php


class MapperCategory
{
    /**
     * @var ObjectCategory
     */
    private $category;

    /**
     * MapperCategory constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return ObjectCategory
     */
    public function getCategory(): ObjectCategory
    {
        return $this->category;
    }

    /**
     * @param $category
     * @param $description
     */
    public function setCategory($category, $description): void
    {
        $this->category = new ObjectCategory();

        $this->category->setCategory($category);
        $this->category->setDescription($description);
    }

    /**
     * @return array
     */
    public function getCategoryAsArray(): array
    {
        return ["category"=>$this->category->getCategory(),
             "description"=>$this->category->getDescription()];
    }
}
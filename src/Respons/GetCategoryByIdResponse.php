<?php


namespace App\Respons;

class GetCategoryByIdResponse
{
    public $id;
    public $category;
    public $description;

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

    public function getCategory(): ?string
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory(string $category): self
    {
        $this->category = $image;

        return $this;
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
}

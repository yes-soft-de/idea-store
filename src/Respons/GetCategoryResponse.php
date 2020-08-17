<?php


namespace App\Respons;

class GetCategoryResponse
{
   
    public $category;
    public $description;



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

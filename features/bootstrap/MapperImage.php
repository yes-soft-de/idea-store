<?php


class MapperImage
{
    /**
     * @var ObjectImage $image
     */
    private $image;

    public function __construct()
    {
    }

    /**
     * @return ObjectImage
     */
    public function getImage(): ObjectImage
    {
        return $this->image;
    }

    /**
     * @param $image
     * @param $project
     */
    public function setImage($image, $project): void
    {
        $this->image = new ObjectImage();

        $this->image->setImage($image);
        $this->image->setProject($project);
    }

    public function getImageAsArray(): array
    {
        return [
            "image" => $this->image->getImage(),
            "project" => $this->image->getProject()
        ];
    }
}
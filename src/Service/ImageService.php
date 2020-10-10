<?php


namespace App\Service;


use App\AutoMapping;
use App\Entity\Images;
use App\Manager\ImageManager;
use App\Respons\CreateImageResponse;
use App\Respons\GetImagesResponse;
use App\Respons\GetImageByIdResponse;
use App\Respons\UpdateImageResponse;

class ImageService
{
    private $imageManager;
    private $autoMapping;

    public function __construct(ImageManager $imageManager, AutoMapping $autoMapping)
    {
        $this->imageManager =$imageManager;
        $this->autoMapping = $autoMapping;
    }

    public function create($request)
    {  
        $imageResult = $this->imageManager->create($request);

        return $this->autoMapping->map(Images::class, CreateImageResponse::class,
            $imageResult);
    }

    public function getAll()
    {
        $response=[];
        $result = $this->imageManager->getAll();

        foreach ($result as $row)
        {
            $response[] = $this->autoMapping->map(Images::class, GetImagesResponse::class, $row);
        }

        return $response;
    }

    public function getImageById($request)
    {
        $result = $this->imageManager->getImageById($request);

        return $this->autoMapping->map(Images::class, GetImageByIdResponse::class, $result);
    }

    public function delete($request)
    {
        $result = $this->imageManager->delete($request);
        $response = $this->autoMapping->map(Images::class, GetImageByIdResponse::class, $result);

        if(!$response)
        {
           return null;
        }
        else
        {
        return $response;
        }
    }
    public function update($request)
    {
        $imageResult = $this->imageManager->update($request);

        $response = $this->autoMapping->map(Images::class, UpdateImageResponse::class, $imageResult);
        $response->setImage($request->getImage());

        return $response;
    }

}
<?php


namespace App\Service;


use App\AutoMapping;
use App\Entity\Images;
use App\Manager\ImageManager;
use App\Respons\CreateImageResponse;
use Symfony\Component\HttpFoundation\Request;
use App\Respons\GetImagesResponse;
use App\Respons\GetImageByIdResponse;
use App\Response\DeleteResponse;
use Symfony\Component\Routing\Exception\NoConfigurationException;
use Doctrine\ORM\NonUniqueResultException;

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
        $response = $this->autoMapping->map(Images::class, CreateImageResponse::class,
            $imageResult);
        return $response;
    }
    
    
    public function getAll()
    {
        $result = $this->imageManager->getAll();
        $response=[];
        foreach ($result as $row)
            $response[] = $this->autoMapping->map(Images::class, GetImagesResponse::class, $row);
        return $response;
    }


    public function getImageById($request)
    {
        $result = $this->imageManager->getImageById($request);
        $response = $this->autoMapping->map(Images::class, GetImageByIdResponse::class, $result);
        return $response;
    }


    public function delete($request)
    {
        $result = $this->projectManager->delete($request);
        $response = $this->autoMapping->map(Project::class, GetProjectByIdResponse::class, $result);
        //$error=[];
        if(!$response){
           $error=['error'=>"this project not found!!!"];
           return $error;
        }
        else{
        return $response;}
        // $response = new DeleteResponse($result->getId());
      
        // return $response;
          
    }

   

}
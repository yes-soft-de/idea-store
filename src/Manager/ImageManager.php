<?php
namespace App\Manager;

use App\AutoMapping;
use App\Entity\Images;

use App\Repository\ImagesRepository;
use App\Request\CreateImageRequest;
use App\Repository\ProjectRepository;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Request\GetByIdRequest;
use App\Request\DeleteRequest;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Flex\Response;

class ImageManager
{
    private $entityManager;
    private $imageRepository;
    private $autoMapping;   
    private $projectRepository;

    public function __construct(EntityManagerInterface $entityManagerInterface,
    ImagesRepository $imageRepository, AutoMapping $autoMapping, ProjectRepository $projectRepository )
    {
        $this->entityManager = $entityManagerInterface;
        $this->imageRepository=$imageRepository;
        $this->autoMapping = $autoMapping;
        $this->projectRepository = $projectRepository;
    }

    public function create(CreateImageRequest $request)
    {
        
        $imageEntity = $this->autoMapping->map(CreateImageRequest::class, Images::class, $request);

        $this->entityManager->persist($imageEntity);
        $this->entityManager->flush();
        $this->entityManager->clear();
        return $imageEntity;
    }
    public function getAll()
    {
        $data = $this->imageRepository->getAll();

        return $data;
    }

    public function getImageById(GetByIdRequest $request)
    {
        return $result = $this->imageRepository->findImageByld($request->getId());
    }
    
    
    public function delete(DeleteRequest $request)
    {
        $project = $this->projectRepository->findProjectByld($request->getId());
        if (!$project ) {
           // return new Response(['data'=>'this project  is not found']);
          
        } 
         else{   

            $this->entityManager->remove($project);
            $this->entityManager->flush();
         }
         return $project;
    }

   
}

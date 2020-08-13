<?php
namespace App\Manager;

use App\AutoMapping;
use App\Entity\Images;
<<<<<<< HEAD
=======
use App\Entity\Project;
>>>>>>> f055343e76a9fc4dd5ec6b0304d34424e8f48e44

use App\Repository\ImagesRepository;
use App\Request\CreateImageRequest;
use App\Repository\ProjectRepository;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Request\GetByIdRequest;
use App\Request\DeleteRequest;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Flex\Response;

<<<<<<< HEAD
=======
use App\Request\UpdateImageRequest;

>>>>>>> f055343e76a9fc4dd5ec6b0304d34424e8f48e44
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
<<<<<<< HEAD
=======
        if($request->project){
            $project= $this->entityManager->getRepository(Project::class)
            ->find($request->project);
            $request->setProject($project);
        }
>>>>>>> f055343e76a9fc4dd5ec6b0304d34424e8f48e44
        
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
<<<<<<< HEAD
        $project = $this->projectRepository->findProjectByld($request->getId());
        if (!$project ) {
=======
        $image = $this->imageRepository->findImageByld($request->getId());
        if (!$image ) {
>>>>>>> f055343e76a9fc4dd5ec6b0304d34424e8f48e44
           // return new Response(['data'=>'this project  is not found']);
          
        } 
         else{   

<<<<<<< HEAD
            $this->entityManager->remove($project);
            $this->entityManager->flush();
         }
         return $project;
    }

=======
            $this->entityManager->remove($image);
            $this->entityManager->flush();
         }
         return $image;
    }
    public function update(UpdateImageRequest $request)
    {
        if($request->project){
            $project= $this->entityManager->getRepository(Project::class)
            ->find($request->project);
            $request->setProject($project);
           
        }
        $imageEntity = $this->imageRepository->findImageByld($project->getId());
        
        if (!$imageEntity) {
           
        } else {
            $imageEntity = $this->autoMapping->mapToObject(UpdateImageRequest::class,
                Images::class, $request, $imageEntity);
              
            $this->entityManager->flush();
            return $imageEntity;
        }
    }
>>>>>>> f055343e76a9fc4dd5ec6b0304d34424e8f48e44
   
}

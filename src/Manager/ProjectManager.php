<?php
namespace App\Manager;

use App\AutoMapping;
use App\Entity\Project;
use App\Repository\ProjectRepository;
use App\Request\CreateProjectRequest;
use App\Request\DeleteRequest;
use App\Request\GetByIdRequest;
use App\Request\UpdateProjectRequest;
use Doctrine\ORM\EntityManagerInterface;

class ProjectManager
{
    private $entityManager;
    private $projectRepository;
    private $autoMapping;
<<<<<<< HEAD
=======
    
    private $imageRepository;
>>>>>>> f055343e76a9fc4dd5ec6b0304d34424e8f48e44

    public function __construct(EntityManagerInterface $entityManagerInterface,
        ProjectRepository $projectRepository, AutoMapping $autoMapping) {
        $this->entityManager = $entityManagerInterface;
        $this->projectRepository = $projectRepository;
        $this->autoMapping = $autoMapping;
    }

    public function create(CreateProjectRequest $request)
    {

        $projectEntity = $this->autoMapping->map(CreateProjectRequest::class, Project::class, $request);

<<<<<<< HEAD
        //  $imageEntity = new Images();
        //  $imageEntity->setImage($request->getImage());
        //  $imageEntity->setProject($projectEntity);
        $this->entityManager->persist($projectEntity);
        //  $this->entityManager->persist($projectImage);
=======
        $this->entityManager->persist($projectEntity);
>>>>>>> f055343e76a9fc4dd5ec6b0304d34424e8f48e44
        $this->entityManager->flush();
        $this->entityManager->clear();
        return $projectEntity;
    }
    public function getAll()
    {
        $data = $this->projectRepository->getAll();

        return $data;
    }

    public function getProjectById(GetByIdRequest $request)
    {
<<<<<<< HEAD
        return $result = $this->projectRepository->findProjectByld($request->getId());
=======
        return $result = $this->projectRepository->findProjectAndImagesByld($request->getId());
>>>>>>> f055343e76a9fc4dd5ec6b0304d34424e8f48e44
    }

    public function delete(DeleteRequest $request)
    {
<<<<<<< HEAD
        $project = $this->projectRepository->findProjectByld($request->getId());
=======
        
        $project = $this->projectRepository->findProjectByld($request->getId());
        
>>>>>>> f055343e76a9fc4dd5ec6b0304d34424e8f48e44
        if (!$project) {
            // return new Response(['data'=>'this project  is not found']);

        } else {
<<<<<<< HEAD

=======
            
>>>>>>> f055343e76a9fc4dd5ec6b0304d34424e8f48e44
            $this->entityManager->remove($project);
            $this->entityManager->flush();
        }
        return $project;
    }
    public function update(UpdateProjectRequest $request)
    {
        $projectEntity = $this->projectRepository->findProjectByld($request->getId());
        if (!$projectEntity) {

        } else {
            $projectEntity = $this->autoMapping->mapToObject(UpdateProjectRequest::class,
                project::class, $request, $projectEntity);
            $this->entityManager->flush();
            return $projectEntity;
        }
    }

}

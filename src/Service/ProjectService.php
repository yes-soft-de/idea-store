<?php

namespace App\Service;

use App\AutoMapping;
use App\Entity\Project;
use App\Manager\ImageManager;
use App\Manager\ProjectManager;
<<<<<<< HEAD
use App\Respons\CreateProjectResponse;
use App\Respons\GetProjectByIdResponse;
use App\Respons\GetProjectsResponse;

use App\Respons\UpdateProjectResponse;

=======
use App\Request\CreateImageRequest;
use App\Respons\CreateProjectResponse;
use App\Respons\GetImageByIdResponse;
use App\Respons\GetProjectByIdResponse;
use App\Respons\GetProjectsResponse;
use App\Respons\UpdateProjectResponse;

use App\Request\UpdateProjectRequest;
use App\Request\UpdateImageRequest;

>>>>>>> f055343e76a9fc4dd5ec6b0304d34424e8f48e44
class ProjectService
{
    private $ProjectManager;
    private $autoMapping;
    private $imageManager;

    public function __construct(ImageManager $imageManager, ProjectManager $projectManager, AutoMapping $autoMapping)
    {
        $this->projectManager = $projectManager;
        $this->autoMapping = $autoMapping;
        $this->imageManager = $imageManager;
    }

    public function create($request)
    {
        $projectResult = $this->projectManager->create($request);

<<<<<<< HEAD
        // $projectId = $projectResult->getId();

        $response = $this->autoMapping->map(Project::class, CreateProjectResponse::class,
            $projectResult);
        // $imageResult = $this->imageManager->create(???);
        $response->setImage($request->getImage());


=======
        $response = $this->autoMapping->map(Project::class, CreateProjectResponse::class,
            $projectResult);
        $projectImage = new CreateImageRequest();
        $projectImage->image = $request->getImage();
        $projectImage->project = $response->getId();
        $imageResult = $this->imageManager->create($projectImage);
        $response->setImage($request->getImage());

>>>>>>> f055343e76a9fc4dd5ec6b0304d34424e8f48e44
        return $response;
    }

    public function getAll()
    {
        $result = $this->projectManager->getAll();
        $response = [];
        foreach ($result as $row) {
<<<<<<< HEAD
            $response[] = $this->autoMapping->map(Project::class, GetProjectsResponse::class, $row);
=======
            $response[] = $this->autoMapping->map('array'::class, GetProjectsResponse::class, $row);
>>>>>>> f055343e76a9fc4dd5ec6b0304d34424e8f48e44
        }

        return $response;
    }

    public function getProjectById($request)
    {
        $result = $this->projectManager->getProjectById($request);
<<<<<<< HEAD
        $response = $this->autoMapping->map(Project::class, GetProjectByIdResponse::class, $result);
=======
        $response=[];
        foreach ($result as $row) {
            $response[] = $this->autoMapping->map('array', GetProjectByIdResponse::class, $row);
        }
>>>>>>> f055343e76a9fc4dd5ec6b0304d34424e8f48e44
        return $response;
    }

    public function delete($request)
    {
<<<<<<< HEAD
        $result = $this->projectManager->delete($request);
        $response = $this->autoMapping->map(Project::class, GetProjectByIdResponse::class, $result);
        //$error=[];
        if (!$response) {
            $error = ['error' => "this project not found!!!"];
            return $error;
        } else {
            return $response;}
        // $response = new DeleteResponse($result->getId());

        // return $response;
=======
        $imageResult = $this->imageManager->delete($request);
        $projectResult = $this->projectManager->delete($request);
        $response = $this->autoMapping->map(Project::class, GetProjectByIdResponse::class, $projectResult);
       
        return $response;
>>>>>>> f055343e76a9fc4dd5ec6b0304d34424e8f48e44

    }
    public function update($request)
    {
        $projectResult = $this->projectManager->update($request);
        $response = $this->autoMapping->map(Project::class, UpdateProjectResponse::class, $projectResult);
<<<<<<< HEAD
=======

        $projectImage = new UpdateImageRequest();
        $projectImage->image   = $response->getImage();
        $projectImage->project = $response->getId();

        $projectResult = $this->imageManager->update($projectImage);
>>>>>>> f055343e76a9fc4dd5ec6b0304d34424e8f48e44
        $response->setImage($request->getImage());
        return $response;
    }

<<<<<<< HEAD
   
=======
>>>>>>> f055343e76a9fc4dd5ec6b0304d34424e8f48e44
}

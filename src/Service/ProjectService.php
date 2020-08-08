<?php

namespace App\Service;

use App\AutoMapping;
use App\Entity\Project;
use App\Manager\ImageManager;
use App\Manager\ProjectManager;
use App\Respons\CreateProjectResponse;
use App\Respons\GetProjectByIdResponse;
use App\Respons\GetProjectsResponse;

use App\Respons\UpdateProjectResponse;

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

        // $projectId = $projectResult->getId();

        $response = $this->autoMapping->map(Project::class, CreateProjectResponse::class,
            $projectResult);
        // $imageResult = $this->imageManager->create(???);
        $response->setImage($request->getImage());


        return $response;
    }

    public function getAll()
    {
        $result = $this->projectManager->getAll();
        $response = [];
        foreach ($result as $row) {
            $response[] = $this->autoMapping->map(Project::class, GetProjectsResponse::class, $row);
        }

        return $response;
    }

    public function getProjectById($request)
    {
        $result = $this->projectManager->getProjectById($request);
        $response = $this->autoMapping->map(Project::class, GetProjectByIdResponse::class, $result);
        return $response;
    }

    public function delete($request)
    {
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

    }
    public function update($request)
    {
        $projectResult = $this->projectManager->update($request);
        $response = $this->autoMapping->map(Project::class, UpdateProjectResponse::class, $projectResult);
        $response->setImage($request->getImage());
        return $response;
    }

   
}

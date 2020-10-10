<?php

namespace App\Service;

use App\AutoMapping;
use App\Entity\Project;
use App\Manager\ImageManager;
use App\Manager\ProjectManager;
use App\Request\CreateImageRequest;
use App\Respons\CreateProjectResponse;
use App\Respons\GetProjectByIdResponse;
use App\Respons\GetProjectsResponse;
use App\Respons\UpdateProjectResponse;
use App\Request\UpdateImageRequest;

class ProjectService
{
    private $projectManager;
    private $autoMapping;
    private $imageManager;

    public function __construct(ImageManager $imageManager, ProjectManager $projectManager, AutoMapping $autoMapping)
    {
        $this->projectManager = $projectManager;
        $this->autoMapping = $autoMapping;
        $this->imageManager = $imageManager;
    }

    public function create($request, $idCategory)
    {
        $request->setIdCategories($request->getIdCategories($idCategory));

        $projectResult = $this->projectManager->create($request);
        $projectResult->getIdCategories($idCategory);

        $response = $this->autoMapping->map(Project::class, CreateProjectResponse::class,
            $projectResult);
        $projectImage = new CreateImageRequest();
        $projectImage->image = $request->getImage();
        $projectImage->project = $response->getId();
        $imageResult = $this->imageManager->create($projectImage);
        $response->setImage($request->getImage());

        return $response;
    }

    public function getAll()
    {
        $response = [];
        $result = $this->projectManager->getAll();
        foreach ($result as $row) {
            $response[] = $this->autoMapping->map('array', GetProjectsResponse::class, $row);
        }

        return $response;
    }

    public function getProjectById($request)
    {
        $result = $this->projectManager->getProjectById($request);
        $response=[];
        foreach ($result as $row) {
            $response[] = $this->autoMapping->map('array', GetProjectByIdResponse::class, $row);
        }
        return $response;
    }

    public function delete($request)
    {
        $imageResult = $this->imageManager->delete($request);
        $projectResult = $this->projectManager->delete($request);
        return $this->autoMapping->map(Project::class, GetProjectByIdResponse::class, $projectResult);

    }
    public function update($request)
    {
        $projectResult = $this->projectManager->update($request);
        $response = $this->autoMapping->map(Project::class, UpdateProjectResponse::class, $projectResult);

        $projectImage = new UpdateImageRequest();
        $projectImage->image   = $response->getImage();
        $projectImage->project = $response->getId();

        $projectResult = $this->imageManager->update($projectImage);
        $response->setImage($request->getImage());
        return $response;
    }
    public function getAllFeaturedIdeas()
    {
        $result = $this->projectManager->getAllFeaturedIdeas();
        $response = [];
        foreach ($result as $row) {
            $response[] = $this->autoMapping->map('array', GetProjectsResponse::class, $row);
        }

        return $response;
    }
}

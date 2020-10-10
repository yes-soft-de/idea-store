<?php


namespace App\Service;


use App\AutoMapping;
use App\Entity\Categories;
use App\Manager\CategoriesManager;
use App\Respons\CreateCategoryResponse;
use App\Respons\GetCategoryResponse;
use App\Respons\GetCategoryByIdResponse;
use App\Respons\UpdateCategoryResponse;
use App\Respons\GetCategoryResponseWithProject;

class CategoriesService
{
    private $categoryManager;
    private $autoMapping;

    public function __construct(CategoriesManager $categoryManager, AutoMapping $autoMapping)
    {
        $this->categoryManager =$categoryManager;
        $this->autoMapping = $autoMapping;
    }

    public function create($request)
    {  
        $categoryResult = $this->categoryManager->create($request);

        return $this->autoMapping->map(Categories::class, CreateCategoryResponse::class,
            $categoryResult);
    }

    public function getAll()
    {
        $response=[];
        $result = $this->categoryManager->getAll();

        foreach ($result as $row)
        {
            $response[] = $this->autoMapping->map(Categories::class, GetCategoryResponse::class, $row);
        }

        return $response;
    }

    public function getCategoryById($request)
    {
        $result = $this->categoryManager->getCategoryById($request);

        return $this->autoMapping->map(Categories::class, GetCategoryByIdResponse::class, $result);
    }

    public function delete($request)
    {
        $result = $this->categoryManager->delete($request);
        $response = $this->autoMapping->map(Categories::class, GetCategoryByIdResponse::class, $result);

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
        $categoryResult = $this->categoryManager->update($request);

        $response = $this->autoMapping->map(Categories::class, UpdateCategoryResponse::class, $categoryResult);
        $response->setCategory($request->getCategory());

        return $response;
    }
   
    public function getAllCategoriesWithProjectService()
    {
        $response=[];
        $result = $this->categoryManager->getAllCategoriesWithProject();

        foreach ($result as $row)
        {
            $response[] = $this->autoMapping->map('array', GetCategoryResponseWithProject::class, $row);
        }

        return $response;
    }
}
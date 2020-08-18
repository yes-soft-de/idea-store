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
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Exception\NoConfigurationException;
use Doctrine\ORM\NonUniqueResultException;

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
        $response = $this->autoMapping->map(Categories::class, CreateCategoryResponse::class,
            $categoryResult);
        return $response;
    }
    
    
    public function getAll()
    {
        $result = $this->categoryManager->getAll();
        $response=[];
        foreach ($result as $row)
            $response[] = $this->autoMapping->map(Categories::class, GetCategoryResponse::class, $row);
        return $response;
    }


    public function getCategoryById($request)
    {
        $result = $this->categoryManager->getCategoryById($request);
        $response = $this->autoMapping->map(Categories::class, GetCategoryByIdResponse::class, $result);
        return $response;
    }


    public function delete($request)
    {
        $result = $this->categoryManager->delete($request);
        $response = $this->autoMapping->map(Categories::class, GetCategoryByIdResponse::class, $result);
        //$error=[];
        if(!$response){
           $error=['error'=>"this category not found!!!"];
           return $error;
        }
        else{
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
   
    // public function getAllCategoriesWithProjectService()
    // {
    //     $result = $this->categoryManager->getAllCategoriesWithProject();
    //     $response=[];
    //     foreach ($result as $row)
    //         $response[] = $this->autoMapping->map(Categories::class, GetCategoryResponseWithProject::class, $row);
            
    //     return $response;
    // }
}
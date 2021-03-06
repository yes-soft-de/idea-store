<?php
namespace App\Manager;

use App\AutoMapping;
use App\Entity\Categories;

use App\Repository\CategoriesRepository;
use App\Request\CreateCategoryRequest;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Request\GetByIdRequest;
use App\Request\DeleteRequest;
use App\Request\UpdateCategoryRequest;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Flex\Response;


class CategoriesManager
{
    private $entityManager;
    private $categoryRepository;
    private $autoMapping;   

    public function __construct(EntityManagerInterface $entityManagerInterface,
    CategoriesRepository $categoryRepository, AutoMapping $autoMapping )
    {
        $this->entityManager         = $entityManagerInterface;
        $this->categoryRepository    = $categoryRepository;
        $this->autoMapping           = $autoMapping;
    }

    public function create(CreateCategoryRequest $request)
    {
            
        $categoryEntity = $this->autoMapping->map(CreateCategoryRequest::class, Categories::class, $request);

        $this->entityManager->persist($categoryEntity);
        $this->entityManager->flush();
        $this->entityManager->clear();
        return $categoryEntity;
    }


    public function getAll()
    {
        $data = $this->categoryRepository->findAll();

        return $data;
    }

    public function getCategoryById(GetByIdRequest $request)
    {
        return $result = $this->categoryRepository->findCategoryByld($request->getId());
    }
    
    
    public function delete(DeleteRequest $request)
    {
        $category = $this->categoryRepository->findCategoryByld($request->getId());
        if (!$category ) {
          
        } 
         else{   

            $this->entityManager->remove($category);
            $this->entityManager->flush();
         }
         return $category;
    }
    public function update(UpdateCategoryRequest $request)
    {
        $categoryEntity = $this->categoryRepository->findCategoryByld($request->getId());
        
        if (!$categoryEntity) {
           
        } else {
            $categoryEntity = $this->autoMapping->mapToObject(UpdateCategoryRequest::class,
            Categories::class, $request, $categoryEntity);
              
            $this->entityManager->flush();
            return $categoryEntity;
        }
    }

    public function getAllCategoriesWithProject()
    {
        $data = $this->categoryRepository->getAllCategoriesWithProject();
        return $data;
    }

}

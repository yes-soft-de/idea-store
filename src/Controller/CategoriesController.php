<?php

namespace App\Controller;

use App\AutoMapping;
use App\Request\CreateCategoryRequest;
use App\Request\DeleteRequest;
use App\Request\GetByIdRequest;
use App\Request\UpdateCategoryRequest;
use App\Service\CategoriesService;
use phpDocumentor\Reflection\Types\Parent_;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class CategoriesController  extends BaseController
{
    private $categoryService;
    private $autoMapping;
    private $validator;

    public function __construct(ValidatorInterface $validator, SerializerInterface $serializer, CategoriesService $categoryService, AutoMapping $autoMapping)
    {
        parent::__construct($serializer);
        $this->categoryService = $categoryService;
        $this->autoMapping = $autoMapping;
        $this->validator = $validator;
    }

    /**
     * @Route("/category", name="createCategories", methods={"POST"})
      * @param Request $request
     * @return Response
     */
    public function create(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        $request = $this->autoMapping->map(\stdClass::class, CreateCategoryRequest::class, (object) $data);

        $violations = $this->validator->validate($request);

        if(count($violations) > 0)
        {
            $violationsString = (string)$violations;

            return new JsonResponse($violationsString, Response::HTTP_OK);
        }

        $result = $this->categoryService->create($request);

        return $this->response($result, self::CREATE);

    }

    /**
     * @Route("/category/{id}", name="updateCategory",methods={"PUT"})
     * @param Request $request
     * @return JsonResponse|Response
     */
    public function update(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $id = $request->get('id');
        $request = $this->autoMapping->map(\stdClass::class, UpdateCategoryRequest::class, (object) $data);
        $request->setId($id);
        $result = $this->categoryService->update($request);
        return $this->response($result, self::UPDATE);
    }

     /**
     * @Route("/categories", name="getAllCategories",methods={"GET"})
     * @return JsonResponse
     */
    public function getAll()
    {
        $result = $this->categoryService->getAll();
        return $this->response($result, self::FETCH);
    }

    /**
     * @Route("/category/{id}", name="getCategoryById",methods={"GET"})
     * @param Request $request
     * @return JsonResponse
     */
    public function getCategoryById(Request $request)
    {
        $request=new GetByIdRequest($request->get('id'));
        $result = $this->categoryService->getCategoryById($request);
        
        return $this->response($result, self::FETCH);
    }

    /**
     * @Route("/category/{id}", name="deleteCategory",methods={"DELETE"})
     * @param Request $request
     * @return JsonResponse
     */
    public function delete(Request $request)
    {
        $request = new DeleteRequest($request->get('id'));
        $result = $this->categoryService->delete($request);

        return $this->response(" ", self::DELETE);

    }

     /**
     * @Route("/categoriesWithProject", name="getAllCategoriesWithProject",methods={"GET"})
     * @return JsonResponse
     */
    public function getAllCategoriesWithProject()
    {
        $result = $this->categoryService->getAllCategoriesWithProjectService();
        
        return $this->response($result, self::FETCH);
    }
}

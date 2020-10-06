<?php

namespace App\Controller;

use App\AutoMapping;
use App\Request\CreateProjectRequest;
use App\Request\DeleteRequest;
use App\Request\GetByIdRequest;
use App\Request\UpdateProjectRequest;
use App\Service\ProjectService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ProjectController extends BaseController
{
    private $projectService;
    private $autoMapping;
    private $validator;

    public function __construct(ValidatorInterface $validator, SerializerInterface $serializer,
                                ProjectService $projectService, AutoMapping $autoMapping)
    {
        parent::__construct($serializer);
        $this->validator = $validator;
        $this->projectService = $projectService;
        $this->autoMapping = $autoMapping;
    }

    /**
     * @Route("/project/{idCategory}", name="createProject",methods={"POST"})
     * @param Request $request
     * @param $idCategory
     * @return Response
     */
    public function create(Request $request, $idCategory)
    {
        $data = json_decode($request->getContent(), true);

        $request = $this->autoMapping->map(\stdClass::class, CreateProjectRequest::class, (object) $data);

        $request->setIdCategories($idCategory);

        $violations = $this->validator->validate($request);

        if(count($violations) > 0)
        {
            $violationsString = (string)$violations;

            return new JsonResponse($violationsString, Response::HTTP_OK);
        }

        $result = $this->projectService->create($request, $idCategory);

        return $this->response($result, self::CREATE);
    }

    /**
     * @Route("/projects", name="getAllProjects",methods={"GET"})
     * @return JsonResponse
     */
    public function getAll()
    {
        $result = $this->projectService->getAll();
        return $this->response($result, self::FETCH);
    }

    /**
     * @Route("/project/{id}", name="getProjectById",methods={"GET"})
     * @param Request $request
     * @return JsonResponse
     */
    public function getProjectById(Request $request)
    {
        $request = new GetByIdRequest($request->get('id'));
        $result = $this->projectService->getProjectById($request);
        return $this->response($result, self::FETCH);
    }

    /**
     * @Route("/project/{id}", name="deleteProject",methods={"DELETE"})
     * @param Request $request
     * @return JsonResponse
     */
    public function delete(Request $request)
    {
        $request = new DeleteRequest($request->get('id'));
        $result = $this->projectService->delete($request);

        return $this->response(" ", self::DELETE);
    }

    /**
     * @Route("/project/{id}", name="updateProject",methods={"PUT"})
     * @param Request $request
     * @return JsonResponse|Response
     */
    public function update(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $id = $request->get('id');
        $request = $this->autoMapping->map(\stdClass::class, UpdateProjectRequest::class, (object) $data);
        $request->setId($id);

        $request->setImage($request->getImage('image'));
        
        $result = $this->projectService->update($request);
        return $this->response($result, self::UPDATE);
    }

   /**
     * @Route("/FeaturedIdeas", name="getAllFeaturedIdeas",methods={"GET"})
     * @return JsonResponse
     */
    public function getAllFeaturedIdeas()
    {
        $result = $this->projectService->getAllFeaturedIdeas();
        return $this->response($result, self::FETCH);
    }
  
}

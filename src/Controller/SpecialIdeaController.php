<?php

namespace App\Controller;

use App\AutoMapping;
use App\Request\CreateSpecialIdeaRequest;
use App\Request\DeleteRequest;
use App\Request\GetByIdRequest;
use App\Service\SpecialIdeaService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SpecialIdeaController extends BaseController
{
    private $specialIdeaService;
    private $autoMapping;

    /**
     * SpecialIdeaController constructor
     */
    public function __construct(SpecialIdeaService $specialIdeaService, AutoMapping $autoMapping)
    {
        $this->specialIdeaService = $specialIdeaService;
        $this->autoMapping = $autoMapping;
    }

    /**
     * @Route("/special-idea/{idCategory}", name="createSpecialIdea", methods={"POST"})
     * @param Request $request
     * @return Response
     */
    public function create(Request $request, $idCategory)
    {
        $data = json_decode($request->getContent(), true);

        $request = $this->autoMapping->map(\stdClass::class, CreateSpecialIdeaRequest::class, (object) $data);

        $request->setIdCategories($idCategory);

        $result = $this->specialIdeaService->create($request, $idCategory);

        return $this->response($result, self::CREATE);

    }

    /**
     * @Route("/special-idea", name="getAllSpecialIdeas", methods={"GET"})
     * @return JsonResponse
     */
    public function getAll()
    {
        $result = $this->specialIdeaService->getAll();
        return $this->response($result, self::FETCH);
    }

    /**
     * @Route("/special-idea/{id}", name="getSpecialIdeaById", methods={"GET"})
     * @param Request $request
     * @return JsonResponse
     */
    public function getById(Request $request)
    {
        $request = new GetByIdRequest($request->get('id'));
        $result = $this->specialIdeaService->getById($request);
        return $this->response($result, self::FETCH);
    }

    /**
     * @Route("/special-idea/{id}", name="deleteSpecialIdea", methods={"DELETE"})
     * @param Request $request
     * @return JsonResponse
     */
    public function delete(Request $request)
    {
        $request = new DeleteRequest($request->get('id'));

        $result = $this->specialIdeaService->delete($request);

        return $this->response("", self::DELETE);
    }
}
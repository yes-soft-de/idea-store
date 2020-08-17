<?php

namespace App\Controller;

use App\AutoMapping;
use App\Request\CreateSpecialIdeaRequest;
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
     * @Route("/special-idea", name="createSpecialIdea", methods={"POST"})
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        $request = $this->autoMapping->map(\stdClass::class, CreateSpecialIdeaRequest::class, (object) $data);

        $result = $this->specialIdeaService->create($request);

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

    public function getById()
    {}

    public function delete()
    {}
}
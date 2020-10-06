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
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class SpecialIdeaController extends BaseController
{
    private $specialIdeaService;
    private $autoMapping;
    private $validator;

    public function __construct(ValidatorInterface $validator, SerializerInterface $serializer,
                                SpecialIdeaService $specialIdeaService, AutoMapping $autoMapping)
    {
        parent::__construct($serializer);
        $this->validator = $validator;
        $this->specialIdeaService = $specialIdeaService;
        $this->autoMapping = $autoMapping;
    }

    /**
     * @Route("/special-idea/{idCategory}", name="createSpecialIdea", methods={"POST"})
     * @param Request $request
     * @param $idCategory
     * @return Response
     */
    public function create(Request $request, $idCategory)
    {
        $data = json_decode($request->getContent(), true);

        $request = $this->autoMapping->map(\stdClass::class, CreateSpecialIdeaRequest::class, (object) $data);

        $request->setIdCategories($idCategory);

        $violations = $this->validator->validate($request);

        if(count($violations) > 0)
        {
            $violationsString = (string)$violations;

            return new JsonResponse($violationsString, Response::HTTP_OK);
        }

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
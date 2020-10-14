<?php

namespace App\Controller;


use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\AutoMapping;
use App\Service\ImageService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Request\CreateImageRequest;
use App\Request\GetByIdRequest;
use App\Request\UpdateImageRequest;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ImageController extends BaseController
{
    private $imageService;
    private $autoMapping;
    private $validator;

    public function __construct(ValidatorInterface $validator, SerializerInterface $serializer,
                                ImageService $imageService,AutoMapping $autoMapping)
    {
        parent::__construct($serializer);
        $this->validator = $validator;
        $this->imageService = $imageService;
        $this->autoMapping = $autoMapping;
    }

    /**
     * @Route("/image", name="createimage", methods={"POST"})
     * @param Request $request
     * @return Response
     */
    public function create(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        $request=$this->autoMapping->map(\stdClass::class,CreateimageRequest::class,(object)$data);

        $violations = $this->validator->validate($request);

        if(count($violations) > 0)
        {
            $violationsString = (string)$violations;

            return new JsonResponse($violationsString, Response::HTTP_OK);
        }

        $result = $this->imageService->create($request);

        return $this->response($result, self::CREATE);
        
    }

    /**
     * @Route("/images", name="getAllImages", methods={"GET"})
     * @return JsonResponse
     */
    public function getAll()
    {
        $result = $this->imageService->getAll();
        return $this->response($result, self::FETCH);
    }

    /**
     * @Route("/image/{id}", name="getImageById", methods={"GET"})
     * @param Request $request
     * @return JsonResponse
     */
    public function getImageById(Request $request)
    {
        $request=new GetByIdRequest($request->get('id'));
        $result = $this->imageService->getImageById($request);
        
        return $this->response($result, self::FETCH);
    }

     /**
     * @Route("/image", name="updateImage", methods={"PUT"})
     * @param Request $request
     * @return JsonResponse|Response
     */
    public function update(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        $request = $this->autoMapping->map(\stdClass::class, UpdateImageRequest::class, (object) $data);

        $result = $this->imageService->update($request);

        return $this->response($result, self::UPDATE);
    }

   
}

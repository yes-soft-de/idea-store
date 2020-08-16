<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\AutoMapping;
use App\Service\ImageService;
use AutoMapperPlus\Exception\UnregisteredMappingException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Request\CreateImageRequest;
use App\Request\GetByIdRequest;
use App\Request\DeleteRequest;
use Symfony\Component\Serializer\Encoder\JsonDecode;
use App\Request\UpdateImageRequest;
class ImageController extends BaseController
{
    private $ImageService;
    private $autoMapping;
    /**
     * ImageController constructor.
     * @param ImageService $ImageService
     */
    public function __construct(ImageService $imageService,AutoMapping $autoMapping)
    {
        $this->imageService = $imageService;
        $this->autoMapping=$autoMapping;
    }

    /**
     * @Route("/image", name="createimage",methods={"POST"})
     * @param Request $request
     * @return Response
     */
    public function create(Request $request)
    {
        $data = json_decode($request->getContent(), true);
         $request=$this->autoMapping->map(\stdClass::class,CreateimageRequest::class,(object)$data);
        $result = $this->imageService->create($request);
        return $this->response($result, self::CREATE);
        
    }
    /**
<<<<<<< HEAD
     * @Route("/projects", name="getAllImages",methods={"GET"})
=======
     * @Route("/images", name="getAllImages",methods={"GET"})
>>>>>>> f055343e76a9fc4dd5ec6b0304d34424e8f48e44
     * @return JsonResponse
     */
    public function getAll()
    {
        $result = $this->imageService->getAll();
        return $this->response($result, self::FETCH);
    }

    /**
     * @Route("/image/{id}", name="getImageById",methods={"GET"})
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
     * @Route("/image/{id}", name="updateImage",methods={"PUT"})
     * @param Request $request
     * @return JsonResponse|Response
     */
    public function update(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $id = $request->get('id');
        $request = $this->autoMapping->map(\stdClass::class, UpdateImageRequest::class, (object) $data);
        $request->setId($id);
        $result = $this->imageService->update($request);
        return $this->response($result, self::UPDATE);
    }

   
}

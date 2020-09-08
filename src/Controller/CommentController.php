<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\AutoMapping;
use App\Service\CommentService;
use App\Request\CreateCommentRequest;
use App\Request\UpdateCommentRequest;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Encoder\JsonDecode;
use App\Request\DeleteRequest;
use App\Request\GetByIdRequest;

class CommentController extends BaseController
{
    private $commentService;
    private $autoMapping;
    /**
     * CommentController constructor.
     * @param CommentService $commentService
     */
    public function __construct(CommentService $commentService,AutoMapping $autoMapping)
    {
        $this->commentService = $commentService;
        $this->autoMapping=$autoMapping;
    }

    /**
     * @Route("/comment/{idArtical}", name="createcomment",methods={"POST"})
     * @param Request $request
     * @return Response
     */
    public function create(Request $request, $idArtical)
    {
        $data = json_decode($request->getContent(), true);
         $request=$this->autoMapping->map(\stdClass::class,CreateCommentRequest::class,(object)$data);

         $request->setArtical($idArtical);
         
        $result = $this->commentService->create($request, $idArtical);
        return $this->response($result, self::CREATE);
        
    }
     /**
     * @Route("/comment/{id}/{idArtical}", name="updateComment",methods={"PUT"})
     * @param Request $request
     * @return JsonResponse|Response
     */
    public function update(Request $request, $idArtical)
    {
      
        $data = json_decode($request->getContent(), true);
        $id = $request->get('id');
        $request = $this->autoMapping->map(\stdClass::class, UpdateCommentRequest::class, (object) $data);
        $request->setId($id);
        $request->setArtical($idArtical);
        $result = $this->commentService->update($request);
        return $this->response($result, self::UPDATE);
    }

     /**
     * @Route("/comment/{id}", name="deleteComment",methods={"DELETE"})
     * @param Request $request
     * @return JsonResponse
     */
    public function delete(Request $request)
    {
        $request = new DeleteRequest($request->get('id'));
        $result = $this->commentService->delete($request);

        return $this->response("Deleted Success", self::DELETE);

    }

     /**
     * @Route("/comment/{id}", name="getCommentById",methods={"GET"})
     * @param Request $request
     * @return JsonResponse
     */
    public function getCommentById(Request $request)
    {
        $request=new GetByIdRequest($request->get('id'));
        $result = $this->commentService->getCommentById($request);
        
        return $this->response($result, self::FETCH);
    }

      /**
     * @Route("/comments/{idArticle}", name="getAllcommentsForArticle",methods={"GET"})
     * @return JsonResponse
     */
    public function getAll($idArticle)
    {
        $result = $this->commentService->getAll($idArticle);
        return $this->response($result, self::FETCH);
    }
}

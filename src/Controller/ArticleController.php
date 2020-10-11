<?php


namespace App\Controller;


use App\AutoMapping;
use App\Request\CreateArticleRequest;
use App\Request\DeleteRequest;
use App\Request\GetByIdRequest;
use App\Request\UpdateArticleRequest;
use App\Service\ArticleService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ArticleController extends BaseController
{
    private $articleService;
    private $autoMapping;
    private $validator;

    public function __construct(ValidatorInterface $validator, SerializerInterface $serializer, ArticleService $articleService, AutoMapping $autoMapping)
    {
        parent::__construct($serializer);
        $this->articleService = $articleService;
        $this->autoMapping = $autoMapping;
        $this->validator = $validator;
    }

    /**
     * @Route("/articles", name="createArticle", methods={"POST"})
     * @param Request $request
     * @return Response
     */
    public function create(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        $request = $this->autoMapping->map(\stdClass::class, CreateArticleRequest::class, (object)$data);

        $violations = $this->validator->validate($request);

        if(count($violations) > 0)
        {
            $violationsString = (string)$violations;

            return new JsonResponse($violationsString, Response::HTTP_OK);
        }

        $result = $this->articleService->create($request);

        return $this->response($result, self::CREATE);
    }

    /**
     * @Route("articles", name="updateArticle", methods={"PUT"})
     * @param Request $request
     * @return JsonResponse|Response
     */
    public function update(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        $request = $this->autoMapping->map(\stdClass::class, UpdateArticleRequest::class, (object)$data);
        $result = $this->articleService->update($request);

        return $this->response($result, self::UPDATE);
    }

    /**
     * @Route("/articles/{id}", name="getArticleById", methods={"GET"})
     * @param Request $request
     * @return JsonResponse
     */
    public function getArticleById(Request $request)
    {
        $request = new GetByIdRequest($request->get('id'));
        $result = $this->articleService->getArticleById($request);
        return $this->response($result, self::FETCH);
    }

    /**
     * @Route("/articles", name="getAllArticles", methods={"GET"})
     * @return JsonResponse
     */
    public function getAll()
    {
        $result = $this->articleService->getAll();

        return $this->response($result, self::FETCH);
    }

    /**
     * @Route("/articles/{id}", name="deleteArticle", methods={"DELETE"})
     * @param Request $request
     * @return JsonResponse
     */
    public function delete(Request $request)
    {
        $request = new DeleteRequest($request->get('id'));
        $result = $this->articleService->delete($request);

        return $this->response($result,self::DELETE);
    }
}
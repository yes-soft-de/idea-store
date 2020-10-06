<?php

namespace App\Controller;

use App\AutoMapping;
use App\Request\CreateUserRequest;
use App\Request\GetByIdRequest;
use App\Service\UserService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class UserController extends BaseController
{
    private $userService;
    private $autoMapping;
    private $validator;

    public function __construct(ValidatorInterface $validator, SerializerInterface $serializer, UserService $userService, AutoMapping $autoMapping)
    {
        parent::__construct($serializer);
        $this->userService = $userService;
        $this->autoMapping = $autoMapping;
        $this->validator = $validator;
    }

    /**
     * @Route("/register", name="user_register", methods={"POST"})
     * @param Request $request
     * @return JsonResponse
     */
    public function register(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        $request = $this->autoMapping->map(\stdClass::class, CreateUserRequest::class, (object)$data);

        $violations = $this->validator->validate($request);

        if(count($violations) > 0)
        {
            $violationsString = (string)$violations;

            return new JsonResponse($violationsString, Response::HTTP_OK);
        }

        $result = $this->userService->create($request);

        return $this->response($result, self::CREATE);
    }

    /**
     * @Route("/login", name="user_login", methods={"POST"})
     */
    public function login()
    {
        return $this->json(['logged in' => true]);
    }

    /**
     * @Route("/profile", name="user_profile")
     * @IsGranted("ROLE_USER")
     */
    public function profile()
    {
        return $this->json(['user'=>$this->getUser()], 200, [], ['groups'=>['api']]);
    }

    /**
     * @Route("/", name="api_home")
     */
    public function home()
    {
        return $this->json(['main'=>true]);
    }

    /**
     * @Route("/users/{id}", name="getUserById", methods={"GET"})
     * @param Request $request
     * @return JsonResponse
     */
    public function getUserById(Request $request)
    {
        $request = new GetByIdRequest($request->get('id'));
        $result = $this->userService->getUserById($request);
        return $this->response($result, self::FETCH);
    }

    /**
     * @Route("/users", name="get_users", methods={"GET"})
     * @return JsonResponse
     */
    public function getAll()
    {
        $result = $this->userService->getAll();

        return $this->response($result, self::FETCH);
    }
}

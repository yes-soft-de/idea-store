<?php

namespace App\Security;

use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Guard\AbstractGuardAuthenticator;
use Symfony\Component\Validator\Constraints\Json;

class Authenticator extends AbstractGuardAuthenticator
{

    public function supports(Request $request)
    {
        return $request->get('_route') === 'user_login' && $request->isMethod("POST");
    }

    public function getCredentials(Request $request)
    {
        return ['email'=>$request->request->get('email'),
             'password'=>$request->request->get('password')];
    }

    public function getUser($credentials, UserProviderInterface $userProvider)
    {
        return $userProvider->loadUserByUsername($credentials['email']);
    }

    public function checkCredentials($credentials, UserInterface $user)
    {
        //return $this->passwordEncoder->isPasswordValid($user, $credentials['password']);
        return true;    //Because no password encoder is used
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception)
    {
        return new JsonResponse(['error'=>$exception->getMessageKey()], 400);
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, $providerKey)
    {
        return new JsonResponse(['Credentials status'=>true]);
    }

    public function start(Request $request, AuthenticationException $authException = null)
    {
        return new JsonResponse(['error'=>'Access Denied']);
    }

    public function supportsRememberMe()
    {
        return false;
    }
}

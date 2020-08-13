<?php

namespace App\Security;

<<<<<<< HEAD
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
=======
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
>>>>>>> f055343e76a9fc4dd5ec6b0304d34424e8f48e44
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Guard\AbstractGuardAuthenticator;
<<<<<<< HEAD
use Symfony\Component\Validator\Constraints\Json;

class Authenticator extends AbstractGuardAuthenticator
{

    public function supports(Request $request)
    {
        return $request->get('_route') === 'user_login' && $request->isMethod("POST");
=======

class Authenticator extends AbstractGuardAuthenticator
{
    public function supports(Request $request)
    {
        // todo
>>>>>>> f055343e76a9fc4dd5ec6b0304d34424e8f48e44
    }

    public function getCredentials(Request $request)
    {
<<<<<<< HEAD
        return ['email'=>$request->request->get('email'),
             'password'=>$request->request->get('password')];
=======
        // todo
>>>>>>> f055343e76a9fc4dd5ec6b0304d34424e8f48e44
    }

    public function getUser($credentials, UserProviderInterface $userProvider)
    {
<<<<<<< HEAD
        //var_dump($credentials['email']);die;
        return $userProvider->loadUserByUsername($credentials['email']);
=======
        // todo
>>>>>>> f055343e76a9fc4dd5ec6b0304d34424e8f48e44
    }

    public function checkCredentials($credentials, UserInterface $user)
    {
<<<<<<< HEAD
        //return $this->passwordEncoder->isPasswordValid($user, $credentials['password']);
        return true;    //Because no password encoder is used
=======
        // todo
>>>>>>> f055343e76a9fc4dd5ec6b0304d34424e8f48e44
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception)
    {
<<<<<<< HEAD
        return new JsonResponse(['error'=>$exception->getMessageKey()], 400);
=======
        // todo
>>>>>>> f055343e76a9fc4dd5ec6b0304d34424e8f48e44
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, $providerKey)
    {
<<<<<<< HEAD
        return new JsonResponse(['Credentials status'=>true]);
=======
        // todo
>>>>>>> f055343e76a9fc4dd5ec6b0304d34424e8f48e44
    }

    public function start(Request $request, AuthenticationException $authException = null)
    {
<<<<<<< HEAD
        return new JsonResponse(['error'=>'Access Denied']);
=======
        // todo
>>>>>>> f055343e76a9fc4dd5ec6b0304d34424e8f48e44
    }

    public function supportsRememberMe()
    {
<<<<<<< HEAD
        return false;
=======
        // todo
>>>>>>> f055343e76a9fc4dd5ec6b0304d34424e8f48e44
    }
}

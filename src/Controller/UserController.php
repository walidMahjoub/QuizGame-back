<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractApiController
{
    /**
     * @Route("/users/me", methods={"GET"}, name="me")
     */
    public function getMe()
    {
        return $this->createApiResponse($this->getUser(), Response::HTTP_OK);
    }
    /**
     * @Route("/login", methods={"POST"}, name="login")
     */
    public function login()
    {
    }
}

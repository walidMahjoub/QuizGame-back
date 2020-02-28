<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use JMS\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Response;

abstract class AbstractApiController extends AbstractController
{
    private $jmsSerializer;

    public function __construct(SerializerInterface $jmsSerializer)
    {
        $this->jmsSerializer = $jmsSerializer;
    }

    protected function createApiResponse($data, $statusCode = Response::HTTP_OK): Response
    {
        $data = $this->jmsSerializer->serialize($data, 'json');

        return $this->buildResponse($data, $statusCode);
    }

    protected function buildResponse($data, $statusCode): Response
    {
        return new Response($data, $statusCode, [
            'Content-Type' => 'application/json'
        ]);
    }
}

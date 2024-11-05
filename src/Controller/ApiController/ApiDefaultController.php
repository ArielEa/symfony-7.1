<?php

namespace App\Controller\ApiController;

use App\Controller\ApiBaseController;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ApiDefaultController extends ApiBaseController
{
    #[Route('/api', name: 'api', methods: ["GET", "POST"])]
    public function ApiDefault() :JsonResponse
    {
        return new JsonResponse(
            [
                "method" =>  $this->request->getMethod(),
                "path" => __DIR__,
                "pwd" => getcwd(),
                "request_time" => date("Y-m-d H:i:s", time()),
                "timezone" => date_default_timezone_get()
            ]
        );
    }
}
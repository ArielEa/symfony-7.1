<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController {

    /**
     * 需要优先定义一个空的首页
     * @param EntityManagerInterface $entityManager
     * @param Request $request
     * @return JsonResponse
     */
    #[Route('/', name: 'api_home')]
    public function index(EntityManagerInterface $entityManager, Request $request): JsonResponse
    {
//        $product = new Product();
//
//        $product->setCity("ToKyo");
//        $product->setTown("Suginamiku");
//
//        $entityManager->persist($product);
//        $entityManager->flush();

        echo date_default_timezone_get();

        echo PHP_EOL;

        return new JsonResponse([
            'message' => 'Welcome to my Symfony project!',
            'status' => 'success',
            'data' => [
                'user' => 'John Doe',
                'role' => 'admin'
            ]
        ]);
    }
}

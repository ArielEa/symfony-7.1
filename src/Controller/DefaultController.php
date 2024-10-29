<?php

namespace App\Controller;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController {

    /**
     * 需要优先定义一个空的首页
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

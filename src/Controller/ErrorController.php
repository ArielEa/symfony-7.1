<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\ErrorHandler\Exception\FlattenException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpKernel\Log\DebugLoggerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\RouterInterface;

class ErrorController extends AbstractController
{
    private LoggerInterface $logger;

    private RequestStack $requestStack;

    private RouterInterface $router;

    public function __construct(LoggerInterface $logger, RequestStack $requestStack, RouterInterface $router)
    {
        $this->logger = $logger;
        $this->requestStack = $requestStack;
        $this->router = $router;
    }

    public function show(FlattenException $exception): JsonResponse
    {
        $request = $this->requestStack->getCurrentRequest();

        $pathInfo = $request ? $request->getPathInfo() : 'Unknown path';

        if ($exception->getStatusCode() === 404) {

            $this->logger->error("route 404 not found");

            return new JsonResponse([
                "error_code" => 404,
                "message" => "route 404 not found",
                "sub_message" => $exception->getMessage(),
                "path_info" => $pathInfo
            ]);
        }

        return new JsonResponse(["Something went wrong!"]);
    }
}